@extends('laravel-usp-theme::master')

@section('content')
    <div class="portaria_form_block">
        <h2 class="portaria_form_title">Crie uma portaria</h2>
        <form class="portaria_form" method="POST" action="/store">
            @csrf
            <input type="text" name="title">
            <textarea name="introduction"></textarea>
            <textarea name="content"></textarea>
            <button type="submit">Criar Portaria</button>
        </form>
    </div>
@endsection('content')

