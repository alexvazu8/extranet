<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $primaryKey = 'Id_Hotel';
    protected $fillable = ['Id_Hotel','Nombre_hotel','estrellas_id', 'Numero_identificacion_tributaria', 'Direccion_Hotel','Telefono_reservas_hotel','Cel_reservas_hotel','email_reservas_hotel','email_comercial_hotel','Pais_Id_Pais','Zona_Id_Zona','ciudad_Id_ciudad','Descripcion_Hotel','Latitud','Longitud','Foto_Principal_Hotel'];
 /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ciudad()
    {
        return $this->hasOne('App\Models\Ciudade', 'Id_Ciudad','ciudad_Id_ciudad');
       
    }
    public function pais()
    {
        return $this->hasOne('App\Models\Paise', 'Id_Pais','Pais_Id_Pais');
       
    }
    public function zona()
    {
        return $this->hasOne('App\Models\Zona', 'Id_Zona','Zona_Id_Zona');
       
    }
    public function estrella()
    {
        return $this->hasOne('App\Models\Estrella', 'id','estrellas_id');
       
    }

    

}