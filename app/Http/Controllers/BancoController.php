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

        return view('frade.banco.list', compact('caixas'));
    }

    public function index(StandardRelease $standardRelease, Banco $banco)
    {
        $bancos = $banco->all();

        return view('admin.matriz.bancos.index', compact('bancos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('Lbanco.create');
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

        return redirect()->route('admin.matriz.bancos.list')->withInput();
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
        return redirect()->route('Lbancos.edit');
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
