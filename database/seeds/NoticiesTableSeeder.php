<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;


class NoticiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 500; $i++) {
            DB::table('noticies')->insert([
                'ntitol' => $faker->words(3, true),
                'ndesc' => $faker->words(600, true),
                'nactiu' => $faker->boolean(),
                'carrer_id' => $faker->numberBetween(1, 18),
                'user_id' => $faker->numberBetween(1, 18),
                'foto_id' => $faker->numberBetween(1,5),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
