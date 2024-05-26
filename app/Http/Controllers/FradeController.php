<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\caixa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Recupere o usuário logado
        $user = auth()->user();

        // Filtrar os usuários pelo usuário logado
        $company['getRecord'] = DB::table('users')
            ->join('subsidiary_user', 'users.id', '=', 'subsidiary_user.user_id')
            ->join('subsidiaries', 'subsidiary_user.subsidiary_id', '=', 'subsidiaries.id')
            ->where('users.id', $user->id) // Filtra pelo usuário logado
            ->select('users.*', 'subsidiary_user.subsidiary_id', 'subsidiaries.name as subsidiaries_name')
            ->get();

        //data e hora
        $dataAtual = Carbon::now();
        $diaDaSemanaPorExtenso = $dataAtual->format('l');
        $dataPorExtenso = $dataAtual->format('d \d\e F \d\e Y');
        $hora = $dataAtual->format('H:i');
        $data['getRecord'] = User::all();

        $valorEndrada = caixa::getCaixaEntrada();
        $valorSaida = caixa::getCaixaSaida();

        return view('frade.dashboard', array_merge($company,
        [
            'valorEndrada' => $valorEndrada,
            'valorSaida' => $valorSaida

        ], compact('dataPorExtenso', 'hora', 'diaDaSemanaPorExtenso', 'user')));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
