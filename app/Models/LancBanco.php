<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LancBanco extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'subsidiary_id',
        'data',
        'tipo',
        'lp',
        'tipo_documento',
        'num_documento',
        'valor',
        'arquivo',
        'origem',
        'banco',
        'userName',
        'complemento',

    ];


    static public function getBancoContas()
    {

        $userId = auth()->user()->id; // Recupere o ID do usuário logado

        $entradas = DB::table('lanc_bancos')
            ->join('subsidiary_user', 'lanc_bancos.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('lanc_bancos.tipo', 'entrada') // Filtra apenas as entradas
            ->select('lanc_bancos.*') // Selecione apenas a coluna 'origem' da tabela 'caixa'
            ->get();

        $somaEntradas = $entradas->sum('valor'); //soma os valores de entrada



        $saida = DB::table('lanc_bancos')
            ->join('subsidiary_user', 'lanc_bancos.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('lanc_bancos.tipo', 'saida') // Filtra apenas as entradas
            ->select('lanc_bancos.*') // Selecione apenas a coluna 'origem' da tabela 'caixa'
            ->get();

        $somaSaida = $saida->sum('valor'); //soma os valores de entrada


        $nomeBanco = DB::table('lanc_bancos')
            ->join('subsidiary_user', 'lanc_bancos.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('lanc_bancos.tipo', 'saida') // Filtra apenas as entradas
            ->where('lanc_bancos.origem', 'BAC') // Adiciona filtro para 'CAX'
            ->select('lanc_bancos.origem') // Selecione apenas a coluna 'origem' da tabela 'caixa'
            ->get();

        return ([$somaEntradas, $somaSaida, $nomeBanco]); // Retorna o valor para o controlador

    }

    static public function getBanco()
    {

        $userId = auth()->user()->id; // Recupere o ID do usuário logado

        $entradas = DB::table('lanc_bancos')
            ->join('subsidiary_user', 'lanc_bancos.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('lanc_bancos.tipo', 'entrada') // Filtra apenas as entradas
            ->select('lanc_bancos.*') // Selecione todas as colunas da tabela 'caixa'
            ->get();

        $somaEntradas = $entradas->sum('valor'); //soma os valores de entrada

        $saida = DB::table('lanc_bancos')
            ->join('subsidiary_user', 'lanc_bancos.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('lanc_bancos.tipo', 'saida') // Filtra apenas as entradas
            ->select('lanc_bancos.*') // Selecione todas as colunas da tabela 'caixa'
            ->get();

        $somaSaida = $saida->sum('valor'); //soma os valores de entrada

        return ([$somaEntradas, $somaSaida]); // Retorna o valor para o controlador


    }


    static public function getcompany()
    {
        // Recupere o usuário logado
        $user = auth()->user();

        // Filtrar os usuários pelo usuário logado
        $company['getcompany'] = DB::table('users')
            ->join('subsidiary_user', 'users.id', '=', 'subsidiary_user.user_id')
            ->join('subsidiaries', 'subsidiary_user.subsidiary_id', '=', 'subsidiaries.id')
            ->where('users.id', $user->id) // Filtra pelo usuário logado
            ->select('users.*', 'subsidiary_user.subsidiary_id', 'subsidiaries.name as subsidiaries_name')
            ->get();

        return $company;
    }

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }
}
