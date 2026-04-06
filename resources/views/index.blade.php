@extends('laravel-usp-theme::master')

@section("content")
    <div class="container">
        
        <h1 class="display-6">Portarias, Regimentos e Normas - FFLCH</h1>
        
        <div class="records_block">
            @foreach($portarias as $portaria)
            <div class="records_item">
                <h3 class="records_title"><a href="/portarias/{{$portaria->id}}">{{$portaria->title}}</a></h3>
            </div>
            @endforeach
        </div>
    </div>
@endsection("content")