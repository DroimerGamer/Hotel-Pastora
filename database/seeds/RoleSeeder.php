<?php

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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Auxiliar']);
        $role3 = Role::create(['name' => 'Recepcionista']);

        Permission::create(['name' => 'admin'])->assignRole($role1);
        Permission::create(['name' => 'auxiliar'])->assignRole($role2);
        Permission::create(['name' => 'recepcionista'])->assignRole($role3);

        Permission::create(['name' => 'admin.aux'])->assignRole([$role1,$role2]);
        Permission::create(['name' => 'los3'])->assignRole([$role1,$role2,$role3]);
        
    }
}
