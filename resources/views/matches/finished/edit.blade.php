@extends('layouts.layout')

@section('content')
    <div class="col-md-8 offset-md-2 mt-3">
        <h2>Edit match result</h2>
        <hr>
        <form action="{{ route('match.update', $match->id) }}" role="form" method="POST">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="PUT">
            <input name="id" type="hidden" value="{{ $match->id }}">

            <div class="form-group">
                <label for="home_team">Home team</label>
                <select class="form-control{{ $errors->has('home_team_id') ? ' has-error' : '' }}" id="home_team" name="home_team_id" required>
                    <option value=""></option>
                    @foreach($teams as $team)
                        <option {{ ($team->id == $match->home_team_id ) ? 'selected' : '' }}
                                value={{ $team->id }} >
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('home_team_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('home_team_id') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('away_team_id') ? ' has-error' : '' }}">
                <label for="away_team">Away team</label>
                <select
                        class="form-control{{ $errors->has('away_team_id') ? ' has-error' : '' }}"
                        id="away_team"
                        name="away_team_id"
                        required
                >
                    <option value=""></option>
                    @foreach($teams as $team)
                        <option {{ ($team->id == $match->away_team_id ) ? 'selected' : '' }}
                                value={{ $team->id }} >
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('away_team_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('away_team_id') }}</strong>
                    </span>
                @endif
            </div>
            <fieldset class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="date">Date and time</label>
                <input
                        type="datetime-local"
                        class="form-control{{ $errors->has('date') ? ' has-error' : '' }}"
                        id="date"
                        name="date"
                        value="{{ $match->date }}"
                        required
                >
                @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </fieldset>
            <div class="form-group">
                <label for="score">Score</label>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="number"
                                   min="0"
                                   class="form-control{{ $errors->has('home_team_score') ? ' has-error' : '' }}"
                                   name="home_team_score"
                                   placeholder="Home"
                                   value="{{ $score[0] }}"
                                   required>
                        </div>
                        <span class="pt-1">:</span>
                        <div class="col-md-3">
                            <input type="number"
                                   min="0"
                                   class="form-control{{ $errors->has('away_team_score') ? ' has-error' : '' }}"
                                   name="away_team_score"
                                   placeholder="Away"
                                   value="{{ $score[1] }}"
                                   required>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success hover">Edit result</button>
            <a href="{{ route('match.index') }}" class="btn btn-warning hover ml-3">Back to match list</a>
        </form>
    </div>
@endsection