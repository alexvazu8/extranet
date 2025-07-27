<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
         // Lista de Hoteles
         $id_usuario=auth()->user()->getAuthIdentifier();
        
      
         $hotel = Hotel::join("hotel_users","hotels.Id_hotel","hotel_users.hotel_Id_hotel")->where("hotel_users.users_id","=",$id_usuario)->paginate(5);
     

        return view('home',compact('hotel'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
