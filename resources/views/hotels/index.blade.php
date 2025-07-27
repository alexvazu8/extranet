@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Extranet</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('hotels.create') }}">Crear Nuevo Hotel</a>
                <a class="btn btn-success" href="{{ route('hotels.estrellas_desc') }}"> Estrellas Desc</a>
                <a class="btn btn-success" href="{{ route('hotels.estrellas_asc') }}"> Estrellas Asc</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($hotel as $hotel1)
        <tr>
            <td>{{ ++$i }}</td>
            <td>
                {{ $hotel1->Nombre_Hotel }}
                @if($hotel1->estrella->estrellas==1 && $hotel1->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel1->estrella->estrellas==2 && $hotel1->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel1->estrella->estrellas==3 && $hotel1->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel1->estrella->estrellas==4 && $hotel1->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel1->estrella->estrellas==5 && $hotel1->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel1->estrella->estrellas==1 && $hotel1->estrella->tipo_categoria=='L')<span>&#128273;</span>@endif
                @if($hotel1->estrella->estrellas==2 && $hotel1->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span>@endif
                @if($hotel1->estrella->estrellas==3 && $hotel1->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span><span>&#128273;</span>@endif
                @if($hotel1->estrella->estrellas==4 && $hotel1->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span><span>&#128273;</span><span>&#128273;</span>@endif
                @if($hotel1->estrella->estrellas==5 && $hotel1->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span><span>&#128273;</span><span>&#128273;</span><span>&#128273;</span>@endif
            </td>
            <td>{{ $hotel1->Numero_identificacion_tributaria }}</td>
            <td>
                <form action="{{ route('hotels.destroy',$hotel1->Id_Hotel) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('hotels.show',$hotel1) }}">Mostrar</a>
                    <a class="btn btn-primary" href="{{ route('hotels.edit',$hotel1) }}">Editar</a>
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $hotel->links() !!}
      
@endsection