@extends('laravel-usp-theme::master')

@section("content")
    <h1>Portarias, Regimentos e Normas - FFLCH</h1>

    <div class="records">
        @foreach($portarias as $portaria)
            <div class="records_item">
                <h3 class="records_title"><a href="/portarias/{{$portaria->id}}">{{$portaria->title}}</a></h3>
            </div>
        @endforeach
    </div>
@endsection("content")