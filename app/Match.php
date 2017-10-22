<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;
use \Carbon\Carbon;
use Illuminate\Support\Collection;
use DB;

class Match extends Model
{
    protected $table = 'matches';

    protected $fillable = [
        'home_team_id',
        'away_team_id',
        'date',
        'score'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function getAllFinishedMatches()
    {
        return DB::table('matches')->whereNotNull('score')->get();
    }

    public function getAllUpcomingMatches()
    {
        return DB::table('matches')->whereNull('score')->get();
    }

    public function getMatchById(int $id)
    {
        return Match::findOrFail($id);
    }

    /**
     * Save match model.
     *
     * @param array $data
     * @return bool
     */
    public static function saveMatch(array $data): bool
    {
        $match = new Match();

        $match->home_team_id = $data['home_team_id'];
        $match->away_team_id = $data['away_team_id'];
        $match->date = Carbon::parse($data['date'])->toDateTimeString();
        $match->score = isset($data['home_team_score']) ? $data['home_team_score'].':'.$data['away_team_score'] : NULL;

        return $match->save();
    }

    /**
     * Update match model.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateMatch(int $id, array $data): bool
    {
        $match = $this->getMatchById($id);

        $match->home_team_id = $data['home_team_id'];
        $match->away_team_id = $data['away_team_id'];
        $match->date = Carbon::parse($data['date'])->toDateTimeString();
        $match->score = isset($data['home_team_score']) ? $data['home_team_score'].':'.$data['away_team_score'] : NULL;

        return $match->save();
    }

    /**
     * @param $score
     * @return array
     */
    public function parseScore($score): array
    {
        return explode(':', $score);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function addScore(int $id, array $data): bool
    {
        $match = $this->getMatchById($id);
        $match->score = $data['home_team_score'].':'.$data['away_team_score'];

        return $match->save();
    }
}
