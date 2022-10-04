@extends('layouts.base')

@section('conteudo')
    <h1>
        @if ($jogo)
            Atualizar Jogo
        @else
            Novo Jogo
        @endif
    </h1>
    @if ($jogo)
        <form action="{{ route('jogo.update', ['id' => $jogo->id_jogo]) }}" method="post" enctype="multipart/form-data">
        @else
            <form action="{{ route('jogo.store') }}" method="post" method="post" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="row">
        <div class="form-group col-md-4">
            <label for="nome" class="form-label">Nome*</label>
            <textarea name="nome" id="nome" rows="3" class="form-control">{{ $jogo ? $jogo->nome : old('nome') }}</textarea>
        </div>
        <div class="form-group col-md-2">
            <label for="preco" class="form-label">Preço*</label>
            <input type="number" name="preco" id="preco" class="form-control" min="0" required>
        </div>
        <div class="form-group col-md-12">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" rows="3" class="form-control">{{ $jogo ? $jogo->descricao : old('descricao') }}</textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="desenvolvedora" class="form-label">Desenvolvedora</label>
            <input type="text" name="desenvolvedora" id="desenvolvedora" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <label for="btn-enviar" class="form-label">&nbsp;</label>
            <input type="submit" value="{{ $jogo ? 'Atualizar' : 'Cadastrar' }}"
                class="btn btn-primary form-control">

        </div>
    </div>
    </form>
@endsection
