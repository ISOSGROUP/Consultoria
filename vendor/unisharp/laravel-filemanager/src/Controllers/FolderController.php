<?php

namespace UniSharp\LaravelFilemanager\Controllers;

use UniSharp\LaravelFilemanager\Events\FolderIsCreating;
use UniSharp\LaravelFilemanager\Events\FolderWasCreated;
use Spatie\Permission\Models\Permission;           
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Artisan;

class FolderController extends LfmController
{
    /**
     * Get list of folders as json to populate treeview.
     *
     * @return mixed
     */
     
    public function getFolders()
    {
        $folder_types = array_filter(['share'], function ($type) {
            return $this->helper->allowFolderType($type);
        });

        $root_folders = array_map(function ($type) use ($folder_types) {
            $path = $this->lfm->dir($this->helper->getRootFolder($type));
            return (object) [
                'name' => trans('laravel-filemanager::lfm.title-' . $type),
                'url' => $path->path('working_dir'),
                'children' => $path->folders(),
                'has_next' => ! ($type == end($folder_types)),
            ];
        }, $folder_types);

        /*
        $permissions = DB::table('model_has_roles')
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

        $new_array = array_values($root_folders[0]->children);
        $root_folders[0]->children = $new_array; 
        $count = count($root_folders[0]->children);
 
        for ($i = 0; $i < $count; $i++) {

            if((in_array($root_folders[0]->children[$i]->name, $s) )){

                $key = array_search($root_folders[0]->children[$i]->name, $s);
                //$roleFolderPermissions[$key]->view_files 
                //dd($roleFolderPermissions);
                if(!($roleFolderPermissions[$key]->view_files == true)){
                    unset($root_folders[0]->children[$i]);
                } 
            }
            else{
                unset($root_folders[0]->children[$i]);

            }
             

        }

      
   

       /* return view('laravel-filemanager::tree')
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
            ]);
*/
            return view('laravel-filemanager::tree')
            ->with(['root_folders'=>$root_folders]);
    }

    /**
     * Add a new folder.
     *
     * @return mixed
     */
    public function getAddfolder()
    {
        $folder_name = $this->helper->input('name');

        Artisan::call('cache:clear');
        //$Permission = Permission::create(
          //  ['name' => $folder_name,
           // 'guard_name' => 'web',
           // 'type' => 'dir']);  

        $role_id = DB::table('model_has_roles')
                      ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                      ->where('model_has_roles.model_id', '=', auth()->user()->id)
                      ->pluck('roles.id')
                      ->all();



        $folder_id = DB::table('folders')->insertGetId(
            ['name'=>$folder_name]
        );
        DB::table('folder_permissions')->insert(['folder_id'=> $folder_id,
                                    'role_id'=> $role_id[0],
                                    'view_files'=> 1,
                                    //'upload_files'=> 0,
                                    //'download_files'=> 0,
                                    //'create_folders'=> 0,
                                    //'delete_files'=> 0,
                                    //'rename_files'=> 0
                                ]); 


        $roles_id = DB::table('roles')
        ->whereNotIn('roles.id', $role_id)
        ->select('roles.id')
        ->get();

        foreach($roles_id as $key => $value) {

            DB::table('folder_permissions')->insert(['folder_id'=> $folder_id,
                                    'role_id'=> $value->id,
                                ]); 

        }



        //DB::table('role_has_permissions')->insert(['permission_id' => $Permission->id, 'role_id' => $roles_id[0]->id]);

        $new_path = $this->lfm->setName($folder_name)->path('absolute');

        event(new FolderIsCreating($new_path));

        try {
            if ($folder_name === null || $folder_name == '') {
                return $this->helper->error('folder-name');
            } elseif ($this->lfm->setName($folder_name)->exists()) {
                return $this->helper->error('folder-exist');
            } elseif (config('lfm.alphanumeric_directory') && preg_match('/[^\w-]/i', $folder_name)) {
                return $this->helper->error('folder-alnum');
            } else {
                $this->lfm->setName($folder_name)->createFolder();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        event(new FolderWasCreated($new_path));

        return parent::$success_response;
    }
}
