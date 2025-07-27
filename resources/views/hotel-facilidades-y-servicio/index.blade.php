@extends('layouts.app')

@section('template_title')
    Hotel Facilidades Y Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Hotel Facilidades Y Servicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('hotel-facilidades-y-servicios.mostrar_Facilidades_y_Servicios_generales',$Hotel_Id_Hotel) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Hotel Id Hotel</th>
										<th>Facilidades Y Servicios Generales Id Facilidad Y Servicio Genera</th>
										<th>Costo</th>
										<th>Moneda</th>
										<th>Texto Facilidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotelFacilidadesYServicios as $hotelFacilidadesYServicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $hotelFacilidadesYServicio->hotel->Nombre_Hotel }}</td>
											<td>{{ $hotelFacilidadesYServicio->facilidadesYServiciosGeneral->Facilidad_y_Servicio_general }}</td>
											<td>
                                                @if($hotelFacilidadesYServicio->costo==0) {{ __('No') }}@endif
                                                @if($hotelFacilidadesYServicio->costo!=0) {{ __('Si') }}@endif
                                            </td>
											<td>{{ $hotelFacilidadesYServicio->moneda }}</td>
											<td>{{ $hotelFacilidadesYServicio->texto_facilidad }}</td>

                                            <td>
                                                <form action="{{ route('hotel-facilidades-y-servicios.destroy',$hotelFacilidadesYServicio->id) }}" method="POST">
                                                   
                                                    <a class="btn btn-sm btn-success" href="{{ route('hotel-facilidades-y-servicios.edit',$hotelFacilidadesYServicio->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $hotelFacilidadesYServicios->links() !!}
            </div>
        </div>
    </div>
@endsection
