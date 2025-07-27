<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;
    static $rules = [
		'Nombre_Zona' => 'required',
        'Ciudad_Id_Ciudad' => 'required',
		
    ];

    
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre_Zona','Ciudad_Id_Ciudad'];

        /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ciudade()
    {
        return $this->hasOne('App\Models\Ciudade', 'Id_Ciudad', 'Ciudad_Id_Ciudad');
    }

}
