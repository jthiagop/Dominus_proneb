<?php

namespace App\Http\Controllers;

use App\Models\caixa;
use App\Models\LancBanco;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IntlDateFormatter;

class UserController extends Controller
{

    public function list()
    {
        return view('');
    }
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

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $dataAtual = Carbon::now();
        $diaDaSemanaPorExtenso = strftime('%A', strtotime('today'));
        $dataPorExtenso = $dataAtual->format('d \d\e F \d\e Y');
        $hora = $dataAtual->format('H:i');


        $valorEndrada = caixa::getCaixaEntrada();
        $valorSaida = caixa::getCaixaSaida();

        list($somaEntradas, $somaSaida) = LancBanco::getBanco();

            $valorbanco = $somaEntradas - $somaSaida;


        return view('user.dashboard', array_merge($company,
                    [
                        'valorEndrada' => $valorEndrada,
                        'valorSaida' => $valorSaida,

                        'valorbanco' => $valorbanco,
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
        $user = User::where('id', $id)->first();
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
