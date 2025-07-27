<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estrella
 *
 * @property $id
 * @property $estrellas
 * @property $tipo_categoria
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estrella extends Model
{
    
    static $rules = [
		'estrellas' => 'required',
		'tipo_categoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['estrellas','tipo_categoria'];



}
