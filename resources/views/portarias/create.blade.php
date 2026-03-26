@extends('laravel-usp-theme::master')

@section('content')
    <div class="container">
        <form method="POST" action="/store">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h2 class="h3">Crie uma portaria</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="title">Título:</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label for="introduction">Preâmbulo:</label>
                        <textarea class="form-control" rows="5" name="introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Conteúdo:</label>
                        <textarea class="form-control" rows="10" name="content"></textarea>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success float-right">Criar Portaria</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection('content')

