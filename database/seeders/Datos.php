<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
class Datos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $admin = Role::create(['name' => 'admin']);
        $cobrador = Role::create(['name' => 'cobrador']);
        $lector = Role::create(['name' => 'lector']);

        Permission::create(['name' => 'vendedor_create']);
        Permission::create(['name' => 'vendedor_view']);
        Permission::create(['name' => 'vendedor_edit']);
        Permission::create(['name' => 'vendedor_destroy']);

        Permission::create(['name' => 'usuarios_create']);
        Permission::create(['name' => 'usuarios_view']);
        Permission::create(['name' => 'usuarios_edit']);
        Permission::create(['name' => 'usuarios_destroy']);

        Permission::create(['name' => 'clientes_create']);
        Permission::create(['name' => 'clientes_view']);
        Permission::create(['name' => 'clientes_edit']);
        Permission::create(['name' => 'clientes_destroy']);

        Permission::create(['name' => 'cobradores_create']);
        Permission::create(['name' => 'cobradores_view']);
        Permission::create(['name' => 'cobradores_edit']);
        Permission::create(['name' => 'cobradores_destroy']);

        Permission::create(['name' => 'choques_create']);
        Permission::create(['name' => 'choques_view']);
        Permission::create(['name' => 'choques_edit']);
        Permission::create(['name' => 'choques_destroy']);

        Permission::create(['name' => 'pagos_create']);
        Permission::create(['name' => 'pagos_view']);
        Permission::create(['name' => 'pagos_edit']);
        Permission::create(['name' => 'pagos_destroy']);



        $admin->givePermissionTo([
            'vendedor_create',
            'vendedor_view',
            'vendedor_edit',
            'vendedor_destroy',

            'usuarios_create',
            'usuarios_view',
            'usuarios_edit',
            'usuarios_destroy',

            'clientes_create',
            'clientes_view',
            'clientes_edit',
            'clientes_destroy',

            'cobradores_create',
            'cobradores_view',
            'cobradores_edit',
            'cobradores_destroy',

            'choques_create',
            'choques_view',
            'choques_edit',
            'choques_destroy',

            'pagos_create',
            'pagos_view',
            'pagos_edit',
            'pagos_destroy'


        ]);

        $cobrador->givePermissionTo([
            'clientes_create',
            'clientes_view',
            'clientes_edit',
            'clientes_destroy',
            'pagos_create',
            'pagos_view',
            'pagos_edit',
            'pagos_destroy'

            ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'nacho739',
            'password' => Hash::make('123')
        ]);
        $user = User::find(1);
        $user->assignRole('admin');

    }
}
