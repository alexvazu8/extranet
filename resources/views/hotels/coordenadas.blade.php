
@section('scripts')
    
    <script>
        var latitudInput = document.getElementById('Latitud');
        var longitudInput = document.getElementById('Longitud');
       
        
        if(latitudInput.value==="")
        { 
            latitudInput.value=-17.764;//por defecto cuando no hay nada en la BD
            longitudInput.value=-63.196;//por defecto cuando no hah nada en la BD
        }

        var map = L.map('map').setView([latitudInput.value, longitudInput.value], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);
        var marker = L.marker([latitudInput.value, longitudInput.value]).addTo(map);
        var circle = L.circle([latitudInput.value, longitudInput.value], {
         color: 'grey',
         fillColor: '#ECEC',
         fillOpacity: 0.5,
         radius: 30
         }).addTo(map);

        var latitudInput = document.getElementById('Latitud');
        var longitudInput = document.getElementById('Longitud');

        function onMapClick(e) {
           
            latitudInput.value = e.latlng.lat;
            longitudInput.value = e.latlng.lng;
            map.removeLayer(marker);
           
           marker = L.marker([latitudInput.value, longitudInput.value]).addTo(map);
           

        }

        map.on('click', onMapClick);
    </script>
@endsection

    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Añadir coordenadas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hotels.index') }}"> Atras</a>
            </div>
        </div>
    </div>
  
    <div class="form-group">
        <label for="latitud">Latitud:</label>
        <input type="text" name="Latitud" id="Latitud" value="{{ $Hotel->Latitud }}" class="form-control" >
    </div>
    <div class="form-group">
        <label for="longitud">Longitud:</label>
        <input type="text" name="Longitud" id="Longitud" value="{{ $Hotel->Longitud }}" class="form-control" >
    </div>
    <div id="conteiner">
    <div id="map" style="width: 700px; height: 400px"></div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

