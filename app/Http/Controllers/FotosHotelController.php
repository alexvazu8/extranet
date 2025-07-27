<?php

namespace App\Http\Controllers;

use App\Models\FotosHotel;
use App\Models\GrupoFotosHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class FotosHotelController
 * @package App\Http\Controllers
 */
class FotosHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotosHotels = FotosHotel::paginate();

        return view('fotos-hotel.index', compact('fotosHotels'))
            ->with('i', (request()->input('page', 1) - 1) * $fotosHotels->perPage());
    }

    public function indexhotel($Hotel_Id_Hotel)
    {
        $fotosHotels = FotosHotel::where('Hotel_Id_Hotel',$Hotel_Id_Hotel)->paginate();

        return view('fotos-hotel.index', compact('fotosHotels','Hotel_Id_Hotel'))
            ->with('i', (request()->input('page', 1) - 1) * $fotosHotels->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fotosHotel = new FotosHotel();
        return view('fotos-hotel.create', compact('fotosHotel'));
    }

    public function createporhotel($Hotel_Id_Hotel)
    {
        $fotosHotel = new FotosHotel();
        $grupoFoto=  GrupoFotosHotel::get();
        return view('fotos-hotel.create', compact('fotosHotel','Hotel_Id_Hotel','grupoFoto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FotosHotel::$rules);
        $informacion=$request->all();
      
        
        
        if($request->hasFile('Foto_Hotel'))
        {
          
         
         $path = $request->file('Foto_Hotel')->store('hotels', 'public');

        // Actualiza el path en la base de datos
        $informacion['Foto_Hotel'] = $path;
       
 
       
         
        }
         $Hotel_Id_Hotel= $informacion['Hotel_Id_Hotel'];
        
      
       $fotosHotel = FotosHotel::create($informacion);
       
       return redirect()->route('fotos-hotels.indexhotel',$Hotel_Id_Hotel)
            ->with('success', 'FotosHotel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fotosHotel = FotosHotel::find($id);
        $Hotel_Id_Hotel= $fotosHotel->Hotel_Id_Hotel;
        //print_r( $fotosHotel->all());

        return view('fotos-hotel.show', compact('fotosHotel','Hotel_Id_Hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fotosHotel = FotosHotel::find($id);
        $Hotel_Id_Hotel= $fotosHotel->Hotel_Id_Hotel;
        $grupoFoto=  GrupoFotosHotel::get();

        return view('fotos-hotel.edit', compact('fotosHotel','Hotel_Id_Hotel','grupoFoto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FotosHotel $fotosHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FotosHotel $fotosHotel)
    {
        request()->validate(FotosHotel::$rules);

        $informacion=$request->all();
       
       if($request->hasFile('Foto_Hotel'))
        {
          
         
         $path = $request->file('Foto_Hotel')->store('hotels', 'public');
         
          // Elimina la imagen anterior si existe
            if($fotosHotel->Foto_Hotel) {
                Storage::disk('public')->delete($fotosHotel->Foto_Hotel);
            }

        // Actualiza el path en la base de datos
        $informacion['Foto_Hotel'] = $path;
       
 
       
         
        }
         $Hotel_Id_Hotel= $informacion['Hotel_Id_Hotel'];

        $fotosHotel->update($informacion);

        return redirect()->route('fotos-hotels.indexhotel',$Hotel_Id_Hotel)
            ->with('success', 'FotosHotel updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fotosHotel = FotosHotel::find($id);

        $Hotel_Id_Hotel= $fotosHotel->Hotel_Id_Hotel;
        
         // Elimina la imagen anterior si existe
            if($fotosHotel->Foto_Hotel) {
                Storage::disk('public')->delete($fotosHotel->Foto_Hotel);
            }

        $fotosHotel->delete();

        return redirect()->route('fotos-hotels.indexhotel',$Hotel_Id_Hotel)
            ->with('success', 'FotosHotel deleted successfully');
    }
}
