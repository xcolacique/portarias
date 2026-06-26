@extends('laravel-usp-theme::master')

@section('content')
    <div class="container mt-4" style="min-height: 70vh;">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Nova Portaria</h5>
                <a href="{{ route('portarias.index') }}" class="btn btn-secondary btn-sm">
                    Voltar
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('portarias.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Tipo --}}
                    <div class="mb-3">
                        <label class="form-label">Tipo de Portaria</label>
                        <select name="tipo" id="tipo" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="A">Tipo A — Eleição CCP</option>
                            <option value="B">Tipo B — Comissões</option>
                            <option value="C">Tipo C — Designação</option>
                            <option value="D">Tipo D — Administrativa</option>
                        </select>
                    </div>

                    {{-- Título --}}
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>

                    {{-- Upload --}}
                    <div class="mb-3">
                        <label class="form-label">Documento (.docx)</label>
                        <input type="file" name="arquivo" class="form-control" accept=".docx" required>
                    </div>

                    {{-- =========================
                        CAMPOS DINÂMICOS
                    ========================== --}}

                    {{-- Tipo A --}}
                    <div id="tipoA" class="tipo-group d-none">
                        <hr>
                        <h6>Dados da Eleição (CCP)</h6>

                        <div class="mb-2">
                            <input type="text" name="programa" class="form-control" placeholder="Nome do Programa">
                        </div>

                        <div class="mb-2">
                            <input type="email" name="email_inscricao" class="form-control" placeholder="Email para inscrição">
                        </div>

                        <div class="mb-2">
                            <input type="text" name="responsavel_votacao" class="form-control" placeholder="Responsável pelo envio do link">
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="date" name="data_inicio" class="form-control">
                            </div>
                            <div class="col">
                                <input type="date" name="data_fim" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- Tipo B --}}
                    <div id="tipoB" class="tipo-group d-none">
                        <hr>
                        <h6>Eleição de Comissão</h6>

                        <div class="mb-2">
                            <input type="text" name="comissao" class="form-control" placeholder="Nome da Comissão">
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="date" name="inscricao_inicio" class="form-control">
                            </div>
                            <div class="col">
                                <input type="date" name="inscricao_fim" class="form-control">
                            </div>
                        </div>

                        <div class="mt-2">
                            <input type="text" name="colegio_eleitoral" class="form-control" placeholder="Colégio eleitoral">
                        </div>
                    </div>

                    {{-- Tipo C --}}
                    <div id="tipoC" class="tipo-group d-none">
                        <hr>
                        <h6>Designação de Membros</h6>

                        <div class="mb-2">
                            <textarea name="membros" class="form-control" rows="3" placeholder="Lista de membros titulares"></textarea>
                        </div>

                        <div class="mb-2">
                            <textarea name="suplentes" class="form-control" rows="3" placeholder="Lista de suplentes"></textarea>
                        </div>
                    </div>

                    {{-- Tipo D --}}
                    <div id="tipoD" class="tipo-group d-none">
                        <hr>
                        <h6>Portaria Administrativa</h6>

                        <div class="mb-2">
                            <textarea name="descricao" class="form-control" rows="3" placeholder="Descrição ou conteúdo"></textarea>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary">
                            Salvar Portaria
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Script simples --}}
    <script>
        const tipoSelect = document.getElementById('tipo');
        const grupos = document.querySelectorAll('.tipo-group');

        tipoSelect.addEventListener('change', function () {
            grupos.forEach(g => g.classList.add('d-none'));

            if (this.value) {
                document.getElementById('tipo' + this.value).classList.remove('d-none');
            }
        });
    </script>

@endsection

