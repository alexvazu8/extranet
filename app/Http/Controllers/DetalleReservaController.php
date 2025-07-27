<?php

namespace App\Http\Controllers;

use App\Models\DetalleReserva;
use Illuminate\Http\Request;

/**
 * Class DetalleReservaController
 * @package App\Http\Controllers
 */
class DetalleReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleReservas = DetalleReserva::paginate();

        return view('detalle-reserva.index', compact('detalleReservas'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleReservas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleReserva = new DetalleReserva();
        return view('detalle-reserva.create', compact('detalleReserva'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetalleReserva::$rules);

        $detalleReserva = DetalleReserva::create($request->all());

        return redirect()->route('detalle-reservas.index')
            ->with('success', 'DetalleReserva created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleReserva = DetalleReserva::find($id);

        return view('detalle-reserva.show', compact('detalleReserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleReserva = DetalleReserva::find($id);

        return view('detalle-reserva.edit', compact('detalleReserva'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleReserva $detalleReserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleReserva $detalleReserva)
    {
        request()->validate(DetalleReserva::$rules);

        $detalleReserva->update($request->all());

        return redirect()->route('detalle-reservas.index')
            ->with('success', 'DetalleReserva updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleReserva = DetalleReserva::find($id)->delete();

        return redirect()->route('detalle-reservas.index')
            ->with('success', 'DetalleReserva deleted successfully');
    }
}
