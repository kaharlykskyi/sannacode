<?php

use Illuminate\Database\Seeder;

class StatisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statistics')->insert([
            0 => [
                'points' => 3,
                'goals_for' => 2,
                'goals_against' => 0,
                'team_id' => 1,
            ],
            1 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 2,
                'team_id' => 2,
            ],
            2 => [
                'points' => 3,
                'goals_for' => 2,
                'goals_against' => 0,
                'team_id' => 3,
            ],
            3 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 2,
                'team_id' => 4,
            ],
            4 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 2,
                'team_id' => 5,
            ],
            5 => [
                'points' => 3,
                'goals_for' => 2,
                'goals_against' => 0,
                'team_id' => 6,
            ],
            6 => [
                'points' => 1,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 7,
            ],
            7 => [
                'points' => 1,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 8,
            ],
            8 => [
                'points' => 1,
                'goals_for' => 1,
                'goals_against' => 1,
                'team_id' => 9,
            ],
            9 => [
                'points' => 1,
                'goals_for' => 1,
                'goals_against' => 1,
                'team_id' => 10,
            ],
            10 => [
                'points' => 3,
                'goals_for' => 2,
                'goals_against' => 0,
                'team_id' => 11,
            ],
            11 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 2,
                'team_id' => 12,
            ],
            12 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 13,
            ],
            13 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 14,
            ],
            14 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 15,
            ],
            15 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 16,
            ],
            16 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 17,
            ],
            17 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 18,
            ],
            18 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 19,
            ],
            19 => [
                'points' => 0,
                'goals_for' => 0,
                'goals_against' => 0,
                'team_id' => 20,
            ],
        ]);
    }
}
