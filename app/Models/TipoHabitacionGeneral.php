<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoHabitacionGeneral
 *
 * @property $id
 * @property $Nombre_general_Habitacion
 * @property $Cantidad_Adultos
 * @property $Cantidad_Menores
 * @property $updated_at
 * @property $created_at
 *
 * @property TipoHabitacionHotel[] $tipoHabitacionHotels
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoHabitacionGeneral extends Model
{
    
    static $rules = [
		'Nombre_general_Habitacion' => 'required',
		'Cantidad_Adultos' => 'required',
		'Cantidad_Menores' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre_general_Habitacion','Cantidad_Adultos','Cantidad_Menores'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoHabitacionHotels()
    {
        return $this->hasMany('App\Models\TipoHabitacionHotel', 'Tipo_Habitacion_general_Id_tipo_Habitacion_general', 'id');
    }
    

}
