<?php

namespace App\Http\Controllers;

use App\Models\EmpresaTrasladoTipoMovilidadesContratoCupo;
use App\Models\EmpresaTrasladoTipoMovilidade;
use App\Models\ServicioTraslado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Class EmpresaTrasladoTipoMovilidadesContratoCupoController
 * @package App\Http\Controllers
 */
class EmpresaTrasladoTipoMovilidadesContratoCupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($empresa_traslado_tipo_movilidades_Id,$idserviciotraslado)
    {
        $empresaTrasladoTipoMovilidadesContratoCupos = EmpresaTrasladoTipoMovilidadesContratoCupo::where('Empresa_traslado_tipo_movilidades_id',$empresa_traslado_tipo_movilidades_Id)
        ->where('Servicio_traslado_Id',$idserviciotraslado)
        ->paginate();

        return view('empresa-traslado-tipo-movilidades-contrato-cupo.index', compact('empresaTrasladoTipoMovilidadesContratoCupos','empresa_traslado_tipo_movilidades_Id','idserviciotraslado'))
            ->with('i', (request()->input('page', 1) - 1) * $empresaTrasladoTipoMovilidadesContratoCupos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($empresa_traslado_tm_Id,$idserviciotraslado)
    {
        $empresaTrasladoTipoMovilidadesContratoCupo = new EmpresaTrasladoTipoMovilidadesContratoCupo();
        $empresaTrasladoTipoMovilidade = EmpresaTrasladoTipoMovilidade::with('tipoMovilidade','empresaTraslado')->get()
        ->map(function($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->tipoMovilidade->Nombre_tipo_movilidad . '-' . $item->empresaTraslado->Nombre_empresa_traslado
            ];
        })
        ->pluck('nombre', 'id');
        $ServicioTraslado= ServicioTraslado::pluck('Nombre_Servicio', 'id');
        

        return view('empresa-traslado-tipo-movilidades-contrato-cupo.create', compact('empresaTrasladoTipoMovilidadesContratoCupo','empresaTrasladoTipoMovilidade','ServicioTraslado','empresa_traslado_tm_Id','idserviciotraslado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmpresaTrasladoTipoMovilidadesContratoCupo::$rules);

        $empresaTrasladoTipoMovilidadesContratoCupo = EmpresaTrasladoTipoMovilidadesContratoCupo::create($request->all());

        return redirect()->route('etmcc.index',[$empresaTrasladoTipoMovilidadesContratoCupo->Empresa_traslado_tipo_movilidades_id,$empresaTrasladoTipoMovilidadesContratoCupo->Servicio_traslado_Id])
            ->with('success', 'EmpresaTrasladoTipoMovilidadesContratoCupo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresaTrasladoTipoMovilidadesContratoCupo = EmpresaTrasladoTipoMovilidadesContratoCupo::find($id);
    
       return view('empresa-traslado-tipo-movilidades-contrato-cupo.show', compact('empresaTrasladoTipoMovilidadesContratoCupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresaTrasladoTipoMovilidadesContratoCupo = EmpresaTrasladoTipoMovilidadesContratoCupo::find($id);
        $empresaTrasladoTipoMovilidade = EmpresaTrasladoTipoMovilidade::with('tipoMovilidade','empresaTraslado')->get()
        ->map(function($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->tipoMovilidade->Nombre_tipo_movilidad . '-' . $item->empresaTraslado->Nombre_empresa_traslado
            ];
        })
        ->pluck('nombre', 'id');

        $ServicioTraslado= ServicioTraslado::pluck('Nombre_Servicio', 'id');
        return view('empresa-traslado-tipo-movilidades-contrato-cupo.edit', compact('empresaTrasladoTipoMovilidadesContratoCupo','empresaTrasladoTipoMovilidade','ServicioTraslado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmpresaTrasladoTipoMovilidadesContratoCupo $empresaTrasladoTipoMovilidadesContratoCupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpresaTrasladoTipoMovilidadesContratoCupo $empresaTrasladoTipoMovilidadesContratoCupo)
    {
        request()->validate(EmpresaTrasladoTipoMovilidadesContratoCupo::$rules);

      
       
      
        $empresaTrasladoTipoMovilidadesContratoCupo->update($request->all());
       
   
 

        return redirect()->route('etmcc.index',[$request['Empresa_traslado_tipo_movilidades_id'],$request['Servicio_traslado_Id']])
              ->with('success', 'EmpresaTrasladoTipoMovilidadesContratoCupo updated successfully');
     }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empresaTrasladoTipoMovilidadesContratoCupo = EmpresaTrasladoTipoMovilidadesContratoCupo::find($id)->delete();

        return redirect()->route('etmcc.index',[$empresaTrasladoTipoMovilidadesContratoCupo->Empresa_traslado_tipo_movilidades_id,$empresaTrasladoTipoMovilidadesContratoCupo->Servicio_traslado_Id])
            ->with('success', 'EmpresaTrasladoTipoMovilidadesContratoCupo deleted successfully');
    }
}
