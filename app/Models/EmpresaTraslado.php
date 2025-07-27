<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmpresaTraslado
 *
 * @property $id
 * @property $Nombre_empresa_traslado
 * @property $Descripcion_empresa
 * @property $Celular_Emergencia
 * @property $Telefono_Oficina
 * @property $email_empresa_traslados
 * @property $updated_at
 * @property $created_at
 *
 * @property EmpresaTrasladoTipoMovilidade[] $empresaTrasladoTipoMovilidades
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmpresaTraslado extends Model
{
    
    static $rules = [
		'Nombre_empresa_traslado' => 'required',
		'Descripcion_empresa' => 'required',
		'Celular_Emergencia' => 'required',
		'Telefono_Oficina' => 'required',
		'email_empresa_traslados' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre_empresa_traslado','Descripcion_empresa','Celular_Emergencia','Telefono_Oficina','email_empresa_traslados'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empresaTrasladoTipoMovilidades()
    {
        return $this->hasMany('App\Models\EmpresaTrasladoTipoMovilidade', 'Empresa_traslado_Id_Empresa_traslado', 'id');
    }
    

}
