document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            @foreach ($preciosCupoRelease as $precioCupoRelease)
                {
                    title: 'Precio: {{ $precioCupoRelease->Costo_habitacion }}, Cupo: {{ $precioCupoRelease->Cupo_habitacion }}, Release: {{ $precioCupoRelease->Release_habitacion }}',
                    start: '{{ $precioCupoRelease->Fecha_precio_cupo_release_noche }}',
                    url: '{{ route("precios-cupo-releases.edit", $precioCupoRelease->id) }}',
                },
            @endforeach
        ]
    });
    calendar.render();
});