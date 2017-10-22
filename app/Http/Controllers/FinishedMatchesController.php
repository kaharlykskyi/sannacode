<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreFinishedMatchRequest, UpdateFinishedMatchRequest};
use App\{Match, Team, Statistic};
use Carbon\Carbon;

class FinishedMatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Match $match
     * @return \Illuminate\Http\Response
     */
    public function index(Match $match)
    {
        foreach ($match->getAllFinishedMatches() as $match) {
            $matchInfo[] = [
                'id' => $match->id,
                'home_team' => Team::getTeamNameById($match->home_team_id),
                'away_team' => Team::getTeamNameById($match->away_team_id),
                'score' => $match->score,
                'date' => date('j F Y G:i', strtotime($match->date)),
            ];
        }

        return view('matches.finished.list', ['matches' => $matchInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Team $team
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team)
    {
        $teams = $team->getAllTeams();
        return view('matches.finished.create', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFinishedMatchRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFinishedMatchRequest $request)
    {
        $data = $request->all();
        Match::saveMatch($data);
        Statistic::calculateStatistic($data);

        return redirect()->route('match.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect()->route('match.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $matchModel
     * @param  \App\Team  $team
     * @param  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $matchModel, Team $team, $match)
    {
        $match = $matchModel->getMatchById($match);
        $date = new Carbon($match->date);
        $match->date = Carbon::parse($date)->format('Y-m-d\TH:i:s');
        $score = $match->parseScore($match->score);

        return view('matches.finished.edit', [
            'match' => $match,
            'teams' => $team->getAllTeams(),
            'score' => $score,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFinishedMatchRequest $request
     * @param  \App\Match  $matchModel
     * @param $matchId
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFinishedMatchRequest $request, Match $matchModel, $matchId)
    {
        $data = $request->all();
        $matchModel->updateMatch($matchId, $data);

        return redirect()->route('match.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $matchModel
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $matchModel, $id)
    {
        $match = $matchModel->getMatchById($id);
        $match->delete();

        return redirect()->route('match.index');
    }

}
