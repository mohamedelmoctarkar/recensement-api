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
            'email' => 'admin@test.com',
            'password' => Hash::make(123456)
        ]);


        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => Hash::make(123456)
        ]);
    }
}
