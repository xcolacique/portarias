@extends('laravel-usp-theme::master')

@section('content')
    <div class="container">
        <div class="main-container">
			<div id="editor"></div>
		</div>
        {{-- <form method="POST" action="/store">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h2 class="display-6">Crie uma portaria</h2>
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
        </form> --}}
    </div>
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "../vendor/ckeditor/ckeditor5.js",
                "ckeditor5/": "../vendor/ckeditor/"
            }
        }
    </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';

        ClassicEditor
            .create( {
                attachTo: document.querySelector( '#editor' ),
                plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                licenseKey: 'GPL',
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );
	</script>
@endsection('content')

