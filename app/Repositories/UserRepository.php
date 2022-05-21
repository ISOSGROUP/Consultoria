<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Hash;
use DB;


/**
 * Class UserRepository
 * @package App\Repositories
 * @version November 9, 2021, 1:43 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'role',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
    public function createUser(CreateUserRequest $request )
    {
      $input = $request->all();
      $input['password'] = Hash::make($input['password']);
      $user = $this->create($input);
      $user->assignRole($request->input('roles'));
      return $user;   
    }
    public function updateUser($id, UpdateUserRequest $request)
    {
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        $user = $this->find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
      return $user;   
    }
   
}
