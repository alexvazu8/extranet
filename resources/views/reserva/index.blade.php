@extends('layouts.app')

@section('template_title')
    Reserva
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reserva') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reservas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Tipo Reserva</th>
                                        <th>Fecha Creada</th>
										<th>Localizador</th>
										<th>Importe Reserva</th>
										<th>Nombre Cliente</th>
										<th>Numero Adultos</th>
										<th>Numero Menores</th>
										<th>Usuario Id</th>
										<th>Email Contacto Reserva</th>
										<th>Comentarios</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservas as $reserva)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reserva->tipo_reserva }}</td>
											<td>{{ $reserva->created_at }}</td>
                                            <td>{{ $reserva->Localizador }}</td>
											<td>{{ $reserva->Importe_Reserva }}</td>
											<td>{{ $reserva->Nombre_Cliente }}</td>
											<td>{{ $reserva->Numero_Adultos }}</td>
											<td>{{ $reserva->Numero_menores }}</td>
											<td>{{ $reserva->Usuario_id }}</td>
											<td>{{ $reserva->Email_contacto_reserva }}</td>
											<td>{{ $reserva->Comentarios }}</td>

                                            <td>
                                                <form action="{{ route('reservas.destroy',$reserva->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reservas.show',$reserva->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reservas.edit',$reserva->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reservas->links() !!}
            </div>
        </div>
    </div>
@endsection
