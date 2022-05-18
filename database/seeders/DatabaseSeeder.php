<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\Authentification\Database\Seeders\RolesTableSeeder;
use Modules\Authentification\Database\Seeders\AssignRoleTableSeeder;
use Modules\Authentification\Database\Seeders\PermissionsTableSeeder;
use Modules\Authentification\Database\Seeders\AuthentificationDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();





        DB::table('regions')->insert([
            [

                'name' => 'Adrar',


            ],
            [

                'name' => 'Assaba',


            ],
            [

                'name' => 'Brakna',


            ],
            [

                'name' => 'Dakhlet Nouadhibou ',


            ],
            [

                'name' => 'Gorgol',


            ],
            [

                'name' => 'Guidimakha',


            ],
            [

                'name' => 'Hodh Ech Chargui',


            ],
            [

                'name' => 'Inchiri',


            ],
            [

                'name' => 'Nouakchott-Ouest',


            ],
            [

                'name' => 'Nouakchott-Nord',


            ],
            [

                'name' => 'Nouakchott-Sud',


            ],
            [

                'name' => 'Tagant',


            ],
            [

                'name' => 'Tiris Zemmour',


            ],
            [

                'name' => 'Trarza',


            ]
        ]);


        DB::table('moughataas')->insert([
            [

                'name' => 'Boutilimit',
                'region_id' => '14'


            ],
            [

                'name' => 'Ouad Naga',
                'region_id' => '14'

            ],
            [

                'name' => 'R\'Kiz',
                'region_id' => '14'


            ]
        ]);


        $this->call([
            AuthentificationDatabaseSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            AssignRoleTableSeeder::class,
        ]);
    }
}
