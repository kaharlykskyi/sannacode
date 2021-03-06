<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Statistic, Match};
use DB;
use Illuminate\Support\Collection;

class Team extends Model
{
    protected $table = 'teams';

    public function statistic()
    {
        return $this->hasOne(Statistic::class);
    }

    public function match()
    {
        return $this->hasMany(Match::class);
    }

    /**
     * Return all team models order by points.
     *
     * @return Collection
     */
    public function getAllTeams(): Collection
    {
        return Team::select(DB::raw('teams.*, statistics.*'))
            ->join('statistics', 'teams.id', '=', 'statistics.team_id')
            ->orderBy('statistics.points', 'desc')
            ->get();
    }

    /**
     * Return list of team names.
     *
     * @return array
     */
    public function getAllTeamsName(): array
    {
        return DB::table('teams')->pluck('name', 'id')->toArray();
    }

    /**
     * Returns team name by id
     *
     * @param $id
     */
    public static function getTeamNameById(int $id)
    {
        return Team::findOrFail($id)->name;
    }

    /**
     * Return team by id.
     *
     * @param $id
     */
    public static function getTeamById(int $id)
    {
        return Team::findOrFail($id);
    }

    /**
     * Returns home and away team names by id.
     *
     * @param int $homeTeamId
     * @param int $awayTeamId
     * @return array
     */
    public function getTeamsByIds(int $homeTeamId, int $awayTeamId): array
    {
        return [
            'home' => self::getTeamNameById($homeTeamId),
            'away' => self::getTeamNameById($awayTeamId),
        ];
    }
}
