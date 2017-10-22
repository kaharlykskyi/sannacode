<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TableController extends Controller
{
    public function index(Team $team)
    {
        $teams = $team->getAllTeams();
        return view('table.teams', ['teams' => $teams]);
    }
}
