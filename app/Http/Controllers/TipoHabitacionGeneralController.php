<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacionGeneral;
use Illuminate\Http\Request;

/**
 * Class TipoHabitacionGeneralController
 * @package App\Http\Controllers
 */
class TipoHabitacionGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoHabitacionGenerals = TipoHabitacionGeneral::paginate();

        return view('tipo-habitacion-general.index', compact('tipoHabitacionGenerals'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoHabitacionGenerals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoHabitacionGeneral = new TipoHabitacionGeneral();
        return view('tipo-habitacion-general.create', compact('tipoHabitacionGeneral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoHabitacionGeneral::$rules);

        $tipoHabitacionGeneral = TipoHabitacionGeneral::create($request->all());

        return redirect()->route('tipo-habitacion-generals.index')
            ->with('success', 'Tipo Habitacion General creada successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoHabitacionGeneral = TipoHabitacionGeneral::find($id);

        return view('tipo-habitacion-general.show', compact('tipoHabitacionGeneral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoHabitacionGeneral = TipoHabitacionGeneral::find($id);

        return view('tipo-habitacion-general.edit', compact('tipoHabitacionGeneral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoHabitacionGeneral $tipoHabitacionGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoHabitacionGeneral $tipoHabitacionGeneral)
    {
        request()->validate(TipoHabitacionGeneral::$rules);

        $tipoHabitacionGeneral->update($request->all());

        return redirect()->route('tipo-habitacion-generals.index')
            ->with('success', 'Tipo Habitacion General actualizada successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoHabitacionGeneral = TipoHabitacionGeneral::find($id)->delete();

        return redirect()->route('tipo-habitacion-generals.index')
            ->with('success', 'TipoHabitacionGeneral deleted successfully');
    }
}
