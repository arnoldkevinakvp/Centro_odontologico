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
        
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Odontologo']);
        $role3 = Role::create(['name' => 'Paciente']);
        $role4 = Role::create(['name' => 'Secretaria']);

        //Permisos para pacientes
        Permission::create(['name' => 'patients.index'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'patients.create'])->syncRoles([$role1,$role4]);

        //Permisos para odontólogos
        Permission::create(['name' => 'dentist.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'dentist.create'])->syncRoles([$role1]);

        //Permisos para citas
        Permission::create(['name' => 'citas.create'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'citas.index'])->syncRoles([$role1,$role4]);

        //Permisos para documentos
        Permission::create(['name' => 'documents.index'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'documents.create'])->syncRoles([$role1,$role4]);

        //Permisos para reportes
        Permission::create(['name' => 'reports.orders'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'reports.orders_pdf'])->syncRoles([$role1,$role4]);        
    }
}
