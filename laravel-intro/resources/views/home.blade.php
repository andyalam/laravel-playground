@extends('layouts.master')

@section('content')
    <div class="center">
        <a href="{{ route('greet') }}">Greet</a>
        <a href="{{ route('shake') }}">Shake</a>
        <a href="{{ route('hug') }}">Hug</a>
    </div>
@endsection