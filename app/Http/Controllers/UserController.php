<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Hash;
use Flash;
use Response;
use DB;
use Auth;


class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('permission:user-list|Gestión-usuarios', ['only' => ['index']]);
        //$this->middleware('permission:user-create', ['only' => ['create','store']]);
        //$this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        //$this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:Gestión-usuarios', ['only' => ['show','create','edit','store','destroy']]);

    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();

        return view('users.index')->with('users', $users);
    }
    public function filemanagerIndex(Request $request)
    {

        return view('manage_foldes.test');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
       
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
         
        //$users = $this->userRepository->createUser($request);
            
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        Flash::success('Usuario creado con éxito.');
        
        return redirect()->route('users.index');
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        $userRole = $user->roles->all();

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user)->with('userRole', $userRole);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $user = $this->userRepository->find($id);
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));



        
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {

      $users = $this->userRepository->updateUser($id,$request);
      DB::table('model_has_roles')->where('model_id',$id)->delete();
      $user = User::find($id);
      $user->assignRole($request->input('roles'));

      Flash::success('Usuario actualizado con éxito');
      return redirect()->route('users.index');
    }

   
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);
        Flash::success('Usuario eliminado con éxito');
        return redirect(route('users.index'));
    }


    public function myPerfil(Request $request){


        $user = $this->userRepository->find(auth()->user()->id);

        $roles = Role::all();

        return view('my_perfil.edit',compact('user','roles'));

    }

}
