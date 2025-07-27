@extends('layouts.app')

@section('template_title')
    Grupo Fotos Hotel
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Grupo Fotos Hotel') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('grupo-fotos-hotels.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre Grupo Fotos</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupoFotosHotels as $grupoFotosHotel)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $grupoFotosHotel->Nombre_Grupo_Fotos }}</td>

                                            <td>
                                                <form action="{{ route('grupo-fotos-hotels.destroy',$grupoFotosHotel->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('grupo-fotos-hotels.show',$grupoFotosHotel->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('grupo-fotos-hotels.edit',$grupoFotosHotel->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $grupoFotosHotels->links() !!}
            </div>
        </div>
    </div>
@endsection
