$(function () {

    $('#Id_Ciudad').on('change', SeleccionarycambiarZona);
    $('#Ciudad_Id_Ciudad').on('change', SeleccionarycambiarZonaTour);

});

function SeleccionarycambiarZona() {
    var Id_Ciudad = $(this).val();
    $.get('/hotels/zonas/' + Id_Ciudad, function (data) {

        if (!Id_Ciudad)
            $('#Id_Zona').html('<option value="">Seleccione Ciudad</option>');

        var Html_select = '<option value="">Seleccione Ciudad</option>';
        for (i = 0; i < data.length; ++i) {
            //console.log(data[i]);
            Html_select += '<option value="' + data[i].Id_Zona + '">' + data[i].Nombre_Zona + '</option>';
        }
        $('#Id_Zona').html(Html_select);

    });

}
function SeleccionarycambiarZonaTour() {
   
    var Id_Ciudad = $(this).val();
    $.get('/hotels/zonas/' + Id_Ciudad, function (data) {

        if (!Id_Ciudad)
            $('#Zona_Id_Zona').html('<option value="">Seleccione Ciudad</option>');

        var Html_select = '<option value="">Seleccione Ciudad</option>';
        for (i = 0; i < data.length; ++i) {
            //console.log(data[i]);
            Html_select += '<option value="' + data[i].Id_Zona + '">' + data[i].Nombre_Zona + '</option>';
        }
        $('#Zona_Id_Zona').html(Html_select);

    });

}