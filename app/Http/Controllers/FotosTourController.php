<?php

namespace App\Http\Controllers;

use App\Models\FotosTour;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class FotosTourController
 * @package App\Http\Controllers
 */
class FotosTourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotosTours = FotosTour::paginate();

        return view('fotos-tour.index', compact('fotosTours'))
            ->with('i', (request()->input('page', 1) - 1) * $fotosTours->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fotosTour = new FotosTour();
        $tour=  Tour::get();
        return view('fotos-tour.create', compact('fotosTour','tour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FotosTour::$rules);
        $informacion=$request->all();
      
        if($request->hasFile('url_foto_tour'))
        {
          
         
         $path = $request->file('url_foto_tour')->store('tours', 'public');

        // Actualiza el path en la base de datos
        $informacion['url_foto_tour'] = $path;

         
        }
        

        $fotosTour = FotosTour::create($informacion);

        return redirect()->route('fotos-tours.index')
            ->with('success', 'FotosTour created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fotosTour = FotosTour::find($id);

        return view('fotos-tour.show', compact('fotosTour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fotosTour = FotosTour::find($id);
        $tour=  Tour::get();

        return view('fotos-tour.edit', compact('fotosTour','tour'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FotosTour $fotosTour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FotosTour $fotosTour)
    {
        request()->validate(FotosTour::$rules);

        $informacion=$request->all();
      
        if($request->hasFile('url_foto_tour'))
        {
          
         
         $path = $request->file('url_foto_tour')->store('tours', 'public');

          // Elimina la imagen anterior si existe
          if($fotosTour->url_foto_tour) {
            Storage::disk('public')->delete($fotosTour->url_foto_tour);
        }
        // Actualiza el path en la base de datos
        $informacion['url_foto_tour'] = $path;

         
        }

        $fotosTour->update($informacion);

        return redirect()->route('fotos-tours.index')
            ->with('success', 'FotosTour updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fotosTour = FotosTour::find($id)->delete();

        return redirect()->route('fotos-tours.index')
            ->with('success', 'FotosTour deleted successfully');
    }
}
