<?php

namespace Modules\Authentification\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
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
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $modules = ['HYDRAULIQU', 'ENVIRONNEMENT', 'ELEVAGE ', 'AGRICULTURE'];

        //

        foreach ($modules as $module) {

            DB::insert('insert into modules (name) values (?)', [$module]);
            // create products permissions
            Permission::create(['name' => 'read ' . $module]);
            Permission::create(['name' => 'store ' . $module]);
            Permission::create(['name' => 'update ' . $module]);
            Permission::create(['name' => 'destroy ' . $module]);
        }
    }
}
