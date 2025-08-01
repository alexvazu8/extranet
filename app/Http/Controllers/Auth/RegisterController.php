<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Hotel_user;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           // 'celular' => ['required', 'string', 'min:7', 'confirmed'],
            //'tipo_usuario' => ['required', 'string', 'min:1', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     *  @return \App\Models\Hotel
     */
    protected function create(array $data)
    {
        
       /* $user= new User;
       
         $user->name=$data['name'];
         $user->email=$data['email'];
         $user->password=Hash::make($data['password']);
         $user->celular=$data['celular'];
         $user->tipo_usuario=$data['tipo_usuario'];
        
         $response= $user->save();*/
      
           

          $response= User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'celular' => $data['celular'],
                'tipo_usuario' => $data['tipo_usuario'],
            ]);  
           
            if($data['tipo_usuario']=='H') 
            { 

                //$response->assignRole('UsuarioHotel');
            }
            else
            { //Operadora

               // $response->assignRole('UsuarioOperadora');

            }
            return $response;


    }
}