<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller 
{
    //

    public function showprofile()
    {
       
        return view('profile.show');
    
    }
    
    public function getRoleNames()
    {
        return $this->belongsToMany(Role::class);

    }

    public function index(Request $request)
    {      
        //Sin paginación
        /* $usuarios = User::all();
        return view('usuarios.index',compact('usuarios')); */

        //Con paginación
        $usuarios = User::latest()->paginate(5);
        return view('usuarios.index',compact('usuarios'));

        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $usuarios->links() !!}
    }

    public function create()
    {
        //aqui trabajamos con name de las tablas de users
        $roles = Role::pluck('name','name')->all();
        return view('usuarios.create',compact('roles'));
    
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('usuarios.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('usuarios.edit',compact('user','roles','userRole'));
    }
    

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('usuarios.index');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }

    public function updateUserProfile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ],
        [
            'name.required' => 'Ingresa un nombre valido, no puede estar vacio el campo.',
            'email.required' => 'El email no puede ser vacio.',
        ],
    );
    
        $input = $request->all();
      
        $users = User::find($id);
        $users->update($input);
        
        return redirect()->route('home');
    }

    public function updateUserPassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'same:confirm-password',
        ], 
        [
            'password.same' => 'Las Contraseñas ingresadas no coinciden.',
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        return redirect()->route('home');
    }


}
