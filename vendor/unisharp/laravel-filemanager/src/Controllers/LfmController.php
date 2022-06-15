<?php

namespace UniSharp\LaravelFilemanager\Controllers;

use UniSharp\LaravelFilemanager\Lfm;
use UniSharp\LaravelFilemanager\LfmPath;
use Auth;
use DB;

class LfmController extends Controller
{
    protected static $success_response = 'OK';

    public function __construct()
    {
        $this->applyIniOverrides();
    }

    /**
     * Set up needed functions.
     *
     * @return object|null
     */
    public function __get($var_name)
    {
        if ($var_name === 'lfm') {
            return app(LfmPath::class);
        } elseif ($var_name === 'helper') {
            return app(Lfm::class);
        }
    }

    /**
     * Show the filemanager.
     *
     * @return mixed
     */
    public function show()
    {
      //  dd("test2");


      $permissions = DB::table('model_has_roles')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->join('folder_permissions', 'folder_permissions.role_id', '=', 'roles.id')
                    ->join('folders', 'folders.id', '=', 'folder_permissions.folder_id')
                    ->where('model_has_roles.model_id', '=', auth()->user()->id)
                    //->where( 'folders.name', '=', $folder_name )
                    ->select('folders.name','folder_permissions.upload_files','folder_permissions.download_files','folder_permissions.create_folders','folder_permissions.delete_files','folder_permissions.rename_files')
                    ->get();

       // dd($permissions);
       //$permissions = "rrr";
        return view('laravel-filemanager::index')->with('permissions', $permissions)->withHelper($this->helper);
    }

    /**
     * Check if any extension or config is missing.
     *
     * @return array
     */
    public function getErrors()
    {
        $arr_errors = [];

        if (! extension_loaded('gd') && ! extension_loaded('imagick')) {
            array_push($arr_errors, trans('laravel-filemanager::lfm.message-extension_not_found'));
        }

        if (! extension_loaded('exif')) {
            array_push($arr_errors, 'EXIF extension not found.');
        }

        if (! extension_loaded('fileinfo')) {
            array_push($arr_errors, 'Fileinfo extension not found.');
        }

        $mine_config_key = 'lfm.folder_categories.'
            . $this->helper->currentLfmType()
            . '.valid_mime';

        if (! is_array(config($mine_config_key))) {
            array_push($arr_errors, 'Config : ' . $mine_config_key . ' is not a valid array.');
        }

        return $arr_errors;
    }

    /**
     * Overrides settings in php.ini.
     *
     * @return null
     */
    public function applyIniOverrides()
    {
        $overrides = config('lfm.php_ini_overrides', []);

        if ($overrides && is_array($overrides) && count($overrides) === 0) {
            return;
        }

        foreach ($overrides as $key => $value) {
            if ($value && $value != 'false') {
                ini_set($key, $value);
            }
        }
    }
}
