@extends('layouts.app')

@section('template_title')
Traslados Contrato Cupo
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Traslados Contrato Cupo') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('traslados-contrato-cupos.create_contrato',[$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado]) }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Nuevo Contrato') }}
                            </a>
                            <a href="{{ route('traslados-contrato-cupos.create',[$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado]) }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Nueva Tarifa') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Esto es un comentario en HTML
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Cantidad Adultos</th>
                                    <th>Cantidad Menores</th>
                                    <th>Costo Adulto</th>
                                    <th>Costo Menor</th>
                                    <th>Edad Menor</th>
                                    <th>Fecha Disponible</th>
                                    <th>Cupo</th>
                                    <th>Release</th>
                                    <th>Cierre</th>
                                    <th>Hora Inicio Atencion</th>
                                    <th>Hora Final Atencion</th>
                                    <th>Tipo Movilidades</th>
                                    <th>Servicio </th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>  <?php $trasladosContratoCupos2=$trasladosContratoCupos;
                                        
                                                ?>
                                @foreach ($trasladosContratoCupos as $trasladosContratoCupo)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $trasladosContratoCupo->Cantidad_adultos }}</td>
                                    <td>{{ $trasladosContratoCupo->Cantidad_menores }}</td>
                                    <td>{{ $trasladosContratoCupo->Costo_adulto }}</td>
                                    <td>{{ $trasladosContratoCupo->Costo_menor }}</td>
                                    <td>{{ $trasladosContratoCupo->Edad_menor }}</td>
                                    <td>{{ $trasladosContratoCupo->Fecha_disponible }}</td>
                                    <td>{{ $trasladosContratoCupo->Cupo }}</td>
                                    <td>{{ $trasladosContratoCupo->Release }}</td>
                                    <td>{{ $trasladosContratoCupo->cierre }}</td>
                                    <td>{{ $trasladosContratoCupo->hora_inicio_atencion }}</td>
                                    <td>{{ $trasladosContratoCupo->hora_final_atencion }}</td>
                                    <td>{{ $trasladosContratoCupo->empresaTrasladoTipoMovilidade->Marca_modelo }}</td>
                                    <td>{{ $trasladosContratoCupo->servicioTraslado->Nombre_Servicio  }}</td>

                                    <td>
                                        <form action="{{ route('traslados-contrato-cupos.destroy',$trasladosContratoCupo->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('traslados-contrato-cupos.show',$trasladosContratoCupo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('traslados-contrato-cupos.edit',[$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado,$trasladosContratoCupo->id]) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        -->


                        <div class="table-responsive">
                            <table class="table table-striped table-hover">

                                <tbody>

                                    <div class="container">
                                        <div style="height:50px"></div>

                                        <p class="lead">
                                        <h3>Calendario</h3>

                                        <hr>

                                        <div class="row header-calendar">

                                            <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
                                                <a href="{{ asset('/traslados-contrato-cupos/index_month/') }}/<?= $data['last']; ?>/<?=$empresa_traslado_tipo_movilidades_Id; ?>/<?=$idserviciotraslado; ?>" style="margin:10px;">
                                                    <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
                                                </a>
                                                <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?>
                                                    <small><?= $data['year']; ?></small>
                                                </h2>
                                                <a href="{{ asset('/traslados-contrato-cupos/index_month/') }}/<?= $data['next']; ?>/<?=$empresa_traslado_tipo_movilidades_Id; ?>/<?=$idserviciotraslado; ?>" style="margin:10px;">
                                                    <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
                                                </a>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col header-col">Lunes</div>
                                            <div class="col header-col">Martes</div>
                                            <div class="col header-col">Miercoles</div>
                                            <div class="col header-col">Jueves</div>
                                            <div class="col header-col">Viernes</div>
                                            <div class="col header-col">Sabado</div>
                                            <div class="col header-col">Domingo</div>
                                        </div>
                                        <!-- inicio de semana -->
                                        @foreach ($data['calendar'] as $weekdata)
                                        <div class="row">
                                            <!-- ciclo de dia por semana -->
                                            @foreach ($weekdata['datos'] as $dayweek)
                                            <?php

                                            $fecha = date('Y-m-d');
                                            $dia = $fecha[8] . $fecha[9];
                                            $mes_actual = $fecha[5] . $fecha[6];

                                            ?>
 
                                            @if (($dayweek['mes']==$mes))
                                            <div class="col box-day" overflow: scroll>
                                                {{ $dayweek['dia']  }}
                                                <?php
                                                 $fecha_calendario = $fecha2 = $dayweek['fecha'];

                                                
                                                ?>
                                                @foreach ($dayweek['objeto_traslados'] as $contrato_traslados)
                                        
                                                </br> <a class="btn btn-sm btn-success" href="{{ route('traslados-contrato-cupos.edit',[$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado,$contrato_traslados->id]) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                <strong>ADT:</strong>{{ $contrato_traslados->Cantidad_adultos  }}
                                                <strong>MEN:</strong>{{ $contrato_traslados->Cantidad_menores  }}

                                               @endforeach

                                            </div>
                                            @else
                                            <div class="col box-dayoff">
                                            </div>
                                            @endif


                                            @endforeach
                                        </div>
                                        @endforeach

                                    </div> <!-- /container -->




                                </tbody>
                            </table>
                        </div>





                    </div>
                </div>
            </div>
            <!-- Esto es un comentario en HTML
            {!! $trasladosContratoCupos->links() !!}
            -->
        </div>
    </div>
</div>
@endsection