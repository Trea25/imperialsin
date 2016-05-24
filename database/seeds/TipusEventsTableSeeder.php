<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TipusEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipus_events')->insert(['tipus' => 'Altres',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Acte veinal',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Activitat Esportiva',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Apats i Gastronomia',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Concursos',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Cinema',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Dansa',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Espectacle Infantil',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Espectacle',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Exposició',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Festa Popular',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Fira',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Jocs Infantils',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Musica en Viu',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Poesia',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Taller',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Taller Infantil',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Visita',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('tipus_events')->insert(['tipus' => 'Xerrada',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
    }
}
