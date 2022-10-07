<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class JogosController extends Controller
{
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;

        $jogos = Jogo::where(function ($query) use ($pesquisar) {

            if ($pesquisar) {
                $query->where('descricao', 'like', "%{$pesquisar}%");
            }})->paginate(5);

        return view('jogo.index')->with(compact('jogos'));
    }

    public function create()
    {
        $jogo = null;
        return view('jogo.form')->with(compact('jogo'));
    }

    public function store(Request $request)
    {
        $jogo = new Jogo();
        $jogo->fill($request->all());

        $jogo->save();
        return redirect()->route('jogo.index');
    }

    public function show(int $id)
    {
        $jogo = Jogo::find($id);
        return view('jogo.show')->with(compact('jogo'));
    }

    public function edit(int $id)
    {
        $jogo = Jogo::find($id);
        return view('jogo.form')->with(compact('jogo'));
    }

    public function update(Request $request, int $id)
    {
        $jogo = Jogo::find($id);
        $jogo->fill($request->all());

        $jogo->save();

        return redirect()->route('jogo.index')->with('success', 'atualizado com sucesso.');
    }

    public function destroy(int $id)
    {
        $jogo = Jogo::find($id);
        $jogo->delete();

        return redirect()->route('jogo.index');
    }
}
