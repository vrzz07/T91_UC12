@extends ('layouts.base')

@section('conteudo')
    <h1>Jogos -
        <a href="{{ route('jogo.create') }}" class="btn btn-dark">Novo</a>
    </h1>

    <h2>
        Total de Jogos: {{ $jogos->count() }}
    </h2>

    {{-- Formulario de pesquisa --}}
    <form action="{{ route('jogo.index') }}" method="get">
        {{-- @csrf --}}
        <input type="text" name="pesquisar" id="pesquisar" value="{{ old('pesquisar') }}"
            placeholder="Digite o termo a ser pesquisado...">

        <input type="submit" value="Pesquisar">
    </form>
    {{-- /Formulario de pesquisa --}}

    <table class="table table-striped table-border">
        <thead>
            <tr>
                <th>
                    Ações
                </th>
                <th>
                    ID
                </th>

                <th>
                    Descrição
                </th>
                <th>
                    Nome
                </th>

                <th>
                    Imagem
                </th>
                <th>
                    Desenvolvedora
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jogos as $jogo)
                <tr>
                    <td>
                        <a href="{{ route('jogo.edit', ['id' => $jogo->id_jogo]) }}"
                            class="btn btn-success">Editar</a>
                    </td>
                    <td>
                        {{ $jogo->id_jogo }}
                    </td>
                    <td>
                        {{ $jogo->descricao }}
                    </td>
                    <td>
                        {{ $jogo->nome }}
                    </td>
                    <td>
                        {{ $jogo->capa }}
                    </td>
                    <td>
                        {{ $jogo->desenvolvedora }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Paginação --}}
    <div>
        {{ $jogos->appends(
            [
            'pesquisar' => request()->get('pesquisar', '')
            ])
        ->links() }}
    </div>
@endsection
