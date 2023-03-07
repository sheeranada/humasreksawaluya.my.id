<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list administrasi']);
        Permission::create(['name' => 'view administrasi']);
        Permission::create(['name' => 'create administrasi']);
        Permission::create(['name' => 'update administrasi']);
        Permission::create(['name' => 'delete administrasi']);

        Permission::create(['name' => 'list farmasi']);
        Permission::create(['name' => 'view farmasi']);
        Permission::create(['name' => 'create farmasi']);
        Permission::create(['name' => 'update farmasi']);
        Permission::create(['name' => 'delete farmasi']);

        Permission::create(['name' => 'list pelayanan']);
        Permission::create(['name' => 'view pelayanan']);
        Permission::create(['name' => 'create pelayanan']);
        Permission::create(['name' => 'update pelayanan']);
        Permission::create(['name' => 'delete pelayanan']);

        Permission::create(['name' => 'list pxrajal']);
        Permission::create(['name' => 'view pxrajal']);
        Permission::create(['name' => 'create pxrajal']);
        Permission::create(['name' => 'update pxrajal']);
        Permission::create(['name' => 'delete pxrajal']);

        Permission::create(['name' => 'list ruangtunggu']);
        Permission::create(['name' => 'view ruangtunggu']);
        Permission::create(['name' => 'create ruangtunggu']);
        Permission::create(['name' => 'update ruangtunggu']);
        Permission::create(['name' => 'delete ruangtunggu']);

        Permission::create(['name' => 'list sarpras']);
        Permission::create(['name' => 'view sarpras']);
        Permission::create(['name' => 'create sarpras']);
        Permission::create(['name' => 'update sarpras']);
        Permission::create(['name' => 'delete sarpras']);

        Permission::create(['name' => 'list sdm']);
        Permission::create(['name' => 'view sdm']);
        Permission::create(['name' => 'create sdm']);
        Permission::create(['name' => 'update sdm']);
        Permission::create(['name' => 'delete sdm']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
