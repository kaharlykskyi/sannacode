<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreUpcomingMatchRequest, UpdateUpcomingMatchRequest, AddScoreRequest};
use App\{Team, Match, Statistic};
use Carbon\Carbon;

class UpcomingMatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Match $match
     * @return \Illuminate\Http\Response
     */
    public function index(Match $match)
    {
        $matchInfo = [];
        foreach ($match->getAllUpcomingMatches() as $match) {
            $matchInfo[] = [
                'id' => $match->id,
                'home_team' => Team::getTeamNameById($match->home_team_id),
                'away_team' => Team::getTeamNameById($match->away_team_id),
                'date' => date('j F Y G:i', strtotime($match->date)),
            ];
        }

        return view('matches.upcoming.list', ['matches' => $matchInfo]);
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
        return view('matches.upcoming.create', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUpcomingMatchRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpcomingMatchRequest $request)
    {
        $data = $request->all();
        Match::saveMatch($data);

        return redirect()->route('upcoming.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect()->route('upcoming.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Match $matchModel
     * @param Team $team
     * @param  int  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $matchModel, Team $team, $match)
    {
        $match = $matchModel->getMatchById($match);
        $date = new Carbon($match->date);
        $match->date = Carbon::parse($date)->format('Y-m-d\TH:i:s');

        return view('matches.upcoming.edit', [
            'match' => $match,
            'teams' => $team->getAllTeams(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUpcomingMatchRequest $request
     * @param  Match $matchModel
     * @param  int  $matchId
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUpcomingMatchRequest $request, Match $matchModel, $matchId)
    {
        $data = $request->all();
        $matchModel->updateMatch($matchId, $data);

        return redirect()->route('upcoming.index');
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

        return redirect()->route('upcoming.index');
    }

    /**
     * Show the form for adding the score.
     *
     * @param Match $matchModel
     * @param Team $team
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showScore(Match $matchModel, Team $team, $id)
    {
        $match = $matchModel->getMatchById($id);
        $match->date = date('j F Y G:i', strtotime($match->date));
        $teams = $team->getTeamsByIds($match->home_team_id, $match->away_team_id);

        return view('matches.upcoming.add-score', [
            'match' => $match,
            'teams' => $teams,
        ]);
    }

    /**
     * Update the score in statistic model.
     *
     * @param AddScoreRequest $request
     * @param Match $matchModel
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateScore(AddScoreRequest $request, Match $matchModel, $id)
    {
        $data = $request->all();
        if($matchModel->addScore($id, $data)) {
            if(Statistic::calculateStatistic($data))
                return redirect()->route('upcoming.index');
        };
    }
}
