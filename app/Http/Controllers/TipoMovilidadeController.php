<?php

namespace App\Http\Controllers;

use App\Models\TipoMovilidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class TipoMovilidadeController
 * @package App\Http\Controllers
 */
class TipoMovilidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoMovilidades = TipoMovilidade::paginate();

        return view('tipo-movilidade.index', compact('tipoMovilidades'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoMovilidades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoMovilidade = new TipoMovilidade();
        return view('tipo-movilidade.create', compact('tipoMovilidade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoMovilidade::$rules);
        $informacion=$request->all();
         
        if($request->hasFile('Foto_tipo_movilidad'))
        {
          
         
         $path = $request->file('Foto_tipo_movilidad')->store('movilidad', 'public');

        // Actualiza el path en la base de datos
        $informacion['Foto_tipo_movilidad'] = $path;

         
        }

        $tipoMovilidade = TipoMovilidade::create($informacion);

        return redirect()->route('tipo-movilidades.index')
            ->with('success', 'TipoMovilidade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoMovilidade = TipoMovilidade::find($id);

        return view('tipo-movilidade.show', compact('tipoMovilidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoMovilidade = TipoMovilidade::find($id);

        return view('tipo-movilidade.edit', compact('tipoMovilidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoMovilidade $tipoMovilidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMovilidade $tipoMovilidade)
    {
        request()->validate(TipoMovilidade::$rules);

        $informacion=$request->all();
       
        if($request->hasFile('Foto_tipo_movilidad'))
         {
           
          
          $path = $request->file('Foto_tipo_movilidad')->store('movilidad', 'public');
          
           // Elimina la imagen anterior si existe
             if($tipoMovilidade->Foto_tipo_movilidad) {
                 Storage::disk('public')->delete($tipoMovilidade->Foto_tipo_movilidad);
             }
 
         // Actualiza el path en la base de datos
         $informacion['Foto_tipo_movilidad'] = $path;
        
          
         }

        $tipoMovilidade->update($informacion);

        return redirect()->route('tipo-movilidades.index')
            ->with('success', 'TipoMovilidade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoMovilidade = TipoMovilidade::find($id)->delete();

        return redirect()->route('tipo-movilidades.index')
            ->with('success', 'TipoMovilidade deleted successfully');
    }
}