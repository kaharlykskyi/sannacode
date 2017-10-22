<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class MatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matches')->insert([
            0 => [
                'home_team_id' => 1,
                'away_team_id' => 2,
                'score' => '2:0',
                'date' => '2017-10-20 21:45:00',
            ],
            1 => [
                'home_team_id' => 3,
                'away_team_id' => 4,
                'score' => '2:0',
                'date' => '2017-10-19 20:30:00',
            ],
            2 => [
                'home_team_id' => 5,
                'away_team_id' => 6,
                'score' => '0:2',
                'date' => '2017-10-20 21:45:00',
            ],
            3 => [
                'home_team_id' => 7,
                'away_team_id' => 8,
                'score' => '0:0',
                'date' => '2017-10-21 20:45:00',
            ],
            4 => [
                'home_team_id' => 9,
                'away_team_id' => 10,
                'score' => '1:1',
                'date' => '2017-10-19 21:30:00',
            ],
            5 => [
                'home_team_id' => 11,
                'away_team_id' => 12,
                'score' => '2:0',
                'date' => '2017-10-20 21:45:00',
            ],
            6 => [
                'home_team_id' => 13,
                'away_team_id' => 14,
                'score' => null,
                'date' => '2017-10-19 20:30:00',
            ],
            7 => [
                'home_team_id' => 15,
                'away_team_id' => 16,
                'score' => null,
                'date' => '2017-10-20 21:45:00',
            ],
            8 => [
                'home_team_id' => 17,
                'away_team_id' => 18,
                'score' => null,
                'date' => '2017-10-21 20:45:00',
            ],
            9 => [
                'home_team_id' => 19,
                'away_team_id' => 20,
                'score' => null,
                'date' => '2017-10-19 21:30:00',
            ],
        ]);
    }
}
