<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GrupoFotosHotel
 *
 * @property $id
 * @property $Nombre_Grupo_Fotos
 *
 * @property FotosHotel[] $fotosHotels
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GrupoFotosHotel extends Model
{
    
    static $rules = [
		'Nombre_Grupo_Fotos' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre_Grupo_Fotos'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotosHotels()
    {
        return $this->hasMany('App\Models\FotosHotel', 'grupo_fotos_id', 'id');
    }
    

}
