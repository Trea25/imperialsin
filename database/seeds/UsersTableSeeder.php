<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'Federacio',
            'email'=>'federacio@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime()]);
        DB::table('users')->insert(['name' => 'Alcolea de dalt',
            'email'=>'alcoleadedalt@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Alcolea de baix',
            'email'=>'alcoleadebaix@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Casa Gran Rosés',
            'email'=>'casagranroses@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        DB::table('users')->insert(['name' => 'Canalejas',
            'email'=>'canalejas@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        DB::table('users')->insert(['name' => 'Finlandia',
            'email'=>'1234',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'La Farga',
            'email'=>'lafarga@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Galileu',
            'email'=>'galileu@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Guadiana',
            'email'=>'guadiana@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Papín',
            'email'=>'papin@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Santa Cecilia',
            'email'=>'santacecilia@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Sagunt',
            'email'=>'sagunt@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Robrenyo',
            'email'=>'robrenyo@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Rossend Arús',
            'email'=>'rosendarus@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Valladolid',
            'email'=>'valladolid@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Vallespir',
            'email'=>'vallespir@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Vallespir de baix',
            'email'=>'vallespirdebaix@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('users')->insert(['name' => 'Masnou',
            'email'=>'masnou@festesdesants.cat',
            'password'=>Hash::make('1234'),
            'remember_token'=>'1234',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]);

    }
}
