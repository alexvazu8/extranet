<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Paise;
use App\Models\Ciudade;
use App\Models\Estrella;
use App\Models\Zona;
use App\Models\Hotel_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lista de Hoteles
        $id_usuario=auth()->user()->getAuthIdentifier();
        
      
        $hotel = Hotel::join("hotel_users","hotels.Id_hotel","hotel_users.hotel_Id_hotel")->where("hotel_users.users_id","=",$id_usuario)->paginate(5);
    
        return view('hotels.index',compact('hotel'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function estrellasDesc()
    { 
        // Lista de Hoteles

        
        $id_usuario=auth()->user()->getAuthIdentifier();
        
      
        $hotel = Hotel::join("hotel_users","hotels.Id_hotel","hotel_users.hotel_Id_hotel")
        ->join("estrellas", "hotels.estrellas_id", "=", "estrellas.id") // Unimos la tabla "Estrellas"
        ->orderByDesc("estrellas.estrellas") // Ordenamos descendente por el campo "estrellas" de la tabla "Estrellas"
        ->where("hotel_users.users_id","=",$id_usuario)->paginate(5);
    
        return view('hotels.index',compact('hotel'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function estrellasAsc()
    { 
        // Lista de Hoteles

        
        $id_usuario=auth()->user()->getAuthIdentifier();
        
      
        $hotel = Hotel::join("hotel_users","hotels.Id_hotel","hotel_users.hotel_Id_hotel")
        ->join("estrellas", "hotels.estrellas_id", "=", "estrellas.id") // Unimos la tabla "Estrellas"
        ->orderBy("estrellas.estrellas") // Ordenamos descendente por el campo "estrellas" de la tabla "Estrellas"
        ->where("hotel_users.users_id","=",$id_usuario)->paginate(5);
    
        return view('hotels.index',compact('hotel'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @param  \App\Models\Ciudade  $Ciudad
     * @return \Illuminate\Http\Response
     */

    public function buscar_hotel($buscar_hotel)
    {
        // Lista de Hoteles
        
        $Hotel=New Hotel;
       $Hoteles=$Hotel->where('Nombre_Hotel','%'.$Buscar_hotel.'%')->get();
       
       dd('aa');


        return $Hoteles;

    }
    public function ciudades($Id_Pais)
    {
        // Lista de Paices
        
        $Ciudad=New Ciudade;
       $Ciudades=$Ciudad->where('Pais_Id_Pais',$Id_Pais)->get();
       
       

      
        return $Ciudades;

    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @param  \App\Models\Ciudade  $Ciudad
     * @return \Illuminate\Http\Response
     */

    public function zonas($Id_Ciudad)
    {
        // Lista de Paices
        
        $Zona=New Zona;
       $Zonas=$Zona->where('Ciudad_Id_Ciudad',$Id_Ciudad)->get();
       
       


        return $Zonas;

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Lista de Paices
        
        $Pais=New Paise;
        $Pais->Nombre_Pais;
        $Paises=$Pais->all();
        $estrellas=Estrella::all();

        return view('hotels.create', compact('estrellas'))->with('Paises', $Paises);

    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Nombre_hotel' => 'required',
            'Numero_identificacion_tributaria' => 'required',
        ]);
        $hotel= new Hotel;
       // $informacion=$request->all();
     
       // Si hay una nueva foto, manejar la subida
        if ($request->hasFile('Foto_Principal_Hotel')) {
            // Subir la imagen al almacenamiento público y obtener la ruta
            $path = $request->file('Foto_Principal_Hotel')->store('hotels', 'public');

            // Actualiza el path en la base de datos
            $hotel->Foto_Principal_Hotel = $path;
        }
       // $hotel->create($request->all());
        $hotel->Nombre_Hotel=$request->Nombre_hotel;
        $hotel->Numero_identificacion_tributaria=$request->Numero_identificacion_tributaria;
        $hotel->Direccion_Hotel=$request->Direccion_Hotel;
        $hotel->Telefono_reservas_hotel=$request->Telefono_reservas_hotel;
        $hotel->Cel_reservas_hotel=$request->Cel_reservas_hotel;
        $hotel->email_reservas_hotel=$request->email_reservas_hotel;
        $hotel->email_comercial_hotel=$request->email_comercial_hotel;
        $hotel->Pais_Id_Pais=$request->Id_Pais;
        $hotel->ciudad_Id_ciudad=$request->Id_Ciudad;
        $hotel->Zona_Id_Zona=$request->Id_Zona;
        $hotel->estrellas_id=$request->estrellas_id;
        //print_r($request);
       
        $hotel->save();


        $Hotel_user= new Hotel_user;
        $Hotel_user->hotel_Id_hotel=$hotel->Id_Hotel;
        $Hotel_user->users_id=auth()->id();
        $Hotel_user->activo=0;
        $Hotel_user->save();
        

     
        return redirect()->route('hotels.index')
                        ->with('success','Hotel Creado Satisfactoriamente!!!.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
        return view('hotels.show',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
        
        $Pais=New Paise;
        $Pais->Nombre_Pais;
        $Paises=$Pais->all();
        $estrellas=Estrella::all();

        $ciudades=$this->ciudades($hotel->Pais_Id_Pais);
        $zonas=$this->zonas($hotel->ciudad_Id_ciudad);
        

      

        return view('hotels.edit',compact('hotel','ciudades','zonas','estrellas'))->with('Paises', $Paises);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
        $request->validate([
            'Nombre_hotel' => 'required',
            'Numero_identificacion_tributaria' => 'required',
        ]);
        $informacion=$request->all();
       
       // Si hay una nueva foto, manejar la subida
        if ($request->hasFile('Foto_Principal_Hotel')) {
            // Subir la imagen al almacenamiento público y obtener la ruta
            $path = $request->file('Foto_Principal_Hotel')->store('hotels', 'public');
    
            // Elimina la imagen anterior si existe
            if ($hotel->Foto_Principal_Hotel) {
                Storage::disk('public')->delete($hotel->Foto_Principal_Hotel);
            }
    
            // Actualiza el path en la base de datos
            $hotel->Foto_Principal_Hotel = $path;
            $informacion['Foto_Principal_Hotel']=$hotel->Foto_Principal_Hotel;
            
        }
       
        $informacion['Pais_Id_Pais']=$informacion['Id_Pais'];
        $informacion['ciudad_Id_ciudad']=$informacion['Id_Ciudad'];
        $informacion['Zona_Id_Zona']=$informacion['Id_Zona'];
        //print_r($informacion);
          $hotel->update($informacion);
    
       return redirect()->route('hotels.index')
                        ->with('success','Hotel Actualizado satisfactoriamente');
  
    }

    public function editcoordenadas($id)
    {
        // Lista de hoteles y enviar a la pagina.
      
        
            $Hotel = Hotel::find($id);
            //print_r($Hotel);
    
            return view('hotels.editcoordenadas', compact('Hotel'));
       

    }

    public function updatecoordenadas(Request $request, $id)
    {
        
        $request->validate([
            'Latitud' => 'required',
            'Longitud' => 'required',
        ]);
        $informacion=$request->all();
        //echo $id;
        $hotel = Hotel::findOrFail($id);
       // print_r($requet);
        $hotel->Latitud = $request->Latitud;
        $hotel->Longitud = $request->Longitud;
        $hotel->save();
      
       
       return redirect()->route('hotels.show',$id)
                       ->with('success','Hotel Actualizado satisfactoriamente');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        // Elimina la imagen en disco si existe
        if ($hotel->Foto_Principal_Hotel) {
            Storage::disk('public')->delete($hotel->Foto_Principal_Hotel);
        }
        $hotel->delete();
    
        return redirect()->route('hotels.index')
                        ->with('success','Hotel deleted successfully');
    }

}