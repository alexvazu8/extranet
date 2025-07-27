<?php

namespace App\Http\Controllers;

use App\Models\GrupoFotosHotel;
use Illuminate\Http\Request;

/**
 * Class GrupoFotosHotelController
 * @package App\Http\Controllers
 */
class GrupoFotosHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupoFotosHotels = GrupoFotosHotel::paginate();

        return view('grupo-fotos-hotel.index', compact('grupoFotosHotels'))
            ->with('i', (request()->input('page', 1) - 1) * $grupoFotosHotels->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupoFotosHotel = new GrupoFotosHotel();
        return view('grupo-fotos-hotel.create', compact('grupoFotosHotel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(GrupoFotosHotel::$rules);

        $grupoFotosHotel = GrupoFotosHotel::create($request->all());

        return redirect()->route('grupo-fotos-hotels.index')
            ->with('success', 'GrupoFotosHotel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupoFotosHotel = GrupoFotosHotel::find($id);

        return view('grupo-fotos-hotel.show', compact('grupoFotosHotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupoFotosHotel = GrupoFotosHotel::find($id);

        return view('grupo-fotos-hotel.edit', compact('grupoFotosHotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  GrupoFotosHotel $grupoFotosHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoFotosHotel $grupoFotosHotel)
    {
        request()->validate(GrupoFotosHotel::$rules);

        $grupoFotosHotel->update($request->all());

        return redirect()->route('grupo-fotos-hotels.index')
            ->with('success', 'GrupoFotosHotel updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $grupoFotosHotel = GrupoFotosHotel::find($id)->delete();

        return redirect()->route('grupo-fotos-hotels.index')
            ->with('success', 'GrupoFotosHotel deleted successfully');
    }
}
