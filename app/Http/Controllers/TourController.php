<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Paise;
use App\Models\Ciudade;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class TourController
 * @package App\Http\Controllers
 */
class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::paginate();

        return view('tour.index', compact('tours'))
            ->with('i', (request()->input('page', 1) - 1) * $tours->perPage());
    }

    public function pais($Id_Pais)
    {
        $Pais=New Paise;
        
        $Paises=$Pais->where('Pais_Id_Pais',$tour->Pais_Id_Pais)->get();




        return $Paises;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ciudades($Id_Pais)
    {
        // Lista de Paices
        
        $Ciudad=New Ciudade;
       $Ciudades=$Ciudad->where('Pais_Id_Pais',$Id_Pais)->get();
       
       

      
        return $Ciudades;

    }     
    public function create()
    {
        $tour = new Tour();
         // Lista de Paices
        
         $Pais=New Paise;
         $Pais->Nombre_Pais;
         $Paises=$Pais->all();
 
         $Ciudad=New Ciudade;
         $Ciudades=$Ciudad->where('Pais_Id_Pais',$tour->Pais_Id_Pais)->get();
 
         $Zona=New Zona;
         $Zonas=$Zona->where('Ciudad_Id_Ciudad',$tour->Ciudad_Id_Ciudad)->get();


        return view('tour.create', compact('tour','Paises','Ciudades','Zonas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tour::$rules);

        $informacion=$request->all();

        if($request->hasFile('Foto_tours'))
        {
          
         $path = $request->file('Foto_tours')->store('tours', 'public');

        // Actualiza el path en la base de datos
        $informacion['Foto_tours'] = $path;
       
 
        }

        $tour = Tour::create($informacion);

        return redirect()->route('tours.index')
            ->with('success', 'Tour Creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::find($id);

        return view('tour.show', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::find($id);

        $Pais=New Paise;
        $Pais->Nombre_Pais;
        $Paises=$Pais->all();

        $Ciudad=New Ciudade;
        $Ciudades=$Ciudad->where('Pais_Id_Pais',$tour->Pais_Id_Pais)->get();

        $Zona=New Zona;
        $Zonas=$Zona->where('Ciudad_Id_Ciudad',$tour->Ciudad_Id_Ciudad)->get();

     

        return view('tour.edit', compact('tour','Paises','Ciudades','Zonas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        request()->validate(Tour::$rules);
        $informacion=$request->all();

        if($request->hasFile('Foto_tours'))
        {
          
         $path = $request->file('Foto_tours')->store('tours', 'public');

          // Elimina la imagen anterior si existe
            if($tour->Foto_tours) {
                Storage::disk('public')->delete($tour->Foto_tours);
            }
        // Actualiza el path en la base de datos
        $informacion['Foto_tours'] = $path;
       
 
        }

        $tour->update($informacion);

        return redirect()->route('tours.index')
            ->with('success', 'Tour updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tour = Tour::find($id)->delete();

        return redirect()->route('tours.index')
            ->with('success', 'Tour deleted successfully');
    }
}