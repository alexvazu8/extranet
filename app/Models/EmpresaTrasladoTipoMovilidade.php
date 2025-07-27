<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmpresaTrasladoTipoMovilidade
 *
 * @property $id
 * @property $Empresa_traslado_Id_Empresa_traslado
 * @property $Tipo_movilidad_Id_tipo_movilidad
 * @property $Numero_max_pasajeros
 * @property $Numero_minimo_pasajeros
 * @property $Marca_modelo
 * @property $Maletas_maximo
 * @property $Cantidad_movilidades
 * @property $updated_at
 * @property $created_at
 *
 * @property DetalleReserva[] $detalleReservas
 * @property EmpresaTraslado $empresaTraslado
 * @property TipoMovilidade $tipoMovilidade
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmpresaTrasladoTipoMovilidade extends Model
{
    
    static $rules = [
		'Empresa_traslado_Id_Empresa_traslado' => 'required',
		'Tipo_movilidad_Id_tipo_movilidad' => 'required',
		'Numero_max_pasajeros' => 'required',
		'Numero_minimo_pasajeros' => 'required',
		'Marca_modelo' => 'required',
		'Maletas_maximo' => 'required',
		'Cantidad_movilidades' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Empresa_traslado_Id_Empresa_traslado','Tipo_movilidad_Id_tipo_movilidad','Numero_max_pasajeros','Numero_minimo_pasajeros','Marca_modelo','Maletas_maximo','Cantidad_movilidades'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleReservas()
    {
        return $this->hasMany('App\Models\DetalleReserva', 'Empresa_traslados_tipo_movilidades_Id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresaTraslado()
    {
        return $this->hasOne('App\Models\EmpresaTraslado', 'id', 'Empresa_traslado_Id_Empresa_traslado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoMovilidade()
    {
        return $this->hasOne('App\Models\TipoMovilidade', 'id', 'Tipo_movilidad_Id_tipo_movilidad');
    }
    

}
