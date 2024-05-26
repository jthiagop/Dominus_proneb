<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class caixa extends Model
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
        'complemento',

    ];

    static public function getCaixa()
    {

        $userId = auth()->user()->id; // Recupere o ID do usuário logado

        $entradas = DB::table('caixas')
            ->join('subsidiary_user', 'caixas.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('caixas.tipo', 'entrada') // Filtra apenas as entradas
            ->select('caixas.*') // Selecione todas as colunas da tabela 'caixa'
            ->get();

        $somaEntradas = $entradas->sum('valor'); //soma os valores de entrada

        $saida = DB::table('caixas')
            ->join('subsidiary_user', 'caixas.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('caixas.tipo', 'saida') // Filtra apenas as entradas
            ->select('caixas.*') // Selecione todas as colunas da tabela 'caixa'
            ->get();

        $somaSaida = $saida->sum('valor'); //soma os valores de entrada

        return ([$somaEntradas, $somaSaida]); // Retorna o valor para o controlador

    }

    static public function getBanco()
    {

        $userId = auth()->user()->id; // Recupere o ID do usuário logado

        $entradas = DB::table('caixas')
            ->join('subsidiary_user', 'caixas.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('caixas.tipo', 'entrada') // Filtra apenas as entradas
            ->where('caixas.origem', 'CAX') // Adiciona filtro para 'CAX'
            ->select('caixas.origem') // Selecione apenas a coluna 'origem' da tabela 'caixa'
            ->get();

        $somaEntradas = $entradas->sum('valor'); //soma os valores de entrada

        $saida = DB::table('caixas')
            ->join('subsidiary_user', 'caixas.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('caixas.tipo', 'saida') // Filtra apenas as entradas
            ->select('caixas.*') // Selecione todas as colunas da tabela 'caixa'
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

    static public function getCaixaEntrada()
    {

        $userId = auth()->user()->id; // Recupere o ID do usuário logado

        $entradas = DB::table('caixas')
            ->join('subsidiary_user', 'caixas.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('caixas.tipo', 'entrada') // Filtra apenas as entradas
            ->select('caixas.*') // Selecione todas as colunas da tabela 'caixa'
            ->get();

        $somaEntradas = $entradas->sum('valor'); //soma os valores de entrada

        return $somaEntradas;
    }

    static public function getCaixaSaida()
    {

        $userId = auth()->user()->id; // Recupere o ID do usuário logado

        $saida = DB::table('caixas')
            ->join('subsidiary_user', 'caixas.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('caixas.tipo', 'saida') // Filtra apenas as entradas
            ->select('caixas.*') // Selecione todas as colunas da tabela 'caixa'
            ->get();

        $somaSaida = $saida->sum('valor'); //soma os valores de entrada

        return $somaSaida;
    }

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }

    public function fileupdate()
    {
        return $this->hasMany(FileUpdate::class);
    }
}
