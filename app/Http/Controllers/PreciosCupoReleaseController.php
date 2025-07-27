<?php

namespace App\Http\Controllers;

use App\Models\PoliticaCancelacion;
use App\Models\PreciosCupoRelease;
use App\Models\Regimen;
use App\Models\TipoHabitacionHotel;
use Illuminate\Http\Request;

/**
 * Class PreciosCupoReleaseController
 * @package App\Http\Controllers
 */
class PreciosCupoReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preciosCupoReleases = PreciosCupoRelease::paginate();

        return view('precios-cupo-release.index', compact('preciosCupoReleases'))
            ->with('i', (request()->input('page', 1) - 1) * $preciosCupoReleases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preciosCupoRelease = new PreciosCupoRelease();
        return view('precios-cupo-release.create', compact('preciosCupoRelease'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2($tipoHabitacionHotelId)
    {
        $preciosCupoRelease = new PreciosCupoRelease();
        //$preciosCupoRelease = PreciosCupoRelease::where('Tipo_habitacion_hotel_id_tipo_habitacion_hotel',$tipoHabitacionHotelId)
         //                                         ->get();
         $tipoHabitacionHotel= TipoHabitacionHotel::where('id',$tipoHabitacionHotelId)
                                                    ->get();
        $politicaCancelacion= new PoliticaCancelacion();
        $regimen= new Regimen();
        

        return view('precios-cupo-release.create_rango', compact('preciosCupoRelease','tipoHabitacionHotel','politicaCancelacion','regimen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PreciosCupoRelease::$rules);

        $preciosCupoRelease = PreciosCupoRelease::create($request->all());

        return redirect()->route('precios-cupo-releases.index')
            ->with('success', 'PreciosCupoRelease created successfully.');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_rango(Request $request)
    {
        
     request()->validate(PreciosCupoRelease::$rules2);
       
     $de=date("Y-m-d",strtotime($request->Fecha_de)); 
     $hasta=date("Y-m-d",strtotime($request->Fecha_hasta)); 
     while($de<=$hasta)
     {
        $request["Fecha_precio_cupo_release_noche"]  = $de;
            $preciosCupoRelease = PreciosCupoRelease::create($request->all());

            $de=date("Y-m-d",strtotime($de."+ 1 days"));
    
     }

        return redirect()->route('precios-cupo-releases.calendario',$request["Tipo_habitacion_hotel_id_tipo_habitacion_hotel"])
            ->with('success', 'Precios Cupo y Release created successfully.');
         



    
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preciosCupoRelease = PreciosCupoRelease::find($id);

        return view('precios-cupo-release.show', compact('preciosCupoRelease'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preciosCupoRelease = PreciosCupoRelease::find($id);
        //print_r($preciosCupoRelease);
        $tipoHabitacionHotel=TipoHabitacionHotel::find($preciosCupoRelease->Tipo_habitacion_hotel_id_tipo_habitacion_hotel);
        $regimen= new Regimen();
        $politicaCancelacion= new PoliticaCancelacion();
        return view('precios-cupo-release.edit', compact('preciosCupoRelease','tipoHabitacionHotel','regimen','politicaCancelacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PreciosCupoRelease $preciosCupoRelease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreciosCupoRelease $preciosCupoRelease)
    {
        request()->validate(PreciosCupoRelease::$rules);

        $preciosCupoRelease->update($request->all());

        return redirect()->route('precios-cupo-releases.calendario',$request["Tipo_habitacion_hotel_id_tipo_habitacion_hotel"])
            ->with('success', 'PreciosCupoRelease updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $preciosCupoRelease = PreciosCupoRelease::find($id)->delete();

        return redirect()->route('precios-cupo-releases.index')
            ->with('success', 'PreciosCupoRelease deleted successfully');
    }
    public function calendario($tipoHabitacionHotelId)
    {
        $preciosCupoRelease2 = PreciosCupoRelease::where('Tipo_habitacion_hotel_id_tipo_habitacion_hotel',$tipoHabitacionHotelId)
                                                    ->get();
        $tipoHabitacionHotel= TipoHabitacionHotel::where('id',$tipoHabitacionHotelId)
                                                    ->get();
        
        return view('precios-cupo-release.calendar', compact('preciosCupoRelease2','tipoHabitacionHotelId','tipoHabitacionHotel'));
    }

    public function cierre($tipoHabitacionHotelId)
    {
        // Lista de hoteles y enviar a la pagina.
       // echo $tipoHabitacionHotelId;
        
        $tipoHabitacionHotel=TipoHabitacionHotel::find($tipoHabitacionHotelId);
        //print_r($tipoHabitacionHotel);
            
    
            return view('precios-cupo-release.cierre', compact('tipoHabitacionHotelId','tipoHabitacionHotel'));
       

    }

    public function updatecierre(Request $request,$tipoHabitacionHotelId)
    {
        
        $request->validate([
            'Cierre' => 'required',
            'Fecha_de' => 'required',
            'Fecha_hasta' => 'required',
            'Tipo_habitacion_hotel_id_tipo_habitacion_hotel' => 'required',
        ]);
       
         echo "Este es el request: ";echo $request["Tipo_habitacion_hotel_id_tipo_habitacion_hotel"];
         echo " Este es el parametro ";echo $tipoHabitacionHotelId;
        
       
        $PreciosCupoRelease = PreciosCupoRelease::where('Tipo_habitacion_hotel_id_tipo_habitacion_hotel',$tipoHabitacionHotelId)
                                                                        ->whereBetween('Fecha_precio_cupo_release_noche', [$request['Fecha_de'], $request['Fecha_hasta']])
                                                                        ->get();
  //print_r($PreciosCupoRelease);
      
       // estructura Repetitiva.
        foreach($PreciosCupoRelease as $precio)
        {

            $PreciosCupoRelease2 = PreciosCupoRelease::findorfail($precio->id);
            $PreciosCupoRelease2->Cierre = $request->Cierre;
            $PreciosCupoRelease2->save();

         }
      
       
    return redirect()->route('precios-cupo-releases.calendario',$request["Tipo_habitacion_hotel_id_tipo_habitacion_hotel"])
    ->with('success', 'Precios Cupo y Release created successfully.');
  
    }

    public function show2($id)
    {
        $preciosCupoRelease = PreciosCupoRelease::find($id);

        $respuesta['Costo_habitacion']=$preciosCupoRelease->Costo_habitacion;
        $respuesta['Release']=$preciosCupoRelease->Release_habitacion;
        $respuesta['Cupo']=$preciosCupoRelease->Cupo_habitacion;
        $respuesta['Tipo_habitacion_hotel']=$preciosCupoRelease->tipoHabitacionHotel->Nombre_Habitacion;
        $respuesta['Fecha_precio']=$preciosCupoRelease->Fecha_precio_cupo_release_noche;
        if($preciosCupoRelease->Cierre==0)
        {   $respuesta['Cierre']='No';  }  
        else   
        {   $respuesta['Cierre']='Si';  }            
       
        $respuesta['Politica']=$preciosCupoRelease->politicaCancelacion->Nombre_Politica;
        $respuesta['Regimen']=$preciosCupoRelease->regimen->nombre_regimen;

    

        return $respuesta;
    }

}
