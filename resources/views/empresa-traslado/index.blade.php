@extends('layouts.app')

@section('template_title')
    Empresa Traslado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empresa Traslado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empresa-traslados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre Empresa Traslado</th>
										<th>Descripcion Empresa</th>
										<th>Celular Emergencia</th>
										<th>Telefono Oficina</th>
										<th>Email Empresa Traslados</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresaTraslados as $empresaTraslado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $empresaTraslado->Nombre_empresa_traslado }}</td>
											<td>{{ $empresaTraslado->Descripcion_empresa }}</td>
											<td>{{ $empresaTraslado->Celular_Emergencia }}</td>
											<td>{{ $empresaTraslado->Telefono_Oficina }}</td>
											<td>{{ $empresaTraslado->email_empresa_traslados }}</td>

                                            <td>
                                                <form action="{{ route('empresa-traslados.destroy',$empresaTraslado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empresa-traslados.show',$empresaTraslado->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empresa-traslados.edit',$empresaTraslado->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $empresaTraslados->links() !!}
            </div>
        </div>
    </div>
@endsection
