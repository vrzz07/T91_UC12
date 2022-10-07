@extends ('layouts.base')

@section('conteudo')
    <h1>Jogos -
        <a href="{{ route('jogo.create') }}" class="btn btn-dark">Novo</a>
    </h1>

    <h2>
        Total de Jogos: {{ $jogos->count() }}
    </h2>

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
                    Desenvolvedora
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jogos as $jogo)
                <tr>
                    <td>
                        <a href="{{ route('jogo.edit', ['id' => $jogo->id_jogo]) }}" class="btn btn-success">Editar</a>
                        <a href="{{ route('jogo.show', ['id' => $jogo->id_jogo]) }}" class="btn btn-warning">Ver</a>
                        <a href="{{ route('jogo.destroy', ['id' => $jogo->id_jogo]) }}" class="btn btn-danger">Excluir</a>
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
                        {{ $jogo->desenvolvedora }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Paginação --}}
    <div>
        {{ $jogos->appends([
                'pesquisar' => request()->get('pesquisar', ''),
            ])->links() }}
    </div>
@endsection
