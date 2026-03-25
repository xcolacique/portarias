@extends('laravel-usp-theme::master')

@section('content')
    <div class="portaria_form_block">
        <div class="col-md-12">
            <h2 class="portaria_form_title">Crie uma portaria</h2>
        </div>
        <form class="portaria_form" method="POST" action="/store">
            @csrf
            <div>
                <label class="form-label" for="title">Título:</label>
                <input class="form-control" type="text" name="title">
            </div>
            <div>
                <label for="introduction">Preâmbulo</label>
                <textarea class="form-control" name="introduction"></textarea>
            </div>
            <div>
                <label for="content">Conteúdo</label>
                <textarea class="form-control" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Criar Portaria</button>
        </form>
    </div>
@endsection('content')

