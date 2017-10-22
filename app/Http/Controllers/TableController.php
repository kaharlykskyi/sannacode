<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TableController extends Controller
{
    /**
     * Show table with teams and statistic.
     *
     * @param Team $team
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Team $team)
    {
        $teams = $team->getAllTeams();
        return view('table.teams', ['teams' => $teams]);
    }
}
