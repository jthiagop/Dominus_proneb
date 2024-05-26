<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use App\Models\caixa;
use App\Models\LancBanco;
use App\Models\StandardRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LancBancoController extends Controller
{
    public function list(LancBanco $lancBanco)
    {
        $user = auth()->user();

        $lancBanco = $lancBanco->orderBy('id', 'desc')->get();

        // Filtrar os usuários pelo usuário logado
        $lancBanco = DB::table('users')
            ->join('subsidiary_user', 'users.id', '=', 'subsidiary_user.user_id')
            ->join('subsidiaries', 'subsidiary_user.subsidiary_id', '=', 'subsidiaries.id')
            ->join('lanc_bancos', 'subsidiaries.id', '=', 'lanc_bancos.subsidiary_id') // Junta a tabela caixa
            ->where('users.id', $user->id) // Filtra pelo usuário logado
            ->select('lanc_bancos.*') // Seleciona apenas o campo valor da tabela caixa
            ->get();


        return view('user.banco.list', compact('lancBanco'));
    }

    public function index(StandardRelease $standardRelease, Banco $banco)
    {
        // Recupere o usuário logado
        $user = auth()->user();

        $userId = Auth::id(); // ou qualquer outro método que você usa para obter o id do usuário

        // Filtrar os usuários pelo usuário logado
        $company['getcompany'] = DB::table('users')
            ->join('subsidiary_user', 'users.id', '=', 'subsidiary_user.user_id')
            ->join('subsidiaries', 'subsidiary_user.subsidiary_id', '=', 'subsidiaries.id')
            ->where('users.id', $user->id) // Filtra pelo usuário logado
            ->select('users.*', 'subsidiary_user.subsidiary_id', 'subsidiaries.name as subsidiaries_name')
            ->get();


        $valor = LancBanco::getBancoContas();

        list($somaEntradas, $somaSaida, $nomeBanco) = LancBanco::getBancoContas();

        $valor = $somaEntradas - $somaSaida;


        $standardRelease['getRecord'] = $standardRelease->all();
        $banco = $banco->getBanco();

        return view('user.banco.index', $standardRelease, $company)->with(['valor' => $valor, 'banco' => $banco]);
    }

    public function create()
    {
        return view('user.banco.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $subsidiaryId = DB::table('users')
            ->join('subsidiary_user', 'users.id', '=', 'subsidiary_user.user_id')
            ->join('subsidiaries', 'subsidiary_user.subsidiary_id', '=', 'subsidiaries.id')
            ->where('users.id', $user->id) // Filtra pelo usuário logado
            ->select('subsidiary_user.subsidiary_id')
            ->first();

        $banco = LancBanco::create([
            'subsidiary_id' => $subsidiaryId->subsidiary_id,
            'data' => $request->data,
            'banco' => $request->banco,
            'tipo' => $request->tipo,
            'lp' => $request->subsidiary_id,
            'tipo_documento' => $request->tipo_documento,
            'num_documento' => $request->num_documento,
            'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
            'origem' => 'BAC',
            'userName' => $user->name, // Adiciona o nome do usuário logado
            'complemento' => $request->complemento,
        ]);


        return redirect()->route('user.banco.index')->withInput()->with('success', ' Lançamento Realizado com Sucesso!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StandardRelease $standardRelease, LancBanco $lancBanco, string $id, Banco $banco)
    {

        if (!$lancBanco = LancBanco::find($id)) {
            return back();
        }

        // Recupere o usuário logado
        $user = auth()->user();

        $userId = Auth::id(); // ou qualquer outro método que você usa para obter o id do usuário

        $company = LancBanco::getcompany();

        $valor = LancBanco::getBancoContas();

        $standardRelease = $standardRelease->all();


        list($somaEntradas, $somaSaida) = LancBanco::getBanco();

        $valor = $somaEntradas - $somaSaida;
        $banco = $banco->getBanco();



        return view('user.banco.edit', $company, compact('lancBanco', 'standardRelease'))->with(['valor' => $valor, 'banco' => $banco]);
    }



    public function update( LancBanco $lancBanco, Request $request, string $id)
    {
        if (!$lancBanco = LancBanco::find($id)) {
            return back();
        }

        $data = $request->only([
            'data',
            'banco',
            'tipo',
            'lp',
            'tipo_documento',
            'num_documento',
            'complemento',
        ]);

        $data['valor'] = str_replace(',', '.', str_replace('.', '', $request->valor));

        $lancBanco->update($data);

        return redirect()->route('user.banco.index')->with('success', ' Lançamento Atualizado com Sucesso!');;

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$caixa = LancBanco::find($id))
        {
            return back();
        }

        $caixa->delete();
        return redirect()->route('user.banco.list');

    }
}
