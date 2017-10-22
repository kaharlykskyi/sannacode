@extends('layouts.layout')

@section('content')
    <h2 class="mt-3">League table</h2>
    <hr>
    <table id="table" class="table table-hover table-sm">
        <thead>
            <tr>
                <th class="text-center">Team <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
                <th class="text-center">Goals for<i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
                <th class="text-center">Goals against <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
                <th class="text-center">Points <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <td class="text-center">{{ $team->name }}</td>
                    <td class="text-center">{{ $team->statistic['goals_for'] }}</td>
                    <td class="text-center">{{ $team->statistic['goals_against'] }}</td>
                    <td class="text-center">{{ $team->statistic['points'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table><hr>
    <div class="actions">
        <a href="{{ route('match.index') }}" class="btn btn-success hover ml-2 btn-sm">Finished matches</a>
        <a href="{{ route('upcoming.index') }}" class="btn btn-success hover btn-sm">Upcoming matches</a>
    </div>
@endsection