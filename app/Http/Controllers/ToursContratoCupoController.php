<?php

namespace App\Http\Controllers;

use App\Models\ToursContratoCupo;
use App\Models\Tour;
use Illuminate\Http\Request;

/**
 * Class ToursContratoCupoController
 * @package App\Http\Controllers
 */
class ToursContratoCupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public static function buscar_por_fecha($fecha_calendario,$Tours_id)
     { 
         $toursContratoCupos = ToursContratoCupo::where('Tours_id',$Tours_id)
         ->where('Fecha_disponible',$fecha_calendario)
         ->orderBy('Cantidad_adultos', 'asc')
         ->get();
         
         return $toursContratoCupos;
 
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
   

    public static function calendar_month($month,$Tours_id){
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
              $respuesta=ToursContratoCupoController::buscar_por_fecha($datafecha,$Tours_id);
              $datanew['objeto_tours']=$respuesta;
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

      public function index_month($month,$idtour){

        $toursContratoCupos = ToursContratoCupo::where('Tours_id', '=', $idtour)->paginate(); 
      
        $data = $this->calendar_month($month,$idtour);
        //print_r($data);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];
  
        $obj_tourcontratocupo = NEW ToursContratoCupo;

        return view('tours-contrato-cupo.index', compact('toursContratoCupos','obj_tourcontratocupo','idtour','data','mes','mespanish'))
        ->with('i', (request()->input('page', 1) - 1) * $toursContratoCupos->perPage());
  
      }


      public function lista_por_tour_fecha($idtour,$fecha_calendario)
      {
          $toursContratoCupos = ToursContratoCupo::where('Tours_id', '=', $idtour)
                                                   ->where('Fecha_disponible', '=', $fecha_calendario)
                                                   ->get();      
             // $obj_tourcontratocupo = NEW ToursContratoCupo;
  
          return view('tours-contrato-cupo.lista_contrato_por_fecha', compact('toursContratoCupos','idtour','fecha_calendario'));
      }
     public function index($idtour)
    {
        $toursContratoCupos = ToursContratoCupo::where('Tours_id', '=', $idtour)->get();      
            $month = date("Y-m");
            $data = $this->calendar_month($month,$idtour);
            $mes = $data['month'];
            // obtener mes en espanol
            $mespanish = $this->spanish_month($mes);
            $mes = $data['month'];

            $obj_tourcontratocupo = NEW ToursContratoCupo;


        return view('tours-contrato-cupo.index', compact('toursContratoCupos','obj_tourcontratocupo','idtour','data','mes','mespanish'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toursContratoCupo = new ToursContratoCupo();
       
        return view('tours-contrato-cupo.create', compact('toursContratoCupo'));
    }

    public function create2($idtour)
    { 
        $toursContratoCupo = new ToursContratoCupo();
        $tours = Tour::find($idtour);
        return view('tours-contrato-cupo.create', compact('toursContratoCupo','tours','idtour'));
    }
    public function create_rango($idtour)
    { 
        $toursContratoCupo = new ToursContratoCupo();
        $tours = Tour::find($idtour);
        return view('tours-contrato-cupo.create_rango', compact('toursContratoCupo','tours','idtour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ToursContratoCupo::$rules);

        $toursContratoCupo = ToursContratoCupo::create($request->all());

        return redirect()->route('tours-contrato-cupos.index',$request->Tours_id)
            ->with('success', 'ToursContratoCupo created successfully.');
    }

    public function store_rango(Request $request)
    {
       
      request()->validate(ToursContratoCupo::$rulesrango);


    //print_r($request->all());

    // recorrer fechas de una fecha dada a otra
    
 

    $de=date("Y-m-d",strtotime($request->Fecha_de)); 
    $hasta=date("Y-m-d",strtotime($request->Fecha_hasta)); 
   while($de<=$hasta)
    {
      $request["Fecha_disponible"]  = $de;

      $toursContratoCupo = ToursContratoCupo::create($request->all());
      $de=date("Y-m-d",strtotime($de."+ 1 days"));

     }

    
      

        return redirect()->route('tours-contrato-cupos.index',$request->Tours_id)
            ->with('success', 'ToursContratoCupo created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toursContratoCupo = ToursContratoCupo::find($id);

        return view('tours-contrato-cupo.show', compact('toursContratoCupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toursContratoCupo = ToursContratoCupo::find($id);
        $tours = Tour::find($toursContratoCupo->Tours_id);
       // print_r( $toursContratoCupo);
        return view('tours-contrato-cupo.edit', compact('toursContratoCupo','tours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ToursContratoCupo $toursContratoCupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToursContratoCupo $toursContratoCupo)
    {
        request()->validate(ToursContratoCupo::$rules);

        $toursContratoCupo->update($request->all());

        return redirect()->route('tours-contrato-cupos.index',$request->Tours_id)
            ->with('success', 'ToursContratoCupo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {    $toursContratoCupo = ToursContratoCupo::find($id);
        $toursContratoCupo2 = ToursContratoCupo::find($id)->delete();

        return redirect()->route('tours-contrato-cupos.index',$toursContratoCupo->Tours_id)
            ->with('success', 'ToursContratoCupo deleted successfully');
    }

    public function downloadTemplate()
    {
        $filePath = public_path('plantillas/FormatoTours.xlsx'); // Asegúrate de tener el archivo en esta ruta
        
        if(!file_exists($filePath)) {
            abort(404, "El archivo de plantilla no existe");
        }

        return response()->download($filePath, 'FormatoTours.xlsx');
    }
}
