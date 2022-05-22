<?php

namespace Database\Seeders;

use Carbon\Carbon;
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

                'name' => 'Keyheydi-Ouest',


            ],
            [

                'name' => 'Keyheydi-Nord',


            ],
            [

                'name' => 'Keyheydi-Sud',


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
        DB::table('delegations')->insert([
            [

                'name' => 'Délégation Régionale de l’Agriculture (DRA)',



            ],
            [

                'name' => 'Délégation Régionale de l’élevage (DRE)',

            ],
            [

                'name' => 'Délégation Régionale de l’Environnement (DRENV)',


            ],
            [

                'name' => 'Délégation Régionale de l’Hydraulique (DRH)',


            ]
        ]);


        DB::table('entities')->insert([
            [

                'name' => 'Culture maraichère',
                'delegation_id' => 1



            ],
            [

                'name' => 'Culture sous-pluie',
                'delegation_id' => 1

            ],
            [

                'name' => 'Culture de décrues',
                'delegation_id' => 1

            ],
            [

                'name' => 'élevage ',
                'delegation_id' => 2

            ],
            [

                'name' => 'environnement',
                'delegation_id' => 3

            ],
            [

                'name' => 'hydraulique',
                'delegation_id' => 4

            ],
        ]);

        DB::table('forms')->insert([
            [

                'name' => 'Fiche Anuelle',
                'entity_id' => 1



            ],
            [

                'name' => 'Fiche Mensuelle',
                'entity_id' => 1

            ],


        ]);

        DB::table('groupes')->insert([
            [

                'name' => 'Appui aux bénéficiaires',
                'form_id' => 1,

            ],
            [

                'name' => 'Superficie cultivable',
                'form_id' => 1,

            ],
            [

                'name' => 'Agent de Vulgarisation à la Base (AVB)',
                'form_id' => 1,

            ]

        ]);
        DB::table('sous_groupes')->insert([
            [

                'name' => 'Grillage ',
                'groupe_id' => 1,

            ],
            [

                'name' => 'Outillage ',
                'groupe_id' => 1,

            ],
            [
                'name' => 'Superficie cultivable par Moughataa',
                'groupe_id' => 2,
            ],
            [
                'name' => 'Repartition des AVB par Moughataa',
                'groupe_id' => 3,
            ]

        ]);

        DB::table('fields')->insert([
            [

                'label' => 'Quantité disponibilisée',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'ML',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 1,
                'sous_groupe_id' => 1,
            ],
            [

                'label' => 'Superficie à clôturer',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'ML',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 1,
                'sous_groupe_id' => 1,
            ],
            [

                'label' => 'Brouettes ',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'unités',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 1,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Pelles',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'unités',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 1,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Râteaux',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'unités',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 1,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Gants',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'unités',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 1,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Bottes',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'unités',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 1,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Semences ',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'gr',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 1,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Produits phytosanitaires',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'litres',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 1,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Superficie totale cultivable',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'ha',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 2,
                'sous_groupe_id' => null,
            ],
            [

                'label' => 'Moughataa 1',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'ha',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 2,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Moughataa 2',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'ha',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 2,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Moughataa 3',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'ha',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 2,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Moughataa 4',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'ha',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 2,
                'sous_groupe_id' => 2,
            ],
            [

                'label' => 'Nombre total',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'AVB',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 3,
                'sous_groupe_id' => null,
            ],
            [

                'label' => 'Moughataa 1',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'AVB',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 3,
                'sous_groupe_id' => 3,
            ],
            [

                'label' => 'Moughataa 2',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'AVB',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 3,
                'sous_groupe_id' => 3,
            ],
            [

                'label' => 'Moughataa 3',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'AVB',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 3,
                'sous_groupe_id' => 3,
            ],
            [

                'label' => 'Moughataa 4',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'AVB',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 3,
                'sous_groupe_id' => 3,
            ],
            [

                'label' => 'Moughataa 5',
                'validator' => '',
                'initial_value' => ' ',
                'type' => 'string',
                'unite' => 'AVB',
                'form_id' => 1,
                'added_for' => null,
                'groupe_id' => 3,
                'sous_groupe_id' => 3,
            ],
        ]);



        DB::table('declarations')->insert([
            [

                "reference" => "DF0004526",
                "created_at" => Carbon::now(),
                "peroid" => "ANUELLE",
                "form_data" => "{\"f1_sup_reel_cult\":\"786\",\"f1_solution_pr_renc_id\":\"1\",\"f1_problem_rencont\":\"السلام عليكم\",\"f1_solution_pr_renc\":\"كيف حالكم\",\"Calendrier cultural\":{\"f1_date_semis\":\"2022-05-25\",\"date_germisaison\":\"2022-05-17\"},\"Ennemies de cultures\":{\"f1_emenie_1\":\"lkjkl\",\"f2_emenie_2\":\"jkljklj\"}}",
                "form_id" => 1

            ],



        ]);



        $this->call([
            AuthentificationDatabaseSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            AssignRoleTableSeeder::class,
        ]);
    }
}
