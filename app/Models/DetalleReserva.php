<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleReserva
 *
 * @property $id
 * @property $Fecha_in
 * @property $Fecha_out
 * @property $Precio_Servicio
 * @property $Reserva_Id_reserva
 * @property $Usuario_id
 * @property $Tipo_Habitacion_Id_tipo_habitacion_hotel
 * @property $Tour_Id_tour
 * @property $Numero_Adultos
 * @property $Numero_menores
 * @property $Empresa_traslados_tipo_movilidades_Id
 * @property $Costo_servicio
 * @property $updated_at
 * @property $created_at
 *
 * @property ClienteDetalleReserva[] $clienteDetalleReservas
 * @property EmpresaTrasladoTipoMovilidade $empresaTrasladoTipoMovilidade
 * @property Reserva $reserva
 * @property TipoHabitacionHotel $tipoHabitacionHotel
 * @property Tour $tour
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleReserva extends Model
{
    
    static $rules = [
		'Precio_Servicio' => 'required',
		'Reserva_Id_reserva' => 'required',
		'Numero_Adultos' => 'required',
		'Numero_menores' => 'required',
		'Costo_servicio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Fecha_in','Fecha_out','Precio_Servicio','Reserva_Id_reserva','Usuario_id','Tipo_Habitacion_Id_tipo_habitacion_hotel','Tour_Id_tour','Numero_Adultos','Numero_menores','Empresa_traslados_tipo_movilidades_Id','Costo_servicio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteDetalleReservas()
    {
        return $this->hasMany('App\Models\ClienteDetalleReserva', 'Detalle_reserva_Id_detalle_Reserva', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresaTrasladoTipoMovilidade()
    {
        return $this->hasOne('App\Models\EmpresaTrasladoTipoMovilidade', 'Id_empresa_traslado_tipo_movilidades', 'Empresa_traslados_tipo_movilidades_Id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reserva()
    {
        return $this->hasOne('App\Models\Reserva', 'id', 'Reserva_Id_reserva');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoHabitacionHotel()
    {
        return $this->hasOne('App\Models\TipoHabitacionHotel', 'id', 'Tipo_Habitacion_Id_tipo_habitacion_hotel');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tour()
    {
        return $this->hasOne('App\Models\Tour', 'id', 'Tour_Id_tour');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'Usuario_id');
    }

    

}
