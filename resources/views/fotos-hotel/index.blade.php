@extends('layouts.app')

@section('template_title')
    Fotos Hotel
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Fotos Hotel') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('fotos-hotels.createporhotel',$Hotel_Id_Hotel) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre Foto Hotel</th>
										<th>Foto Hotel</th>
										<th>Hotel Id Hotel</th>
                                        <th>Grupo Foto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fotosHotels as $fotosHotel)
                                    
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $fotosHotel->Nombre_Foto_Hotel }}</td>
											<td> <img width="50" src="{{ asset('storage/' . $fotosHotel->Foto_Hotel) }}" alt="Foto del hotel">  </td>
											<td>{{ $fotosHotel->hotel->Nombre_Hotel }}</td>
                                            <td>{{ $fotosHotel->grupofotos->Nombre_Grupo_Fotos }}</td>

                                            <td>
                                                <form action="{{ route('fotos-hotels.destroy',$fotosHotel->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('fotos-hotels.show',$fotosHotel->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('fotos-hotels.edit',$fotosHotel->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $fotosHotels->links() !!}
            </div>
        </div>
    </div>
@endsection
