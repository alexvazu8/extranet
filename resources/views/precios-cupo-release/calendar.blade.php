@extends('layouts.app')

@section('content')
<div style="background-color: Green; color: #f1f1f1; font-weight: bold; font-size: x-large"> 
{{ $tipoHabitacionHotel[0]->Nombre_Habitacion }}
                            <div class="float-right">
                                <a href="{{ route('precios-cupo-releases.create2',$tipoHabitacionHotelId) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nueva') }}
                                </a>

                                <a href="{{ route('precios-cupo-releases.cierre',$tipoHabitacionHotelId) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Cierre') }}
                                </a>
                            </div>
</div>
<div class="container">  

      <div id='calendar'></div>
</div>





<div class="modal fade" id="eventoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-content">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
 </div>
</div>
  
@endsection

@section('calendario')

@if(isset($preciosCupoRelease2) && !empty($preciosCupoRelease2))
<script > 
            document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            @foreach ($preciosCupoRelease2 as $precioCupoRelease)
                {
                    title: 'Precio: {{ $precioCupoRelease->Costo_habitacion }}, Cupo: {{ $precioCupoRelease->Cupo_habitacion }}, Release: {{ $precioCupoRelease->Release_habitacion }}',
                    start: '{{ $precioCupoRelease->Fecha_precio_cupo_release_noche }}',
                    url: '{{ route("precios-cupo-releases.edit", $precioCupoRelease->id) }}',
                    id: '{{  $precioCupoRelease->id }}',
                    backgroundColor: (@if($precioCupoRelease->Cierre == true) "red" @else "#378006" @endif),
                    borderColor: (@if($precioCupoRelease->Cierre == true) "red" @else "#378006" @endif)
                },
            @endforeach
        ],
        eventMouseEnter: function(info) {

          var precioCupoReleaseId = info.event.id;
          //console.log(info.event.id);

          // Define la URL con el método show2
          var url = '{{ route("precios-cupo-releases.show2", ":id") }}';
          url = url.replace(':id', precioCupoReleaseId);
             

                $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Colocar el contenido en el cuerpo del modal
                   // Parsea el objeto JSON si no está en formato de objeto JavaScript
                  var responseData = typeof response === 'string' ? JSON.parse(response) : response;

                  // Construye el contenido del modal
                  var modalContent = '<div class="modal-content">';
                  for (var key in responseData) {
                      if (responseData.hasOwnProperty(key)) {
                          modalContent += '<p><strong>' + key + ':</strong> ' + responseData[key] + '</p>';
                      }
                  }
                  modalContent += '</div>';
                   var url2 = '{{ route("precios-cupo-releases.edit", ":id") }}';
                   url2 = url2.replace(':id', precioCupoReleaseId);
                  modalContent+='<button type="button" class="btn btn-primary"  onclick="window.location.href = \'' + url2 + '\'">Editar</button>';


                  // Coloca el contenido en el cuerpo del modal
                  $('#modal-content').html(modalContent);

                  // Muestra el modal
                  $('#eventoModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
     
       
       
  });
    calendar.render();
});

</script>
@endif

@endsection

