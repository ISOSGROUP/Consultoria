<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class RoleController extends Controller
{
     
    function __construct(){
         $this->middleware('permission:role-list|Gestión-roles', ['only' => ['index']]);
         //$this->middleware('permission:role-create', ['only' => ['create','store']]);
         //$this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:role-delete', ['only' => ['destroy']]);
         $this->middleware('permission:Gestión-roles', ['only' => ['show','create','store','edit','update','destroy']]);

    }

    public function index(Request $request){
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $permissions = Permission::get();
       // dd($permission[0]->name);
       $folders = DB::table('folders')
                    ->select('folders.name')->get();

       //dd($folders);
        return view('roles.create', compact('permissions','folders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        $Archivos[0] = "Archivos_Compartidos";
        $folders_id = DB::table('folders')->whereNotIn('folders.name', $Archivos)->get("folders.id");

        foreach($folders_id as $key => $value) {

            DB::table('folder_permissions')->insert([
                'folder_id'=> $value->id,
                'role_id'=> $role->id]);

        }

        if($request->has('values')){



            $r = $request->all();
            $r = $r['values'];
            foreach($r as $key => $value) {

                $pieces = explode(" ", $key);
                //$Permission = Permission::where('name',$pieces[0])->update([$pieces[1]=> 1]);

                $folder_id = DB::table('folders')->where('name', $pieces[0])->get("folders.id");

                $role_folder = DB::table('folder_permissions')
                                ->where('folder_id', $folder_id[0]->id)
                                ->where('role_id', $role->id)
                                ->get();

                if (count($role_folder) > 0) {

                    DB::table('folder_permissions')
                    ->where('folder_id',$folder_id[0]->id)
                    ->where('role_id',$role->id)
                    ->update([$pieces[1]=> 1]);

                    
                }else{
                    DB::table('folder_permissions')->insert([
                        'folder_id'=> $folder_id[0]->id,
                        'role_id'=> $role->id,
                        $pieces[1]=> 1,
                        //'view_files'=> 0,
                        //'upload_files'=> 0,
                        //'download_files'=> 0,
                        //'create_folders'=> 0,
                        //'delete_files'=> 0,
                        //'rename_files'=> 0
                        ]); 
                }
                 

            }

            

        }

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $role = Role::find($id);
        
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', 'permissions.id')
            ->where('role_has_permissions.role_id',$id)
            ->get();

        
        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $role = Role::find($id);
        
        $permissions = Permission::get();

        $permissionFolders = Permission::where('type','dir')->get();

        $rolePermissionsMenus = DB::table('role_has_permissions')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where( 'permissions.type', '=', 'm' )
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id','permissions.name')
            ->all();
        $rolePermissionsFolders = DB::table('role_has_permissions')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where( 'permissions.type', '=', 'dir' )
            ->pluck('permissions.name')
            ->all();


        $roleFolderPermissions = DB::table('folder_permissions')
        ->join('folders', 'folders.id', '=', 'folder_permissions.folder_id')
        ->where('folder_permissions.role_id', '=', $id)
        ->select('folders.name','folder_permissions.upload_files',
                'folder_permissions.download_files','folder_permissions.create_folders',
                'folder_permissions.rename_files','folder_permissions.delete_files',
                'folder_permissions.view_files','folder_permissions.id','folder_permissions.folder_id')
        ->get();

            //->pluck('permissions.name','permisos_details.upload_files',
            //'permisos_details.download_files','permisos_details.create_folders',
            //'permisos_details.rename_files','permisos_details.delete_files')
            //->all();

            //dd($roleFolderPermissions);
            $folders = DB::table('folders')
            ->get('folders.name');

            return view('roles.edit', compact('role','permissions', 'rolePermissionsMenus','rolePermissionsFolders','roleFolderPermissions'));


     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));

        /*
        if($request->has('permission')){

            foreach($request->input('permission') as $key ) {
                $Permissiond = Permission::where('name',$key)->first();
                //DB::table('folders')->where('name', 3);
                $Permission = Permission::where('name',$key)
                                        ->update(['upload_files'=> 0,
                                                  'download_files'=> 0,
                                                   'create_folders'=> 0,
                                                   'delete_files'=> 0,
                                                   'rename_files'=> 0]);
                     
            }
        }
        */

        $folders = DB::table('folders')
                    ->select('folders.id')->get();

        foreach($folders as $key => $value) {

            
        }
        DB::table('folder_permissions')
                    ->where('role_id',$id)
                    ->update([  
                                'view_files' => 0,
                                'upload_files'=> 0,
                                'download_files'=> 0,
                                'create_folders'=> 0,
                                'delete_files'=> 0,
                                'rename_files'=> 0]); 

        if($request->has('values')){
            $r = $request->all();
            $r = $r['values'];

            foreach($r as $key => $value) {

                $pieces = explode(" ", $key);
                
                //$Permission = Permission::where('name',$pieces[0])->update([$pieces[1]=> 1]);
                //$Permission2 = Permission::where('name',$pieces[0])->first();

                $folder_id = DB::table('folders')->where('name', $pieces[0])->get("folders.id");


                    DB::table('folder_permissions')
                    ->where('folder_id',$folder_id[0]->id)
                    ->where('role_id',$id)
                    ->update([$pieces[1]=> 1]); 
            }


        }
        
    
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Role::find($id)->delete();
        
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }

    public function getPermissions(Request $request, $folder_name){


      /*  $p = DB::table('model_has_roles')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->join('role_has_permissions', 'role_has_permissions.role_id', '=', 'roles.id')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->where('model_has_roles.model_id', '=', auth()->user()->id)
            ->where( 'permissions.name', '=', $folder_name )
            ->select('permissions.name','permissions.upload_files','permissions.download_files','permissions.create_folders','permissions.delete_files','permissions.rename_files')
            ->get();

            */
            $p = DB::table('model_has_roles')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->join('folder_permissions', 'folder_permissions.role_id', '=', 'roles.id')
            ->join('folders', 'folders.id', '=', 'folder_permissions.folder_id')
            ->where('model_has_roles.model_id', '=', auth()->user()->id)
            ->where( 'folders.name', '=', $folder_name )
            ->select('folders.name','folder_permissions.upload_files','folder_permissions.download_files','folder_permissions.create_folders','folder_permissions.delete_files','folder_permissions.rename_files')
            ->get();

        return $p;

    }
}