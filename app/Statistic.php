<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;

class Statistic extends Model
{
    protected $table = 'statistics';

    protected $fillable = [
        'points',
        'goals_for',
        'goals_against',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Update teams statistic according to match result.
     *
     * @param array $data
     * @return bool
     */
    public static function calculateStatistic(array $data)
    {
        $homeTeamStat = self::getStatisticByTeamId($data['home_team_id']);
        $awayTeamStat = self::getStatisticByTeamId($data['away_team_id']);

        if ($data['home_team_score'] > $data['away_team_score']) {
            $homeTeamStat->points = $homeTeamStat->points + 3;

            $homeTeamStat->goals_for = $homeTeamStat->goals_for + $data['home_team_score'];
            $homeTeamStat->goals_against = $homeTeamStat->goals_against + $data['away_team_score'];
            $awayTeamStat->goals_for = $awayTeamStat->goals_for + $data['away_team_score'];
            $awayTeamStat->goals_against = $awayTeamStat->goals_against + $data['home_team_score'];
        } else if ($data['home_team_score'] < $data['away_team_score']) {
            $awayTeamStat->points = $awayTeamStat->points + 3;

            $homeTeamStat->goals_for = $homeTeamStat->goals_for + $data['home_team_score'];
            $homeTeamStat->goals_against = $homeTeamStat->goals_against + $data['away_team_score'];
            $awayTeamStat->goals_for = $awayTeamStat->goals_for + $data['away_team_score'];
            $awayTeamStat->goals_against = $awayTeamStat->goals_against + $data['home_team_score'];
        } else if ($data['home_team_score'] == $data['away_team_score']) {
            $homeTeamStat->points = $homeTeamStat->points + 1;
            $awayTeamStat->points = $awayTeamStat->points + 1;

            $homeTeamStat->goals_for = $homeTeamStat->goals_for + $data['home_team_score'];
            $homeTeamStat->goals_against = $homeTeamStat->goals_against + $data['away_team_score'];
            $awayTeamStat->goals_for = $awayTeamStat->goals_for + $data['away_team_score'];
            $awayTeamStat->goals_against = $awayTeamStat->goals_against + $data['home_team_score'];
        } else {
            return false;
        }

        $homeTeamStat->save();
        $awayTeamStat->save();

        return true;
    }

    private static function getStatisticByTeamId($id)
    {
        return Statistic::findOrFail($id);
    }

}
