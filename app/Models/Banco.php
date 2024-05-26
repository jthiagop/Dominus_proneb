<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banco extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'subsidiary_id',
        'nome',
        'conta',
        'agencia',
        'dconta',
        'tipo',
        'origem',
        'descricao',

    ];

    static function getBanco()
    {
        $userId = auth()->user()->id; // Recupere o ID do usuário logado

        $bancos = DB::table('bancos')
            ->join('subsidiaries', 'bancos.subsidiary_id', '=', 'subsidiaries.id')
            ->join('subsidiary_user', 'subsidiaries.id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->select('bancos.*') // Selecione todas as colunas da tabela 'banks'
            ->get();

            //dd($bancos);

        return $bancos;
    }

    static public function getBancoContas()
    {

        $userId = auth()->user()->id; // Recupere o ID do usuário logado

        $entradas = DB::table('caixas')
            ->join('subsidiary_user', 'caixas.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('caixas.tipo', 'entrada') // Filtra apenas as entradas
            ->where('caixas.origem', 'BAC') // Adiciona filtro para 'CAX'
            ->select('caixas.origem') // Selecione apenas a coluna 'origem' da tabela 'caixa'
            ->get();

        $somaEntradas = $entradas->sum('valor'); //soma os valores de entrada

        $saida = DB::table('caixas')
            ->join('subsidiary_user', 'caixas.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('caixas.tipo', 'saida') // Filtra apenas as entradas
            ->where('caixas.origem', 'BAC') // Adiciona filtro para 'CAX'
            ->select('caixas.origem') // Selecione apenas a coluna 'origem' da tabela 'caixa'
            ->get();

        $somaSaida = $saida->sum('valor'); //soma os valores de entrada


        $nomeBanco = DB::table('caixas')
            ->join('subsidiary_user', 'caixas.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
            ->where('subsidiary_user.user_id', $userId)
            ->where('caixas.tipo', 'saida') // Filtra apenas as entradas
            ->where('caixas.origem', 'BAC') // Adiciona filtro para 'CAX'
            ->select('caixas.origem') // Selecione apenas a coluna 'origem' da tabela 'caixa'
            ->get();

        return ([$somaEntradas, $somaSaida, $nomeBanco]); // Retorna o valor para o controlador

    }

    static public function nomeBanco()
    {
        $userId = auth()->user()->id; // Recupere o ID do usuário logado

        $nomeBanco = DB::table('bancos')
        ->join('subsidiary_user', 'bancos.subsidiary_id', '=', 'subsidiary_user.subsidiary_id')
        ->where('subsidiary_user.user_id', $userId)
        ->where('bancos.tipo', 'saida') // Filtra apenas as entradas
        ->where('bancos.origem', 'BAC') // Adiciona filtro para 'CAX'
        ->select('bancos.origem') // Selecione apenas a coluna 'origem' da tabela 'caixa'
        ->get();

        //dd($nomeBanco);

        return $nomeBanco;


    }


    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }
}
