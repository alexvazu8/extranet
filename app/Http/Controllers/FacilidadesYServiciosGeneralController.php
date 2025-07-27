<?php

namespace App\Http\Controllers;

use App\Models\FacilidadesYServiciosGeneral;
use Illuminate\Http\Request;

/**
 * Class FacilidadesYServiciosGeneralController
 * @package App\Http\Controllers
 */
class FacilidadesYServiciosGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilidadesYServiciosGenerals = FacilidadesYServiciosGeneral::paginate();

        return view('facilidades-y-servicios-general.index', compact('facilidadesYServiciosGenerals'))
            ->with('i', (request()->input('page', 1) - 1) * $facilidadesYServiciosGenerals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilidadesYServiciosGeneral = new FacilidadesYServiciosGeneral();
        return view('facilidades-y-servicios-general.create', compact('facilidadesYServiciosGeneral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FacilidadesYServiciosGeneral::$rules);

        $facilidadesYServiciosGeneral = FacilidadesYServiciosGeneral::create($request->all());

        return redirect()->route('facilidades-y-servicios-generals.index')
            ->with('success', 'FacilidadesYServiciosGeneral created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facilidadesYServiciosGeneral = FacilidadesYServiciosGeneral::find($id);

        return view('facilidades-y-servicios-general.show', compact('facilidadesYServiciosGeneral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facilidadesYServiciosGeneral = FacilidadesYServiciosGeneral::find($id);

        return view('facilidades-y-servicios-general.edit', compact('facilidadesYServiciosGeneral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FacilidadesYServiciosGeneral $facilidadesYServiciosGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacilidadesYServiciosGeneral $facilidadesYServiciosGeneral)
    {
        request()->validate(FacilidadesYServiciosGeneral::$rules);

        $facilidadesYServiciosGeneral->update($request->all());

        return redirect()->route('facilidades-y-servicios-generals.index')
            ->with('success', 'FacilidadesYServiciosGeneral updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $facilidadesYServiciosGeneral = FacilidadesYServiciosGeneral::find($id)->delete();

        return redirect()->route('facilidades-y-servicios-generals.index')
            ->with('success', 'FacilidadesYServiciosGeneral deleted successfully');
    }
}
