@extends('layouts.app')

@section('template_title')
Facilidades Y Servicios General
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Calendario') }}
                        </span>

                        
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                       
                            <tbody>

                                <div class="container">
                                    <div style="height:50px"></div>
                                   
                                    <p class="lead">
                                    <h3>Calendario</h3>
                                    <p>Aqui esta el Calendario</p>

                                    <hr>

                                    <div class="row header-calendar">

                                        <div class="col"
                                            style="display: flex; justify-content: space-between; padding: 10px;">
                                            <a href="{{ asset('/calendar/hotelito/') }}/<?= $data['last']; ?>"
                                                style="margin:10px;">
                                                <i class="fas fa-chevron-circle-left"
                                                    style="font-size:30px;color:white;"></i>
                                            </a>
                                            <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?>
                                                <small><?= $data['year']; ?></small></h2>
                                            <a href="{{ asset('/calendar/hotelito/') }}/<?= $data['next']; ?>"
                                                style="margin:10px;">
                                                <i class="fas fa-chevron-circle-right"
                                                    style="font-size:30px;color:white;"></i>
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
                                       <?php $fecha=date('Y-m-d'); $dia=$fecha[8].$fecha[9]; $mes_actual=$fecha[5].$fecha[6]; ?>
                                       
                                        @if (($dayweek['mes']==$mes))
                                        <div class="col box-day">
                                        {{ $dayweek['dia']  }}
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
    </div>
</div>
@endsection