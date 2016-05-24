<?php

use Illuminate\Database\Seeder;

class CarrersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('carrers')->insert(['cnom' => 'Federació',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/festamajordesantscat/',
            'ctwitter' => 'https://twitter.com/FMSants',
            'cinstagram' => '',
            'user_id' => 1,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Alcolea de dalt',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/comissioalcoleadedalt.sants/',
            'ctwitter' => 'https://twitter.com/AlcoleadeDalt',
            'cinstagram' => 'https://www.instagram.com/alcoleadedalt/',
            'user_id' => 2,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Alcolea de baix',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/AlcoleaDeBaix/',
            'ctwitter' => 'https://twitter.com/AlcoleaDeBaix',
            'cinstagram' => '',
            'user_id' => 3,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Casa Gran Rosés',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/Comissi%C3%B3-de-Festes-Casa-Gran-248713621908494/',
            'ctwitter' => '',
            'cinstagram' => '',
            'user_id' => 4,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Canalejas',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/comissiofestes.carrercanalejas/?fref=ts',
            'ctwitter' => 'https://twitter.com/ComiDeCanalejas',
            'cinstagram' => '',
            'user_id' => 5,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Finlandia',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/carrerfinlandia?fref=ts',
            'ctwitter' => '',
            'cinstagram' => '',
            'user_id' => 6,
        ]);
        DB::table('carrers')->insert(['cnom' => 'La Farga',
            'cany_inici' => '1982',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/comissiodefestes.lafarga',
            'ctwitter' => '',
            'cinstagram' => '',
            'user_id' => 7,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Galileu',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/festa.galileu',
            'ctwitter' => 'https://twitter.com/Comigalileu',
            'cinstagram' => 'https://www.instagram.com/lacomidegalileu/',
            'user_id' => 8,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Guadiana',
            'cany_inici' => '1999',
            'cdescripcio' => 'Descripcio per Guadiana: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis sed ante vel interdum. Proin sollicitudin eros sed eros accumsan feugiat. Nulla eu erat massa. Sed lobortis ex ipsum, ac vestibulum massa sollicitudin in. Suspendisse sollicitudin turpis neque. Sed lorem est, consequat id blandit vel, fringilla sed quam. Aliquam ac aliquam diam. Curabitur eget feugiat risus. Aenean vitae magna in urna accumsan sollicitudin a et leo. Morbi non sem ut justo laoreet dapibus non sit amet urna. Donec viverra magna justo, id pulvinar purus tempus eget. Etiam vel nisl in justo hendrerit auctor a a ante. Nam ac porta ex.',
            'cfacebook' => 'https://www.facebook.com/comi.guadiana?fref=ts',
            'ctwitter' => 'https://twitter.com/ComiGuadiana',
            'cinstagram' => '',
            'user_id' => 9,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Papín',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/profile.php?id=100008660042403&fref=ts',
            'ctwitter' => 'https://twitter.com/ComissioPapin',
            'cinstagram' => '',
            'user_id' => 10,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Santa Cecilia',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/comissiosantacecilia/?fref=ts',
            'ctwitter' => '',
            'cinstagram' => '',
            'user_id' => 11,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Sagunt',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/Comissi%C3%B3-de-Festes-del-Carrer-Sagunt-414115295318414/?ref=ts&fref=ts&qsefr=1',
            'ctwitter' => 'https://twitter.com/ComissioSagunt',
            'cinstagram' => '',
            'user_id' => 12,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Robrenyo',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => '',
            'ctwitter' => '',
            'cinstagram' => '',
            'user_id' => 13,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Rossend Arús',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/RossendArus/?fref=ts',
            'ctwitter' => 'https://twitter.com/RossendArus',
            'cinstagram' => '',
            'user_id' => 14,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Valladolid',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/ComissioDeFestesDelCarrerValladolidSants/?fref=ts',
            'ctwitter' => '',
            'cinstagram' => '',
            'user_id' => 15,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Vallespir',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/FMVallespir/?fref=ts',
            'ctwitter' => '',
            'cinstagram' => '',
            'user_id' => 16,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Vallespir de Baix',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => '',
            'ctwitter' => '',
            'cinstagram' => '',
            'user_id' => 17,
        ]);
        DB::table('carrers')->insert(['cnom' => 'Masnou',
            'cany_inici' => '1999',
            'cdescripcio' => $faker->words(500, true),
            'cfacebook' => 'https://www.facebook.com/comissiofestamajor.masnoupremia/?fref=ts',
            'ctwitter' => '',
            'cinstagram' => '',
            'user_id' => 18,
        ]);
    }
}
