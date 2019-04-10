<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $car_owner = Role::create(['name' => 'car owner']);
        $user = Role::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        Permission::create(['name' => 'view backend']);

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo('view backend');

        $this->enableForeignKeys();
    }
}
