<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PreciosCupoRelease
 *
 * @property $id
 * @property $Costo_habitacion
 * @property $Release_habitacion
 * @property $Cupo_habitacion
 * @property $Tipo_habitacion_hotel_id_tipo_habitacion_hotel
 * @property $Fecha_precio_cupo_release_noche
 * @property $Cierre
 * @property $politica_id
 * @property $regimen_id
 * @property $updated_at
 * @property $created_at
 *
 * @property PoliticaCancelacion $politicaCancelacion
 * @property Regimen $regimen
 * @property TipoHabitacionHotel $tipoHabitacionHotel
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PreciosCupoRelease extends Model
{
    
    static $rules = [
		'Costo_habitacion' => 'required',
		'Release_habitacion' => 'required',
		'Cupo_habitacion' => 'required',
		'Tipo_habitacion_hotel_id_tipo_habitacion_hotel' => 'required',
		'Fecha_precio_cupo_release_noche' => 'required',
		'Cierre' => 'required',
    ];
    

    static    $rules2 = [
        'Costo_habitacion' => 'required',
        'Release_habitacion' => 'required',
        'Cupo_habitacion' => 'required',
        'Tipo_habitacion_hotel_id_tipo_habitacion_hotel' => 'required',
        'Fecha_de' => 'required',
        'Fecha_hasta' => 'required',
        'politica_id' => 'required',
        'regimen_id' => 'required',
    
    ];
  

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Costo_habitacion','Release_habitacion','Cupo_habitacion','Tipo_habitacion_hotel_id_tipo_habitacion_hotel','Fecha_precio_cupo_release_noche','Cierre','politica_id','regimen_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function politicaCancelacion()
    {
        return $this->hasOne('App\Models\PoliticaCancelacion', 'id', 'politica_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function regimen()
    {
        return $this->hasOne('App\Models\Regimen', 'id', 'regimen_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoHabitacionHotel()
    {
        return $this->hasOne('App\Models\TipoHabitacionHotel', 'id', 'Tipo_habitacion_hotel_id_tipo_habitacion_hotel');
    }
    

}
