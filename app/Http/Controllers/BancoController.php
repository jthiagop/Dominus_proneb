<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use App\Models\caixa;
use App\Models\StandardRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BancoController extends Controller
{
    public function list(Banco $bancos)
    {

        $caixas = Banco::getBanco();

        return view('user.banco.list', compact('caixas'));
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


        $valor = Banco::getBancoContas();

        list($somaEntradas, $somaSaida) = Banco::getBancoContas();

        $valor = $somaEntradas - $somaSaida;

        $standardRelease['getRecord'] = $standardRelease->all();
        $banco = $banco->getBanco();

        return view('user.banco.index', $standardRelease, $company)->with(['valor' => $valor, 'banco' => $banco]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.bancos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $subsidiaryId = DB::table('users')
            ->join('subsidiary_user', 'users.id', '=', 'subsidiary_user.user_id')
            ->join('subsidiaries', 'subsidiary_user.subsidiary_id', '=', 'subsidiaries.id')
            ->where('users.id', $user->id) // Filtra pelo usuário logado
            ->select('subsidiary_user.subsidiary_id')
            ->first();

            $banco = Banco::create([
                'subsidiary_id' => $subsidiaryId->subsidiary_id,
                'nome' => $request->nome,
                'conta' => $request->conta,
                'agencia' => $request->agencia,
                'dconta' => $request->dconta,
                'tipo' => $request->tipo,
                'origem' => 'BAC',
                'banco' => $request->banco,
                'descricao' => $request->descricao,
            ]);

        return redirect()->route('user.banco.list')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
