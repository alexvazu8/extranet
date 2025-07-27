<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ToursContratoCupo;

use App\Models\User;
use App\Models\Tour;

class WebServiceController extends Controller
{
    //
    
    public function getTourContratoCupo()
    {
    return response()->json(ToursContratoCupo::all(),200);
    }

    public function getDispoTour($email,$password)
    {
       // echo $password;
        $pass=Hash::make($password);
        $pass = hash('sha224', $password);
        print_r($pass);
        print_r( hash_algos());
      $usuario=  User::where('email', '=', $email)
      ->where('password', $pass)
      ->get();
     
        foreach($usuario->all() as $us) {  print_r($markup=$us->markup);}
       if(null==$usuario->all()) {
            
        return response()->json(['Mensaje'=>'Login error'],404);
       }

      //$tours=  Tour::where('Ciudad_Id_Ciudad', '=', $Ciudad_Id_Ciudad);
      
      return response()->json($usuario->all(),200);
    //return response()->json(ToursContratoCupo::where(),200);
    }
}
