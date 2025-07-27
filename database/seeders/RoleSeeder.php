<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Administrator']);
        $role2 = Role::create(['name' => 'AdminCta']);
        $role3 = Role::create(['name' => 'UsuarioHotel']);
        $role4 = Role::create(['name' => 'UsuarioOperadora']);

        $permiso1 = Permission::create(['name' => 'hotels.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        $permiso2 = Permission::create(['name' => 'hotels.create'])->syncRoles([$role1,$role2,$role3,$role4]);
        $permiso3 = Permission::create(['name' => 'hotels.edit'])->syncRoles([$role1,$role2]);
        $permiso4 = Permission::create(['name' => 'hotels.destroy'])->syncRoles([$role1,$role2]);
        $permiso5 = Permission::create(['name' => 'hotels.show'])->syncRoles([$role1,$role2,$role3,$role4]);
        $permiso6 = Permission::create(['name' => 'hotels.update'])->syncRoles([$role1,$role2]);
        $permiso7 = Permission::create(['name' => 'hotels.store'])->syncRoles([$role1,$role2,$role3,$role4]);



    }
}
