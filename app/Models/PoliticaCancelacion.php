<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PoliticaCancelacion
 *
 * @property $id
 * @property $Nombre_Politica
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PoliticaCancelacion extends Model
{
    
    static $rules = [
		'Nombre_Politica' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre_Politica'];



}
