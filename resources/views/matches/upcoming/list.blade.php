@extends('layouts.layout')

@section('content')
    <h2 class="mt-3">Upcoming matches</h2>
    <hr>
    <table id="matches" class="table table-hover table-sm mt-2">
        <thead>
            <tr>
                <th class="text-center">Home team <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
                <th class="text-center">Away team <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
                <th class="text-center">Date <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($matches as $match)
            <tr>
                <td class="text-center">{{ $match['home_team'] }}</td>
                <td class="text-center">{{ $match['away_team'] }}</td>
                <td class="text-center">{{ $match['date'] }}</td>
                <td class="text-center">
                    <div class="row">
                        <div class="col-md-1 offset-md-3">
                            <a href="{{ route('upcoming.edit', $match['id']) }}" class="btn btn-warning btn-sm hover mr-2">Edit</a>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('upcoming.destroy', $match['id']) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm hover">Delete</button>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('upcoming.add-score', $match['id']) }}" class="btn btn-success btn-sm hover mr-2">Add score</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <a href="{{ route('upcoming.create') }}" class="btn btn-success hover">Add upcoming match</a>
@endsection