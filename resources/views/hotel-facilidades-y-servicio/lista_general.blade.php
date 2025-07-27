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
                                {{ __('Facilidades Y Servicios General') }}
                            </span>

                             <div class="float-right">

                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                  
                        <div class="alert alert-danger">
                            <p>{{ __('Selecciona al menos uno.')}}</p>
                        </div>
                  

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Facilidad Y Servicio General</th>

                                        <th>Texto Facilidad y Servicio</th>
                                        <th>Costo (Si(1) /No(0))</th>
                                        <th>Moneda (USD/BOB/PYG)</th>

                                    </tr>
                                </thead>
                                <tbody>{{ $i=0 }}
                                <form action="{{ route('hotel-facilidades-y-servicios.registrar_lista') }}" method="POST">
                                @csrf   
                                <div class="form-group">
                                    
                                    {{ Form::hidden('Hotel_Id_Hotel', $Hotel_Id_Hotel, ['class' => 'form-control' . ($errors->has('Hotel_Id_Hotel') ? ' is-invalid' : ''), 'placeholder' => 'Hotel Id Hotel']) }}
                                    
                                </div>
                                @foreach ($facilidadesYServiciosGenerals as $facilidadesYServiciosGeneral)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $facilidadesYServiciosGeneral->Facilidad_y_Servicio_general }}</td>

                                            <td>
                                            <input type="checkbox" name="ids[]" value="{{ $facilidadesYServiciosGeneral->id}}">
                                            <input type="text" name="textos[{{ $facilidadesYServiciosGeneral->id}}]" value="{{$facilidadesYServiciosGeneral->Facilidad_y_Servicio_general}}">  
                                            @if ($errors->has('ids[{{ $facilidadesYServiciosGeneral->id}}]'))
                                                <div class="invalid-feedback">
                                                    {!! $errors->first('ids[{{ $facilidadesYServiciosGeneral->id}}]', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            @endif   
                                            </td>
                                            <td>
                                            <input type="text" name="costos[{{ $facilidadesYServiciosGeneral->id }}]" value="{{ old('costos.' . $facilidadesYServiciosGeneral->id, $facilidadesYServiciosGeneral->costo !==NULL ?: 0) }}" placeholder="costo">
                                            </td>
                                            <td>
                                            <input type="text" name="monedas[{{ $facilidadesYServiciosGeneral->id }}]" value="{{ old('monedas.' . $facilidadesYServiciosGeneral->id, $facilidadesYServiciosGeneral->moneda !==NULL  ?: 'USD') }}" placeholder="moneda">
                                                     
                                            </td>
                                        </tr>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
