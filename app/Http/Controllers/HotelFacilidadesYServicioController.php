<?php

namespace App\Http\Controllers;

use App\Models\HotelFacilidadesYServicio;
use App\Models\FacilidadesYServiciosGeneral;

use Illuminate\Http\Request;

/**
 * Class HotelFacilidadesYServicioController
 * @package App\Http\Controllers
 */
class HotelFacilidadesYServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotelFacilidadesYServicios = HotelFacilidadesYServicio::paginate();

        return view('hotel-facilidades-y-servicio.index', compact('hotelFacilidadesYServicios'))
            ->with('i', (request()->input('page', 1) - 1) * $hotelFacilidadesYServicios->perPage());
    }

    public function buscar_por_hotel($Hotel_Id_Hotel)
    {
        $hotelFacilidadesYServicios = HotelFacilidadesYServicio::where('Hotel_Id_Hotel',$Hotel_Id_Hotel)->paginate();

        return view('hotel-facilidades-y-servicio.index', compact('hotelFacilidadesYServicios','Hotel_Id_Hotel'))
            ->with('i', (request()->input('page', 1) - 1) * $hotelFacilidadesYServicios->perPage());
    }
    public function mostrar_Facilidades_y_Servicios_generales($Hotel_Id_Hotel)
    { 
        $facilidadesYServiciosGenerals = FacilidadesYServiciosGeneral::get();

        return view('hotel-facilidades-y-servicio.lista_general', compact('facilidadesYServiciosGenerals','Hotel_Id_Hotel'));
    }

    public function registrar_lista(Request $request)
    { 

        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'required',
            // Resto de las reglas de validación para los otros campos del formulario
        ], [
            'ids.required' => 'Debe seleccionar al menos un campo.',
            'ids.min' => 'Debe seleccionar al menos un campo.',
            // Mensajes de error personalizados para las reglas de validación
        ]);

        $ids = $request->input('ids');
    $textos = $request->input('textos');
    $costos = $request->input('costos');
    $monedas = $request->input('monedas');
    
    // Iterar sobre los IDs seleccionados
        foreach ($ids as $id) {
            $texto = $textos[$id];
            $costo= $costos[$id];
            $moneda=$monedas[$id];
            
            // Guardar el ID y el texto en la base de datos
            $hotelFacilidadesYServicio = new HotelFacilidadesYServicio();
           // $hotelFacilidadesYServicio->id = $id;
            $hotelFacilidadesYServicio->Hotel_Id_Hotel = $request->input('Hotel_Id_Hotel');
            $hotelFacilidadesYServicio->facilidades_y_servicios_generales_Id_facilidad_y_servicio_genera = $id;
            $hotelFacilidadesYServicio->texto_facilidad = $texto;
            $hotelFacilidadesYServicio->costo = $costo;
            $hotelFacilidadesYServicio->moneda = $moneda;
            $hotelFacilidadesYServicio->save();
        }
    
    // Redirigir o realizar otras acciones
    $Hotel_Id_Hotel=$request->input('Hotel_Id_Hotel');
    $hotelFacilidadesYServicios=$hotelFacilidadesYServicio->where('Hotel_Id_Hotel',$Hotel_Id_Hotel)->paginate();
    return redirect()->route('hotel-facilidades-y-servicios.buscar_por_hotel',$Hotel_Id_Hotel)
    ->with('success', 'HotelFacilidadesYServicio created successfully.');
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotelFacilidadesYServicio = new HotelFacilidadesYServicio();
        return view('hotel-facilidades-y-servicio.create', compact('hotelFacilidadesYServicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HotelFacilidadesYServicio::$rules);

        $hotelFacilidadesYServicio = HotelFacilidadesYServicio::create($request->all());

        return redirect()->route('hotel-facilidades-y-servicios.index')
            ->with('success', 'HotelFacilidadesYServicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotelFacilidadesYServicio = HotelFacilidadesYServicio::find($id);

        return view('hotel-facilidades-y-servicio.show', compact('hotelFacilidadesYServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotelFacilidadesYServicio = HotelFacilidadesYServicio::find($id);

        return view('hotel-facilidades-y-servicio.edit', compact('hotelFacilidadesYServicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HotelFacilidadesYServicio $hotelFacilidadesYServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelFacilidadesYServicio $hotelFacilidadesYServicio)
    {
        request()->validate(HotelFacilidadesYServicio::$rules);

        $Hotel_Id_Hotel=$request->Hotel_Id_Hotel;
        $hotelFacilidadesYServicio->update($request->all());

        return redirect()->route('hotel-facilidades-y-servicios.buscar_por_hotel', $Hotel_Id_Hotel)
            ->with('success', 'HotelFacilidadesYServicio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $hotelFacilidadesYServicio = HotelFacilidadesYServicio::find($id);
        $Hotel_Id_Hotel = $hotelFacilidadesYServicio->Hotel_Id_Hotel;
       // Print_r($Hotel_Id_Hotel);
        $hotelFacilidadesYServicio->delete();
       return redirect()->route('hotel-facilidades-y-servicios.buscar_por_hotel', $Hotel_Id_Hotel)
            ->with('success', 'HotelFacilidadesYServicio deleted successfully');
            
    }
}
