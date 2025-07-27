@extends('layouts.app')

@section('template_title')
    Empresa Traslado Tipo Movilidade
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empresa Traslado Tipo Movilidade') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empresa-traslados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Empresa') }}
                                </a>
                                <a href="{{ route('empresa-traslado-tipo-movilidades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Movilidad') }}
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
                                        
										<th>Empresa Traslado Id Empresa Traslado</th>
										<th>Tipo Movilidad Id Tipo Movilidad</th>
										<th>Numero Max Pasajeros</th>
										<th>Numero Minimo Pasajeros</th>
										<th>Marca Modelo</th>
										<th>Maletas Maximo</th>
										<th>Cantidad Movilidades</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresaTrasladoTipoMovilidades as $empresaTrasladoTipoMovilidade)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $empresaTrasladoTipoMovilidade->empresaTraslado->Nombre_empresa_traslado }}</td>
											<td>{{ $empresaTrasladoTipoMovilidade->tipoMovilidade->Nombre_tipo_movilidad }}</td>
											<td>{{ $empresaTrasladoTipoMovilidade->Numero_max_pasajeros }}</td>
											<td>{{ $empresaTrasladoTipoMovilidade->Numero_minimo_pasajeros }}</td>
											<td>{{ $empresaTrasladoTipoMovilidade->Marca_modelo }}</td>
											<td>{{ $empresaTrasladoTipoMovilidade->Maletas_maximo }}</td>
											<td>{{ $empresaTrasladoTipoMovilidade->Cantidad_movilidades }}</td>

                                            <td>
                                                <form action="{{ route('empresa-traslado-tipo-movilidades.destroy',$empresaTrasladoTipoMovilidade->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empresa-traslado-tipo-movilidades.show',$empresaTrasladoTipoMovilidade->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empresa-traslado-tipo-movilidades.edit',$empresaTrasladoTipoMovilidade->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('servicio-traslados.index',$empresaTrasladoTipoMovilidade->id) }}"><i class="fa fa-fw fa-edit"></i>Servicios de Traslado</a>
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
                {!! $empresaTrasladoTipoMovilidades->links() !!}
            </div>
        </div>
    </div>
@endsection
