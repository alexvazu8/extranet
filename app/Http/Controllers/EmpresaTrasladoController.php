<?php

namespace App\Http\Controllers;

use App\Models\EmpresaTraslado;
use Illuminate\Http\Request;

/**
 * Class EmpresaTrasladoController
 * @package App\Http\Controllers
 */
class EmpresaTrasladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresaTraslados = EmpresaTraslado::paginate();

        return view('empresa-traslado.index', compact('empresaTraslados'))
            ->with('i', (request()->input('page', 1) - 1) * $empresaTraslados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresaTraslado = new EmpresaTraslado();
        return view('empresa-traslado.create', compact('empresaTraslado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmpresaTraslado::$rules);

        $empresaTraslado = EmpresaTraslado::create($request->all());

        return redirect()->route('empresa-traslados.index')
            ->with('success', 'EmpresaTraslado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresaTraslado = EmpresaTraslado::find($id);

        return view('empresa-traslado.show', compact('empresaTraslado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresaTraslado = EmpresaTraslado::find($id);

        return view('empresa-traslado.edit', compact('empresaTraslado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmpresaTraslado $empresaTraslado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpresaTraslado $empresaTraslado)
    {
        request()->validate(EmpresaTraslado::$rules);

        $empresaTraslado->update($request->all());

        return redirect()->route('empresa-traslados.index')
            ->with('success', 'EmpresaTraslado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empresaTraslado = EmpresaTraslado::find($id)->delete();

        return redirect()->route('empresa-traslados.index')
            ->with('success', 'EmpresaTraslado deleted successfully');
    }
}
