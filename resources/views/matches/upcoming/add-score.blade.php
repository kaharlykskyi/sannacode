@extends('layouts.layout')

@section('content')
    <div class="col-md-8 offset-md-2 mt-3">
        <h2>Add score</h2>
        <hr>
        <form action="{{ route('upcoming.update-score', $match->id) }}" role="form" method="POST">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="PUT">
            <input name="id" type="hidden" value="{{ $match->id }}">
            <input name="home_team_id" type="hidden" value="{{ $match->home_team_id }}">
            <input name="away_team_id" type="hidden" value="{{ $match->away_team_id }}">

            <h6>{{ $teams['home'] }} vs {{ $teams['away'] }} <span class="add-score-date">({{ $match->date }})</span></h6>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="number"
                                       min="0"
                                       class="form-control{{ $errors->has('home_team_score') ? ' has-error' : '' }}"
                                       name="home_team_score"
                                       placeholder="Home"
                                       value="{{ old('home_team_score') }}"
                                       required>
                            </div>
                            <span class="pt-1">:</span>
                            <div class="col-md-3">
                                <input type="number"
                                       min="0"
                                       class="form-control{{ $errors->has('away_team_score') ? ' has-error' : '' }}"
                                       name="away_team_score"
                                       placeholder="Away"
                                       value="{{ old('away_team_score') }}"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success hover">Add score</button>
            <a href="{{ route('upcoming.index') }}" class="btn btn-warning hover ml-3">Back to match list</a>
        </form>
    </div>
@endsection