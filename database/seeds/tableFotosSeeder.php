<?php

use Illuminate\Database\Seeder;

class tableFotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 15; $i++) {
            DB::table('fotos')->insert([
              'fpic'=>$faker->image()
            ]);
        }
    }
}
