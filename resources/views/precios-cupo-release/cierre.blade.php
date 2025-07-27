@extends('layouts.app')

@section('template_title')
    Update Precios Cupo Release
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Cierre</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('precios-cupo-releases.updatecierre', $tipoHabitacionHotelId) }}"  role="form" enctype="multipart/form-data">
                        @method('PUT')
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    

                                    <div class="form-group">
                                        {{ Form::label('Cierre') }}
                                        {{ Form::select('Cierre',[0=>'NO',1=>'SI'] ,0, ['class' => 'form-control' . ($errors->has('Cierre') ? ' is-invalid' : ''), 'placeholder' => 'Cierre Habitacion']) }}
                                        {!! $errors->first('Cierre', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Tipo_habitacion_hotel') }}
                                        {{ Form::select('Tipo_habitacion_hotel_id_tipo_habitacion_hotel', [$tipoHabitacionHotel->id => $tipoHabitacionHotel->Nombre_Habitacion], $tipoHabitacionHotelId, ['class' => 'form-control' . ($errors->has('Tipo_habitacion_hotel_id_tipo_habitacion_hotel') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Habitacion Hotel Id Tipo Habitacion Hotel']) }}
                                        {!! $errors->first('Tipo_habitacion_hotel_id_tipo_habitacion_hotel', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Fecha_Desde') }}
                                        <?php  $fecha_hoy=date('Y/m/d') ?>
                                        {{ Form::date('Fecha_de', $fecha_hoy, ['class' => 'form-control' . ($errors->has('Fecha_de') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Desde']) }}
                                        {!! $errors->first('Fecha_de', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Fecha_Hasta') }}
                                        {{ Form::date('Fecha_hasta', "", ['class' => 'form-control' . ($errors->has('Fecha_hasta') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Hasta']) }}
                                        {!! $errors->first('Fecha_hasta', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection