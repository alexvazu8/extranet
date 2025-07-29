<?php

namespace App\Http\Controllers;

use App\Imports\TrasladosImport;
use App\Models\TrasladosContratoCupo;
use App\Models\EmpresaTrasladoTipoMovilidade;
use App\Models\ServicioTraslado;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class TrasladosContratoCupoController
 * @package App\Http\Controllers
 */
class TrasladosContratoCupoController extends Controller
{
    public static function buscar_por_fecha($fecha_calendario,$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado)
    { 
        $trasladosContratoCupos = TrasladosContratoCupo::where('Empresa_traslado_tipo_movilidades_id',$empresa_traslado_tipo_movilidades_Id)
        ->where('Servicio_traslado_Id',$idserviciotraslado)
        ->where('Fecha_disponible',$fecha_calendario)
        ->orderBy('Cantidad_adultos', 'asc')
        ->get();
        
        return $trasladosContratoCupos;

    }
    public static function spanish_month($month)
    {

        $mes = $month;
        if ($month=="Jan") {
          $mes = "Enero";
        }
        elseif ($month=="Feb")  {
          $mes = "Febrero";
        }
        elseif ($month=="Mar")  {
          $mes = "Marzo";
        }
        elseif ($month=="Apr") {
          $mes = "Abril";
        }
        elseif ($month=="May") {
          $mes = "Mayo";
        }
        elseif ($month=="Jun") {
          $mes = "Junio";
        }
        elseif ($month=="Jul") {
          $mes = "Julio";
        }
        elseif ($month=="Aug") {
          $mes = "Agosto";
        }
        elseif ($month=="Sep") {
          $mes = "Septiembre";
        }
        elseif ($month=="Oct") {
          $mes = "Octubre";
        }
        elseif ($month=="Nov") {
          $mes = "Noviembre";
        }
        elseif ($month=="Dec") {
          $mes = "Diciembre";
        }
        else {
          $mes = $month;
        }
        return $mes;
    }
   

