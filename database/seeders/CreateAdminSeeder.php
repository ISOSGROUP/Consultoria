<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Schema;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();
        //DB::table('model_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('model_has_roles')->truncate();
        Schema::enableForeignKeyConstraints();


        $user = User::create([
        	'name' => 'isos', 
        	'email' => 'isos@yopmail.com',
        	'password' => bcrypt('123456')
        ]);
  
        $listPermisos[0] = ['name' => 'Gestión-usuarios','guard_name' => 'web','type' => 'm'];
        $listPermisos[1] = ['name' => 'Gestión-roles','guard_name' => 'web','type' => 'm'];
        $listPermisos[2] = ['name' => 'cambiar fecha en apartado partes interesadas','guard_name' => 'web','type' => 'm'];
        $listPermisos[3] = ['name' => 'cambiar fecha en apartado riesgo-oportunidad','guard_name' => 'web','type' => 'm'];


        foreach($listPermisos as $permission){
            $p = Permission::create($permission);
             
        }

        $Admin = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $Admin->syncPermissions($permissions);
        $user->assignRole([$Admin->id]);

        $folder_id = DB::table('folders')->insertGetId(
            ['name'=>"Archivos_Compartidos"]
        );
        DB::table('foda_users')->insert(['name'=>"test_user_1"]);
        DB::table('foda_users')->insert(['name'=>"test_user_2"]);

        DB::table('folder_permissions')->insert([
            'folder_id'=> $folder_id,
            'role_id'=> $Admin->id,
            'view_files'=> 1,
            //'upload_files'=> 0,
            //'download_files'=> 0,
            //'create_folders'=> 0,
            //'delete_files'=> 0,
            //'rename_files'=> 0
        ]); 
    }
}
