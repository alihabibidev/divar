@extends("layouts.app")
@section("content")
@foreach($posters as $poster)
    <style>
        .ali{
            background-color: rebeccapurple;
            margin: 20px 0;
            text-align: center;
            color: white;
        }
    </style>
    <div class="ali">
        {{ $poster->title }}
    </div>


@endforeach

@endsection
