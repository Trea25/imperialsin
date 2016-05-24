<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('events')->insert(['etitol' => $faker->name(),
                'edata_inici' => $faker->dateTimeThisMonth(),
                'edata_final' => $faker->dateTimeThisMonth(),
                'eactiu' => $faker->boolean(),
                'tipus_id' => $faker->numberBetween(1, 19),
                'user_id' => $faker->numberBetween(1, 18),
                'carrer_id' => $faker->numberBetween(1, 18),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);

        }
    }
}
