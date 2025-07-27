@extends('layouts.app')

@section('template_title')
    Empresa Traslado Tipo Movilidades Contrato Cupo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empresa Traslado Tipo Movilidades Contrato Cupo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('etmcc.create',[$empresa_traslado_tipo_movilidades_Id,$idserviciotraslado]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Modelo</th>
                                        <th>Nombre Servicio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresaTrasladoTipoMovilidadesContratoCupos as $empresaTrasladoTipoMovilidadesContratoCupo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->Cantidad_adultos }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->Cantidad_menores }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->Costo_adulto }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->Costo_menor }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->Edad_menor }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->Fecha_disponible }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->Cupo }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->Release }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->cierre }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->hora_inicio_atencion }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->hora_final_atencion }}</td>
											<td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->empresaTrasladoTipoMovilidade->Marca_modelo }}</td>
                                            <td>{{ $empresaTrasladoTipoMovilidadesContratoCupo->servicioTraslado->Nombre_Servicio }}</td>

                                            <td>
                                                <form action="{{ route('etmcc.destroy',$empresaTrasladoTipoMovilidadesContratoCupo->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('etmcc.show',$empresaTrasladoTipoMovilidadesContratoCupo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('etmcc.edit',$empresaTrasladoTipoMovilidadesContratoCupo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $empresaTrasladoTipoMovilidadesContratoCupos->links() !!}
            </div>
        </div>
    </div>
@endsection
