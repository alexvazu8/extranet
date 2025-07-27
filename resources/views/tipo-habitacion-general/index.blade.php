@extends('layouts.app')

@section('template_title')
    Tipo Habitacion General
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipo Habitacion General') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipo-habitacion-generals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre General Habitacion</th>
										<th>Cantidad Adultos</th>
										<th>Cantidad Menores</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipoHabitacionGenerals as $tipoHabitacionGeneral)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tipoHabitacionGeneral->Nombre_general_Habitacion }}</td>
											<td>{{ $tipoHabitacionGeneral->Cantidad_Adultos }}</td>
											<td>{{ $tipoHabitacionGeneral->Cantidad_Menores }}</td>

                                            <td>
                                                <form action="{{ route('tipo-habitacion-generals.destroy',$tipoHabitacionGeneral->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipo-habitacion-generals.show',$tipoHabitacionGeneral->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipo-habitacion-generals.edit',$tipoHabitacionGeneral->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $tipoHabitacionGenerals->links() !!}
            </div>
        </div>
    </div>
@endsection
