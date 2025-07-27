<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Modelo\Permission;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     static $rules = [
		'name' => 'required',
        'email' => 'required',
		'celular' => 'required',
        'tipo_usuario' => 'required',
        'markup' => 'required',
		
    ];
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',	
        'remember_token',
        'created_at',
        'updated_at',
        'celular',
        'tipo_usuario',  
        'markup',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_has_roles');
    }

    public function hasPermission($permission)
    {    $roles=$this->roles;
        
        //echo $permission;

       // $permiso = \App\Models\Permission::where('name',$permission); // busca el permiso

        //$roles_permiso = $permiso->roles();
       // print_r($permiso->all());
       /* $usuario = User::find($usuarioId); // Reemplaza $usuarioId con el ID del usuario que deseas verificar

        if ($usuario->roles()->whereIn('id', $roles->pluck('id'))->exists()) {
            // El usuario tiene al menos uno de los roles asociados al permiso
            // Realiza aquí las acciones que deseas realizar en caso de que el permiso esté asignado al usuario
        }*/
       
      $i=1;
        // Verificar si algún rol tiene el permiso requerido
        $bandera=false;
        $rolesname=[];
        foreach ($roles as $role) {
         //print_r($role);
           $rolesname[]=$role->name;

        } 
        //echo $permission;
          $permisos = $this->join('user_has_roles', 'users.id', '=', 'user_has_roles.user_id')
          ->join('roles', 'user_has_roles.role_id', '=', 'roles.id')
          ->join('role_has_permissions', 'roles.id', '=', 'role_has_permissions.role_id')
          ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('permissions.guard_name',$permission)
            ->whereIn('roles.name', $rolesname)
            ->get();
        //print_r($permisos->all());
        if(isset($permisos[0]['guard_name']))
        {  return true;} 
        else{  return false;} 
      
           
    }

     
}