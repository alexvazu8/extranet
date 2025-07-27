<?php

namespace App\Http\Controllers;

use App\Models\ServicioTraslado;
use App\Models\EmpresaTrasladoTipoMovilidade;
use App\Models\Zona;
use Illuminate\Http\Request;

/**
 * Class ServicioTrasladoController
 * @package App\Http\Controllers
 */
class ServicioTrasladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($empresa_tipo_movilidades_Id)
    {
        $servicioTraslados = ServicioTraslado::where('empresa_traslado_tipo_movilidades_Id',$empresa_tipo_movilidades_Id)->paginate();

        return view('servicio-traslado.index', compact('servicioTraslados','empresa_tipo_movilidades_Id'))
            ->with('i', (request()->input('page', 1) - 1) * $servicioTraslados->perPage());
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $zonaOrigen=  Zona::select('Id_Zona', 'Nombre_Zona')->get();
        $zonaOrigens = $zonaOrigen->pluck('Nombre_Zona', 'Id_Zona');
        $zonaDestino= Zona::select('Id_Zona', 'Nombre_Zona')->get();
        $zonaDestinos = $zonaDestino->pluck('Nombre_Zona', 'Id_Zona');
        
        $servicioTraslado = new ServicioTraslado();
        return view('servicio-traslado.create', compact('servicioTraslado','zonaOrigens','zonaDestinos'));
    }

    public function create2($empresa_tipo_movilidades_Id)
    { 
       
        $zonaOrigen=  Zona::select('Id_Zona', 'Nombre_Zona')->get();
        $zonaOrigens = $zonaOrigen->pluck('Nombre_Zona', 'Id_Zona');
        $zonaDestino= Zona::select('Id_Zona', 'Nombre_Zona')->get();
        $zonaDestinos = $zonaDestino->pluck('Nombre_Zona', 'Id_Zona');
        $EmpresaTrasladoTipoMovilidade =  EmpresaTrasladoTipoMovilidade::find($empresa_tipo_movilidades_Id);
        $EmpresaTrasladoTipoMovilidade=$EmpresaTrasladoTipoMovilidade->pluck('Marca_modelo', 'id');
        $servicioTraslado = new ServicioTraslado();
        return view('servicio-traslado.create', compact('servicioTraslado','zonaOrigens','zonaDestinos','EmpresaTrasladoTipoMovilidade','empresa_tipo_movilidades_Id'));
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ServicioTraslado::$rules);

        $servicioTraslado = ServicioTraslado::create($request->all());

        return redirect()->route('servicio-traslados.index',$servicioTraslado->empresa_traslado_tipo_movilidades_Id)
            ->with('success', 'ServicioTraslado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicioTraslado = ServicioTraslado::find($id);

        return view('servicio-traslado.show', compact('servicioTraslado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zonaOrigen=  Zona::select('Id_Zona', 'Nombre_Zona')->get();
        $zonaOrigens = $zonaOrigen->pluck('Nombre_Zona', 'Id_Zona');
        $zonaDestino= Zona::select('Id_Zona', 'Nombre_Zona')->get();
        $zonaDestinos = $zonaDestino->pluck('Nombre_Zona', 'Id_Zona');
        $servicioTraslado = ServicioTraslado::find($id);
        $EmpresaTrasladoTipoMovilidade =  EmpresaTrasladoTipoMovilidade::find($servicioTraslado->empresa_traslado_tipo_movilidades_Id);
        $EmpresaTrasladoTipoMovilidade=$EmpresaTrasladoTipoMovilidade->pluck('Marca_modelo', 'id');

        return view('servicio-traslado.edit', compact('servicioTraslado','EmpresaTrasladoTipoMovilidade','zonaOrigens','zonaDestinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ServicioTraslado $servicioTraslado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicioTraslado $servicioTraslado)
    {
        request()->validate(ServicioTraslado::$rules);

        $servicioTraslado->update($request->all());

        return redirect()->route('servicio-traslados.index',$servicioTraslado->empresa_traslado_tipo_movilidades_Id)
            ->with('success', 'ServicioTraslado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $servicioTraslado = ServicioTraslado::find($id)->delete();

        return redirect()->route('servicio-traslados.index')
            ->with('success', 'ServicioTraslado deleted successfully');
    }
}
