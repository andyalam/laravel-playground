@extends('layouts.master')

@section('content')
    <div class="centered">
        <a href="{{ route('niceaction', ['action' => 'greet']) }}">Greet</a>
        <a href="{{ route('niceaction', ['action' => 'shake']) }}">Shake</a>
        <a href="{{ route('niceaction', ['action' => 'hug']) }}">Hug</a>
        <br><br>
        <form action="{{ route('benice') }}" method="post">
            <label for="select-action">I want to...</label>
            <select name="action" id="select-action">
                <option value="greet">Greet</option>
                <option value="hug">Hug</option>
                <option value="shake">Shake</option>
            </select>
            <input type="text" name="name">
            <button type="submit">Do a nice action</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
    </div>
@endsection