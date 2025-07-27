<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacionHotel;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\TipoHabitacionGeneral;

/**
 * Class TipoHabitacionHotelController
 * @package App\Http\Controllers
 */
class TipoHabitacionHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoHabitacionHotels = TipoHabitacionHotel::paginate();

        return view('tipo-habitacion-hotel.index', compact('tipoHabitacionHotels'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoHabitacionHotels->perPage());
    }
    public function index2($Hotel_Id_Hotel)
    {
        $tipoHabitacionHotels = TipoHabitacionHotel::where('Hotel_Id_Hotel','=',$Hotel_Id_Hotel)
        ->orderBy('Nombre_Habitacion', 'desc')
        ->paginate();
       $nombreHotel=$this->nombre_hotel($Hotel_Id_Hotel);

        return view('tipo-habitacion-hotel.index', compact('tipoHabitacionHotels','Hotel_Id_Hotel','nombreHotel'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoHabitacionHotels->perPage());
    }
    public function nombre_hotel($Hotel_Id_Hotel)
    {
        $tipoHabitacionHotels = Hotel::where('Id_Hotel','=',$Hotel_Id_Hotel)->get();
        $hotel=$tipoHabitacionHotels[0];
        return $hotel->Nombre_Hotel;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tipoHabitacionGeneral=TipoHabitacionGeneral::pluck('Nombre_general_Habitacion','id');
        $hotel=Hotel::pluck('Nombre_Hotel',	'Id_Hotel');
        

        $tipoHabitacionHotel = new TipoHabitacionHotel();
        return view('tipo-habitacion-hotel.create', compact('tipoHabitacionHotel','tipoHabitacionGeneral','hotel'));
    }
    public function create2($Hotel_Id_Hotel)
    {

        $tipoHabitacionGeneral=TipoHabitacionGeneral::pluck('Nombre_general_Habitacion','id');
        $hotel=Hotel::where('Id_Hotel','=',$Hotel_Id_Hotel)->pluck('Nombre_Hotel',	'Id_Hotel');
        

        $tipoHabitacionHotel = new TipoHabitacionHotel();
        return view('tipo-habitacion-hotel.create', compact('tipoHabitacionHotel','tipoHabitacionGeneral','hotel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoHabitacionHotel::$rules);

        $tipoHabitacionHotel = TipoHabitacionHotel::create($request->all());

        return redirect()->route('tipo-habitacion-hotels.index2',$request["Hotel_Id_Hotel"])
            ->with('success', 'TipoHabitacionHotel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoHabitacionHotel = TipoHabitacionHotel::find($id);
        //$hotel=Hotel::pluck('Nombre_Hotel',	'Id_Hotel');
        $hotel1=Hotel::find($tipoHabitacionHotel->Hotel_Id_Hotel);
        $tipoHabitacionGeneral1=TipoHabitacionGeneral::find($tipoHabitacionHotel->Tipo_Habitacion_general_Id_tipo_Habitacion_general);
        $tipoHabitacionGeneral= $tipoHabitacionGeneral1->Nombre_general_Habitacion;
        $hotel=$hotel1->Nombre_Hotel;

        return view('tipo-habitacion-hotel.show', compact('tipoHabitacionHotel','tipoHabitacionGeneral','hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoHabitacionGeneral=TipoHabitacionGeneral::pluck('Nombre_general_Habitacion','id');
        $tipoHabitacionHotel = TipoHabitacionHotel::find($id);
        $hotel=Hotel::pluck('Nombre_Hotel',	'Id_Hotel');

        return view('tipo-habitacion-hotel.edit', compact('tipoHabitacionHotel','tipoHabitacionGeneral','hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoHabitacionHotel $tipoHabitacionHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoHabitacionHotel $tipoHabitacionHotel)
    {
        request()->validate(TipoHabitacionHotel::$rules);

        $tipoHabitacionHotel->update($request->all());

        return redirect()->route('tipo-habitacion-hotels.index2',$request["Hotel_Id_Hotel"])
            ->with('success', 'TipoHabitacionHotel updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoHabitacionHotel = TipoHabitacionHotel::find($id)->delete();

        return redirect()->route('tipo-habitacion-hotels.index')
            ->with('success', 'TipoHabitacionHotel deleted successfully');
    }
}
