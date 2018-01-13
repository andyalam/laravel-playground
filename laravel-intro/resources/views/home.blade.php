@extends('layouts.master')

@section('content')
    <div class="center">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum cupiditate dolores esse iusto maiores nesciunt saepe similique temporibus, vero. Accusamus architecto at consectetur cumque, eius omnis similique soluta temporibus voluptates.
        </p>
        <ul>
            @for($i = 0; $i < 5; $i++)
                @if($i % 2 === 0)
                    <li>Iteration {{ $i + 1 }}</li>
                @endif
            @endfor
        </ul>
    </div>
@endsection