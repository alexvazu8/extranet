@extends('layouts.app')

@section('template_title')
    Tours Contrato Cupo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tours Contrato Cupo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tours-contrato-cupos.create2',$idtour) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                              <div class="float-right">
                                <a href="{{ route('tours-contrato-cupos.create_rango',$idtour) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Ingresar Contrato') }}
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
                                        <th>Cantidad Adulto</th>
										<th>Costo Adulto</th>
                                        <th>Cantidad Menores</th>
                                        <th>Costo Menor</th>
										<th>Fecha Disponible</th>
										<th>Cupo</th>
										<th>Release</th>
										<th>Cierre</th>
										<th>Tours Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                               // $r1= $obj_tourcontratocupo->mostrar_tour($idtour,'2022-12-01');
                               $i=0;
                                
                                ?>
                                    @foreach ($toursContratoCupos as $toursContratoCupo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $toursContratoCupo->Cantidad_adultos }}</td>
                                            <td>{{ $toursContratoCupo->Costo_adulto }}</td>
                                            <td>{{ $toursContratoCupo->Cantidad_menores }}</td>
                                            <td>{{ $toursContratoCupo->Costo_menor }}</td>
											<td>{{ $toursContratoCupo->Fecha_disponible }}</td>
											<td>{{ $toursContratoCupo->Cupo }}</td>
											<td>{{ $toursContratoCupo->Release }}</td>
											<td>{{ $toursContratoCupo->cierre }}</td>
											<td>{{ $tour=$toursContratoCupo->find($toursContratoCupo->id,'Tours_id')->tour->Nombre_tour}}
                                           
                                            </td>

                                            <td>
                                                <form action="{{ route('tours-contrato-cupos.destroy',$toursContratoCupo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tours-contrato-cupos.show',$toursContratoCupo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tours-contrato-cupos.edit',$toursContratoCupo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
               
            </div>
        </div>
    </div>
@endsection
