<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        return to_route('series.index')
            ->with(
                'mensagem.sucesso',
                "Serie '{$serie->nome}' adicionada com sucesso"
            );
    }

    public function destroy(Serie $series, Request $request)
    {
        $series->delete();

        return to_route('series.index')
            ->with(
                'mensagem.sucesso',
                "Serie '{$series->nome}' removida com sucesso"
            );
    }
}
