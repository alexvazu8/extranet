@extends('layouts.app')

@section('template_title')
    Tour
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tour') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tours.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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
                                        
										<th>Nombre Tour</th>
										<th>Recojo Hotel</th>
										<th>Punto Encuentro</th>
                                        <th>Dias</th>
                                        <th>Noches</th>
										<th>Horario Inicio</th>
										<th>Hora Fin</th>
										<th>Entregan Agua</th>
										<th>Para Discapacitados</th>
										<th>Con Bano</th>
										<th>Pais Id Pais</th>
										<th>Ciudad Id Ciudad</th>
										<th>Zona Id Zona</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tours as $tour)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tour->Nombre_tour }}</td>
											<td>@if($tour->Recojo_hotel===0) {{__('No') }}  @endif
                                                  @if($tour->Recojo_hotel===1) {{__('Si') }}  @endif
                                            </td>
											<td>{{ $tour->Punto_encuentro }}</td>
                                            <td>{{ $tour->cantidad_dias_tour }}</td>
                                            <td>{{ $tour->cantidad_noches_tour }}</td>
											<td>{{ $tour->Horario_inicio }}</td>
											<td>{{ $tour->Hora_fin }}</td>
											<td>  @if($tour->Entregan_agua===0) {{__('No') }}  @endif
                                                  @if($tour->Entregan_agua===1) {{__('Si') }}  @endif
                                            </td>
											<td> @if($tour->Para_discapacitados===0) {{__('No') }}  @endif
                                                  @if($tour->Para_discapacitados===1) {{__('Si') }}  @endif
                                            </td>
											<td> @if($tour->Con_bano===0) {{__('No') }}  @endif
                                                  @if($tour->Con_bano===1) {{__('Si') }}  @endif
                                            </td>
											<td>{{  $tour->find($tour->id,'Pais_Id_Pais')->paise->Nombre_Pais }}
                                          
                                            </td>
											<td>{{  $tour->find($tour->id,'Ciudad_Id_Ciudad')->ciudade->Nombre_Ciudad }}</td>
											<td>{{  $tour->find($tour->id,'Zona_Id_Zona')->Zona->Nombre_Zona }}</td>

                                            <td>
                                                <form action="{{ route('tours.destroy',$tour->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tours.show',$tour->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tours.edit',$tour->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tours-contrato-cupos.index',$tour->id) }}"><i class="fa fa-fw fa-edit"></i> Asignar disponibilidad</a>
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
                {!! $tours->links() !!}
            </div>
        </div>
    </div>
@endsection