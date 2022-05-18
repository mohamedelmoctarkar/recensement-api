<?php

namespace Modules\Authentification\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class AuthentificationDatabaseSeeder extends Seeder
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

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '26462626',
            'password' => Hash::make(123456),
            'region_id' => '1'
        ]);


        DB::table('users')->insert([
            'name' => 'agent',
            'email' => 'agent@agent.com',
            'phone' => '43462626',
            'password' => Hash::make(123456),
            'region_id' => '2'
        ]);
    }
}
