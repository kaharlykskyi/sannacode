<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            0 => [
                'name' => 'Man City',
            ],
            1 => [
                'name' => 'Man Utd',
            ],
            2 => [
                'name' => 'Spurs',
            ],
            3 => [
                'name' => 'Watford',
            ],
            4 => [
                'name' => 'Chelsea',
            ],
            5 => [
                'name' => 'Arsenal',
            ],
            6 => [
                'name' => 'Burnley',
            ],
            7 => [
                'name' => 'Liverpool',
            ],
            8 => [
                'name' => 'Newcastle',
            ],
            9 => [
                'name' => 'Brighton',
            ],
            10 => [
                'name' => 'West Brom',
            ],
            11 => [
                'name' => 'Southampton',
            ],
            12 => [
                'name' => 'Huddersfield',
            ],
            13 => [
                'name' => 'Swansea',
            ],
            14 => [
                'name' => 'Everton',
            ],
            15 => [
                'name' => 'Stoke City',
            ],
            16 => [
                'name' => 'West Ham',
            ],
            17 => [
                'name' => 'Leicester City',
            ],
            18 => [
                'name' => 'Bournemouth',
            ],
            19 => [
                'name' => 'Crystal Palace',
            ],
        ]);
    }
}
