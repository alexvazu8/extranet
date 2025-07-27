<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reserva
 *
 * @property $id
 * @property $tipo_reserva
 * @property $Localizador
 * @property $Importe_Reserva
 * @property $Nombre_Cliente
 * @property $Numero_Adultos
 * @property $Numero_menores
 * @property $Usuario_id
 * @property $Email_contacto_reserva
 * @property $Comentarios
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleReserva[] $detalleReservas
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reserva extends Model
{
    
    static $rules = [
		'tipo_reserva' => 'required',
		'Importe_Reserva' => 'required',
		'Nombre_Cliente' => 'required',
		'Numero_Adultos' => 'required',
		'Numero_menores' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_reserva','Localizador','Importe_Reserva','Nombre_Cliente','Numero_Adultos','Numero_menores','Usuario_id','Email_contacto_reserva','Comentarios'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleReservas()
    {
        return $this->hasMany('App\Models\DetalleReserva', 'Reserva_Id_reserva', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'Usuario_id');
    }
    

}
