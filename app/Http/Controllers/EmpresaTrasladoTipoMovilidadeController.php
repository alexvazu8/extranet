<?php

namespace App\Http\Controllers;

use App\Models\EmpresaTrasladoTipoMovilidade;
use App\Models\EmpresaTraslado;
use App\Models\TipoMovilidade;
use Illuminate\Http\Request;

/**
 * Class EmpresaTrasladoTipoMovilidadeController
 * @package App\Http\Controllers
 */
class EmpresaTrasladoTipoMovilidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresaTrasladoTipoMovilidades = EmpresaTrasladoTipoMovilidade::paginate();    

        return view('empresa-traslado-tipo-movilidade.index', compact('empresaTrasladoTipoMovilidades'))
            ->with('i', (request()->input('page', 1) - 1) * $empresaTrasladoTipoMovilidades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresaTrasladoTipoMovilidade = new EmpresaTrasladoTipoMovilidade();
        $empresaTraslado=  EmpresaTraslado::pluck('Nombre_empresa_traslado','id');
        $tipoMovilidades= TipoMovilidade::pluck('Nombre_tipo_movilidad','id');

        return view('empresa-traslado-tipo-movilidade.create', compact('empresaTrasladoTipoMovilidade','empresaTraslado','tipoMovilidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmpresaTrasladoTipoMovilidade::$rules);

        $empresaTrasladoTipoMovilidade = EmpresaTrasladoTipoMovilidade::create($request->all());

        return redirect()->route('empresa-traslado-tipo-movilidades.index')
            ->with('success', 'EmpresaTrasladoTipoMovilidade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresaTrasladoTipoMovilidade = EmpresaTrasladoTipoMovilidade::find($id);

        return view('empresa-traslado-tipo-movilidade.show', compact('empresaTrasladoTipoMovilidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresaTrasladoTipoMovilidade = EmpresaTrasladoTipoMovilidade::find($id);
        $empresaTraslado=  EmpresaTraslado::pluck('Nombre_empresa_traslado','id');
        $tipoMovilidades= TipoMovilidade::pluck('Nombre_tipo_movilidad','id');

        return view('empresa-traslado-tipo-movilidade.edit', compact('empresaTrasladoTipoMovilidade','empresaTraslado','tipoMovilidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmpresaTrasladoTipoMovilidade $empresaTrasladoTipoMovilidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpresaTrasladoTipoMovilidade $empresaTrasladoTipoMovilidade)
    {
        request()->validate(EmpresaTrasladoTipoMovilidade::$rules);

        $empresaTrasladoTipoMovilidade->update($request->all());

        return redirect()->route('empresa-traslado-tipo-movilidades.index')
            ->with('success', 'EmpresaTrasladoTipoMovilidade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empresaTrasladoTipoMovilidade = EmpresaTrasladoTipoMovilidade::find($id)->delete();

        return redirect()->route('empresa-traslado-tipo-movilidades.index')
            ->with('success', 'EmpresaTrasladoTipoMovilidade deleted successfully');
    }
}
