<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\Ciudade;
use Illuminate\Http\Request;

/**
 * Class ZonaController
 * @package App\Http\Controllers
 */
class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonas = Zona::paginate();

        return view('zona.index', compact('zonas'))
            ->with('i', (request()->input('page', 1) - 1) * $zonas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zona = new Zona();
        $Ciudad=New Ciudade;
         $Ciudades=$Ciudad->get();

        return view('zona.create', compact('zona','Ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Zona::$rules);

        $zona = Zona::create($request->all());

        return redirect()->route('zonas.index')
            ->with('success', 'Zona created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zona = Zona::where('Id_Zona',$id)->get();
         $zona=$zona[0];
      //print_r($zona->Id_Zona);
       return view('zona.show', compact('zona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zona = Zona::where('Id_Zona',$id)->get();
        $zona=$zona[0];
        $Ciudad=New Ciudade;
        $Ciudades=$Ciudad->get();
        return view('zona.edit', compact('zona','Ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Zona $zona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zona $zona)
    {
        request()->validate(Zona::$rules);

        $zona->update($request->all());

        return redirect()->route('zonas.index')
            ->with('success', 'Zona updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $zona = Zona::where('Id_Zona',$id)->delete();

        return redirect()->route('zonas.index')
            ->with('success', 'Zona deleted successfully');
    }
}
