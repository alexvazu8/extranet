$(function () {
  $('#Id_Pais').on('change', Seleccionarycambiar);
  $('#Pais_Id_Pais').on('change', Seleccionarycambiartour);
});

function Seleccionarycambiar() {
  var Id_Pais = $(this).val();
  $.get('/hotels/ciudades/' + Id_Pais, function (data) {
    if (!Id_Pais) $('#Id_Ciudad').html('<option value="">Seleccione Ciudad</option>');
    var Html_select = '<option value="">Seleccione Ciudad</option>';

    for (i = 0; i < data.length; ++i) {
      //console.log(data[i]);
      Html_select += '<option value="' + data[i].Id_Ciudad + '">' + data[i].Nombre_Ciudad + '</option>';
    }

    $('#Id_Ciudad').html(Html_select);
  });
}

function Seleccionarycambiartour() {
  var Id_Pais = $(this).val();
  
  $.get('/hotels/ciudades/' + Id_Pais, function (data) {
    
       if (!Id_Pais)
            $('#Ciudad_Id_Ciudad').html('<option value="">Seleccione Ciudad</option>');

       var Html_select = '<option value="">Seleccione Ciudad</option>';
       for (i = 0; i < data.length; ++i) {
            //console.log(data[i]);
            Html_select += '<option value="' + data[i].Id_Ciudad + '">' + data[i].Nombre_Ciudad + '</option>';
       }
       $('#Ciudad_Id_Ciudad').html(Html_select);

  });
}
