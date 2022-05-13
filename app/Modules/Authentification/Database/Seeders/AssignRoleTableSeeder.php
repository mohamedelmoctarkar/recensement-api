<?php

namespace Modules\Authentification\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Modules\Authentification\Entities\User;

class AssignRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::where('name', 'Admin')->first();
        // Give the admin all permissions
        // $admin->givePermissionTo(Permission::all());

        $user = User::findOrFail(1);
        $user->assignRole('Admin');
        $user->givePermissionTo(Permission::all());
        $user = User::findOrFail(2);
        $user->assignRole('User');
        $user->givePermissionTo("read dashbord");
    }
}