    public static function calendar_month($month,$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado){
        //$mes = date("Y-m");
        $mes = $month;
        //sacar el ultimo de dia del mes
        $daylast =  date("Y-m-d", strtotime("last day of ".$mes));
        //sacar el dia de dia del mes
        $fecha      =  date("Y-m-d", strtotime("first day of ".$mes));
        $daysmonth  =  date("d", strtotime($fecha));
        $montmonth  =  date("m", strtotime($fecha));
        $yearmonth  =  date("Y", strtotime($fecha));
        // sacar el lunes de la primera semana
        $nuevaFecha = mktime(0,0,0,$montmonth,$daysmonth,$yearmonth);
        $diaDeLaSemana = date("w", $nuevaFecha);
        $nuevaFecha = $nuevaFecha - ($diaDeLaSemana*24*3600); //Restar los segundos totales de los dias transcurridos de la semana
        $dateini = date ("Y-m-d",$nuevaFecha);
        //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
        // numero de primer semana del mes
       echo $semana1 = date("W",strtotime($fecha));
        // numero de ultima semana del mes
       echo $semana2 = date("W",strtotime($daylast));
        // semana todal del mes
        // en caso si es diciembre
        if (date("m", strtotime($mes))==12) {
            $semana = 5;
        }
        else { 
          //en caso de Enero
          if (date("m", strtotime($mes))==1) {
            $semana = 5;
        }
        else{
         echo $semana = ($semana2-$semana1)+1;
        }

         
        }
        // semana todal del mes
        $datafecha = $dateini;
        $calendario = array();
        $iweek = 0;
        while ($iweek < $semana):
            $iweek++;
            //echo "Semana $iweek <br>";
            //
            $weekdata = [];
            for ($iday=0; $iday < 7 ; $iday++){
              // code...
              $datafecha = date("Y-m-d",strtotime($datafecha."+ 1 day"));
              $datanew['mes'] = date("M", strtotime($datafecha));
              $datanew['dia'] = date("d", strtotime($datafecha));
              $respuesta=TrasladosContratoCupoController::buscar_por_fecha($datafecha,$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado);
              //print($respuesta);echo " aqui termina ";
              $datanew['objeto_traslados']=$respuesta;
              $datanew['fecha'] = $datafecha;
              //AGREGAR CONSULTAS EVENTO
              //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
              array_push($weekdata,$datanew);
            }
            $dataweek['semana'] = $iweek;
            $dataweek['datos'] = $weekdata;
            //$datafecha['horario'] = $datahorario;
          
            array_push($calendario,$dataweek);
        endwhile;
        $nextmonth = date("Y-M",strtotime($mes."+ 1 month"));
        $lastmonth = date("Y-M",strtotime($mes."- 1 month"));
        $month = date("M",strtotime($mes));
        $yearmonth = date("Y",strtotime($mes));
        //$month = date("M",strtotime("2019-03"));
        $data = array(
          'next' => $nextmonth,
          'month'=> $month,
          'year' => $yearmonth,
          'last' => $lastmonth,
          'calendar' => $calendario,
        );
        return $data;
      }

      
      public function index_month($month,$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado){

        $trasladosContratoCupos = TrasladosContratoCupo::where('Empresa_traslado_tipo_movilidades_id',$empresa_traslado_tipo_movilidades_Id)
        ->where('Servicio_traslado_Id',$idserviciotraslado)
        ->paginate();
      
        $data = $this->calendar_month($month,$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado);
        //print_r($data);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];
  
       // $obj_tourcontratocupo = NEW ToursContratoCupo;

        return view('traslados-contrato-cupo.index', compact('trasladosContratoCupos','empresa_traslado_tipo_movilidades_Id','idserviciotraslado','data','mes','mespanish'))
        ->with('i', (request()->input('page', 1) - 1) * $trasladosContratoCupos->perPage());
  
      }
   
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($empresa_traslado_tipo_movilidades_Id,$idserviciotraslado)
    {
        $trasladosContratoCupos = TrasladosContratoCupo::where('Empresa_traslado_tipo_movilidades_id',$empresa_traslado_tipo_movilidades_Id)
        ->where('Servicio_traslado_Id',$idserviciotraslado)
        ->paginate();

        $month = date("Y-m");
        $data = $this->calendar_month($month,$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];

        return view('traslados-contrato-cupo.index', compact('trasladosContratoCupos','empresa_traslado_tipo_movilidades_Id','idserviciotraslado','data','mes','mespanish'))
            ->with('i', (request()->input('page', 1) - 1) * $trasladosContratoCupos->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($empresa_traslado_tm_Id,$idserviciotraslado)
    {
        $trasladosContratoCupo = new TrasladosContratoCupo();

        $empresaTrasladoTipoMovilidade = EmpresaTrasladoTipoMovilidade::with('tipoMovilidade','empresaTraslado')->get()
        ->map(function($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->tipoMovilidade->Nombre_tipo_movilidad . '-' . $item->empresaTraslado->Nombre_empresa_traslado
            ];
        })
        ->pluck('nombre', 'id');
        $ServicioTraslado= ServicioTraslado::pluck('Nombre_Servicio', 'id');
        


        return view('traslados-contrato-cupo.create', compact('trasladosContratoCupo','empresaTrasladoTipoMovilidade','ServicioTraslado','empresa_traslado_tm_Id','idserviciotraslado'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_contrato($empresa_traslado_tm_Id,$idserviciotraslado)
    {
        $trasladosContratoCupo = new TrasladosContratoCupo();

        $empresaTrasladoTipoMovilidade = EmpresaTrasladoTipoMovilidade::with('tipoMovilidade','empresaTraslado')->get()
        ->map(function($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->tipoMovilidade->Nombre_tipo_movilidad . '-' . $item->empresaTraslado->Nombre_empresa_traslado
            ];
        })
        ->pluck('nombre', 'id');
        $ServicioTraslado= ServicioTraslado::pluck('Nombre_Servicio', 'id');
        


        return view('traslados-contrato-cupo.create_contrato', compact('trasladosContratoCupo','empresaTrasladoTipoMovilidade','ServicioTraslado','empresa_traslado_tm_Id','idserviciotraslado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TrasladosContratoCupo::$rules);

        $trasladosContratoCupo = TrasladosContratoCupo::create($request->all());

        return redirect()->route('traslados-contrato-cupos.index',[$request['Empresa_traslado_tipo_movilidades_id'],$request['Servicio_traslado_Id']])
            ->with('success', 'TrasladosContratoCupo created successfully.');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_contrato(Request $request)
    {
        request()->validate(TrasladosContratoCupo::$rulescontrato);

       

        $de=date("Y-m-d",strtotime($request->Fecha_de)); 
        $hasta=date("Y-m-d",strtotime($request->Fecha_hasta)); 
       while($de<=$hasta)
        {
          $request["Fecha_disponible"]  = $de;
    
          $trasladosContratoCupo = TrasladosContratoCupo::create($request->all());
          $de=date("Y-m-d",strtotime($de."+ 1 days"));
    
         }

        return redirect()->route('traslados-contrato-cupos.index',[$request['Empresa_traslado_tipo_movilidades_id'],$request['Servicio_traslado_Id']])
            ->with('success', 'TrasladosContratoCupo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trasladosContratoCupo = TrasladosContratoCupo::find($id);

        return view('traslados-contrato-cupo.show', compact('trasladosContratoCupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($empresa_traslado_tm_Id,$idserviciotraslado,$id)
    {
        $trasladosContratoCupo = TrasladosContratoCupo::find($id);

        $empresaTrasladoTipoMovilidade = EmpresaTrasladoTipoMovilidade::with('tipoMovilidade','empresaTraslado')->get()
        ->map(function($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->tipoMovilidade->Nombre_tipo_movilidad . '-' . $item->empresaTraslado->Nombre_empresa_traslado
            ];
        })
        ->pluck('nombre', 'id');
        $ServicioTraslado= ServicioTraslado::pluck('Nombre_Servicio', 'id');
        
        return view('traslados-contrato-cupo.edit', compact('trasladosContratoCupo','empresaTrasladoTipoMovilidade','ServicioTraslado','empresa_traslado_tm_Id','idserviciotraslado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TrasladosContratoCupo $trasladosContratoCupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrasladosContratoCupo $trasladosContratoCupo)
    {
        request()->validate(TrasladosContratoCupo::$rules);

        $trasladosContratoCupo->update($request->all());

        return redirect()->route('traslados-contrato-cupos.index',[$request['Empresa_traslado_tipo_movilidades_id'],$request['Servicio_traslado_Id']])
            ->with('success', 'TrasladosContratoCupo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
       // print_r($trasladosContratoCupo);
    {   $trasladosContratoCupo = TrasladosContratoCupo::find($id);
        $trasladosContratoCupo2 = TrasladosContratoCupo::find($id)->delete();
       // print_r($trasladosContratoCupo);

        return redirect()->route('traslados-contrato-cupos.index',[$trasladosContratoCupo->Empresa_traslado_tipo_movilidades_id,$trasladosContratoCupo->Servicio_traslado_Id])
            ->with('success', 'TrasladosContratoCupo deleted successfully');
    }

    public function importarTraslados(Request $request)
    {
        $request->validate(['archivo' => 'required|mimes:xlsx,xls']);
        
        Excel::import(new TrasladosImport, $request->file('archivo'));
        
        return back()->with('success', '¡Datos importados correctamente!');
    }

    public function showImportForm()
    {
        return view('traslados-contrato-cupo.importar'); // Asume que tu blade se llama importar.blade.php
    }

}
