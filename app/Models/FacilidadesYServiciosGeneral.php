<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FacilidadesYServiciosGeneral
 *
 * @property $id
 * @property $Facilidad_y_Servicio_general
 * @property $updated_at
 * @property $created_at
 *
 * @property HotelFacilidadesYServicio[] $hotelFacilidadesYServicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FacilidadesYServiciosGeneral extends Model
{
    
    static $rules = [
		'Facilidad_y_Servicio_general' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Facilidad_y_Servicio_general'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotelFacilidadesYServicios()
    {
        return $this->hasMany('App\Models\HotelFacilidadesYServicio', 'facilidades_y_servicios_generales_Id_facilidad_y_servicio_genera', 'id');
    }
    

}
