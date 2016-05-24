<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TipusEventsTableSeeder::class);
        $this->call(CarrersTableSeeder::class);
        $this->call(tableFotosSeeder::class);
        $this->call(NoticiesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
    }
}
