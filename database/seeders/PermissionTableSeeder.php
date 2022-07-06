<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'actores-list',
            'actores-create',
            'actores-edit',
            'actores-delete',
            'cobranza-list',
            'cobranza-create',
            'cobranza-edit',
            'cobranza-delete',
            'cuentas-list',
            'cuentas-create',
            'cuentas-edit',
            'cuentas-delete',
            'dependencias-list',
            'dependencias-create',
            'dependencias-edit',
            'dependencias-delete',
            'estados-list',
            'estados-create',
            'estados-edit',
            'estados-delete',
            'estatus-list',
            'estatus-create',
            'estatus-edit',
            'estatus-delete',
            'festivos-list',
            'festivos-create',
            'festivos-edit',
            'festivos-delete',
            'municipios-list',
            'municipios-create',
            'municipios-edit',
            'municipios-delete',
            'notificaciones-list',
            'notificaciones-create',
            'notificaciones-edit',
            'notificaciones-delete',
            'paises-list',
            'paises-create',
            'paises-edit',
            'paises-delete',
            'peticiones-list',
            'peticiones-create',
            'peticiones-edit',
            'peticiones-delete',
            'regiones-list',
            'regiones-create',
            'regiones-edit',
            'regiones-delete',
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
