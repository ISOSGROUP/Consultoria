<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
//use Auth;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        $permissions = DB::table('model_has_roles')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->join('role_has_permissions', 'role_has_permissions.role_id', '=', 'roles.id')
        ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
  
        ->where('model_has_roles.model_id', '=', auth()->user()->id)
        //->select('our_information.id','our_information.seccion','our_img.textitle','our_img.img','our_img.id AS img_id')
        ->select('permissions.name')
        ->get();
        */
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
