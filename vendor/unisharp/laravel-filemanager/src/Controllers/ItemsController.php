<?php

namespace UniSharp\LaravelFilemanager\Controllers;

use Illuminate\Support\Facades\Storage;
use UniSharp\LaravelFilemanager\Events\FileIsMoving;
use UniSharp\LaravelFilemanager\Events\FileWasMoving;
use UniSharp\LaravelFilemanager\Events\FolderIsMoving;
use UniSharp\LaravelFilemanager\Events\FolderWasMoving;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
//use Auth;
use Illuminate\Support\Facades\Auth;

class ItemsController extends LfmController
{
    /**
     * Get the images to load for a selected folder.
     *
     * @return mixed
     */
    public function getPermissionList(){

        $permissions = DB::table('model_has_roles')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->join('role_has_permissions', 'role_has_permissions.role_id', '=', 'roles.id')
        ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
        ->where('model_has_roles.model_id', '=', auth()->user()->id)
        ->select('permissions.name')
        ->get();
        return $permissions;
    }
    public function getItems()
    {
        $currentPage = self::getCurrentPageFromRequest();

        $perPage = $this->helper->getPaginationPerPage();
        $items = array_merge($this->lfm->folders(), $this->lfm->files());
        $test = array_map(function ($item) {
            return $item->fill()->attributes;
            }, array_slice($items, ($currentPage - 1) * $perPage, $perPage));


        $d = $this->helper->request();

        
        /*$permissions = DB::table('model_has_roles')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->join('role_has_permissions', 'role_has_permissions.role_id', '=', 'roles.id')
        ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
        ->where('model_has_roles.model_id', '=', auth()->user()->id)
        ->where( 'permissions.type', '=', 'dir' )
        ->select('permissions.name')
        ->get();
        */

        $role_id = DB::table('model_has_roles')
                        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                        ->where('model_has_roles.model_id', '=', auth()->user()->id)
                        ->select('roles.id')
                        ->get();
        $roleFolderPermissions = DB::table('folder_permissions')
                                     ->join('folders', 'folders.id', '=', 'folder_permissions.folder_id')
                                     ->where('folder_permissions.role_id', '=', $role_id[0]->id)
                                     ->select('folders.name','folder_permissions.upload_files',
                                     'folder_permissions.download_files','folder_permissions.create_folders',
                                     'folder_permissions.rename_files','folder_permissions.delete_files',
                                     'folder_permissions.view_files','folder_permissions.id','folder_permissions.folder_id')
                                     ->get();


        $s[0] = "";
        foreach($roleFolderPermissions as $key => $value) {
            $s[$key] = $value->name;
        }

        //session()->put('permissions', 'test');
       // dd(session()->get('permissions'));

       //'upload_files' =>'0',
       //'download_files' =>'0',
       //'create_folders' =>'0',
       // Config::set('permissionlist.upload_files',"sss");
        //dd(Config::get('constants.admin_email'));
        

        $parts = explode('/', $d['working_dir']);
        $count = count($items);
        
        if(array_key_exists(2, $parts)){
            $p = DB::table('model_has_roles')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->join('role_has_permissions', 'role_has_permissions.role_id', '=', 'roles.id')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->where('model_has_roles.model_id', '=', auth()->user()->id)
            ->where( 'permissions.name', '=', $parts[2] )
            ->select('permissions.name','permissions.upload_files','permissions.download_files','permissions.create_folders')
            ->get();
            //Config::set('permissionlist.upload_files',$p[0]->upload_files);
            //Config::set('permissionlist.download_files',$p[0]->download_files);
            //Config::set('permissionlist.create_folders',$p[0]->create_folders);
            //session()->put('upload_files', $p[0]->upload_files);
            //dd(Config::get('permissionlist.upload_files'));

        }


        if(count($parts) == 2){

          

            for ($i = 0; $i < $count; $i++) {

                if((in_array($items[$i]->name, $s) )){

                    $key = array_search($items[$i]->name, $s);
                    if(!($roleFolderPermissions[$key]->view_files == true)){
                        unset($items[$i]);
                    } 
                }
                else{
                    unset($items[$i]);
    
                }
            }

        }

        return [
            'items' => array_map(function ($item) {
                return $item->fill()->attributes;
            }, array_slice($items, ($currentPage - 1) * $perPage, $perPage)),
            'paginator' => [
                'current_page' => $currentPage,
                'total' => count($items),
                'per_page' => $perPage,
            ],
            'display' => $this->helper->getDisplayMode(),
            'working_dir' => $this->lfm->path('working_dir'),
        ];
    }

    public function move()
    {
        $items = request('items');
        $folder_types = array_filter(['user', 'share'], function ($type) {
            return $this->helper->allowFolderType($type);
        });
        return view('laravel-filemanager::move')
            ->with([
                'root_folders' => array_map(function ($type) use ($folder_types) {
                    $path = $this->lfm->dir($this->helper->getRootFolder($type));

                    return (object) [
                        'name' => trans('laravel-filemanager::lfm.title-' . $type),
                        'url' => $path->path('working_dir'),
                        'children' => $path->folders(),
                        'has_next' => ! ($type == end($folder_types)),
                    ];
                }, $folder_types),
            ])
            ->with('items', $items);
    }

    public function domove()
    {
        $target = $this->helper->input('goToFolder');
        $items = $this->helper->input('items');

        foreach ($items as $item) {
            $old_file = $this->lfm->pretty($item);
            $is_directory = $old_file->isDirectory();

            $file = $this->lfm->setName($item);

            if (!Storage::disk($this->helper->config('disk'))->exists($file->path('storage'))) {
                abort(404);
            }

            $old_path = $old_file->path();

            if ($old_file->hasThumb()) {
                $new_file = $this->lfm->setName($item)->thumb()->dir($target);
                if ($is_directory) {
                    event(new FolderIsMoving($old_file->path(), $new_file->path()));
                } else {
                    event(new FileIsMoving($old_file->path(), $new_file->path()));
                }
                $this->lfm->setName($item)->thumb()->move($new_file);
            }
            $new_file = $this->lfm->setName($item)->dir($target);
            $this->lfm->setName($item)->move($new_file);
            if ($is_directory) {
                event(new FolderWasMoving($old_path, $new_file->path()));
            } else {
                event(new FileWasMoving($old_path, $new_file->path()));
            }
        };

        return parent::$success_response;
    }

    private static function getCurrentPageFromRequest()
    {
        $currentPage = (int) request()->get('page', 1);
        $currentPage = $currentPage < 1 ? 1 : $currentPage;

        return $currentPage;
    }
}
