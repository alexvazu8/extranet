<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

/**
 * Class UserHasRole
 *
 * @property $id
 * @property $role_id
 * @property $user_id
 * @property $updated_at
 * @property $created_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UserHasRole extends Model
{
    protected $table = 'user_has_roles';
    static $rules = [
		'role_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   /* public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }*/

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    

}
