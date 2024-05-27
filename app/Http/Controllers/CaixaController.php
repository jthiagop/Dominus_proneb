<?php

namespace App\Http\Controllers;

use App\Models\caixa;
use App\Models\FileUpdate;
use App\Models\StandardRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaixaController extends Controller
{

    public function list(caixa $caixa)
    {
        $caixas = $caixa->all();

        $user = auth()->user();


        // Filtrar os usuários pelo usuário logado
        $caixas = DB::table('users')
            ->join('subsidiary_user', 'users.id', '=', 'subsidiary_user.user_id')
            ->join('subsidiaries', 'subsidiary_user.subsidiary_id', '=', 'subsidiaries.id')
            ->join('caixas', 'subsidiaries.id', '=', 'caixas.subsidiary_id') // Junta a tabela caixa
            ->where('users.id', $user->id) // Filtra pelo usuário logado
            ->select('caixas.*') // Seleciona apenas o campo valor da tabela caixa
            ->get();

            list($somaEntradas, $somaSaida) = caixa::getCaixa();

            $valor = $somaEntradas - $somaSaida;

            return view('user.caixa.list', compact('caixas'))->with(['valor' => $valor, 'saida' => $somaSaida, 'entrada' => $somaEntradas]);

    }

    public function index(StandardRelease $standardRelease, Caixa $caixa)
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


        $valor = caixa::getCaixa();

        list($somaEntradas, $somaSaida) = caixa::getCaixa();

        $valor = $somaEntradas - $somaSaida;

        $standardRelease['getRecord'] = $standardRelease->all();

        $caixa['getCaixa'] = $caixa->all();

        return view('user.caixa.index', $standardRelease, $company, $caixa)->with('valor', $valor);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.caixa.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StandardRelease $standardRelease, FileUpdate $fileUpdate)
    {
        // Recupere o usuário logado
        $user = auth()->user();
        $fileUpdate = $fileUpdate->all();


        $subsidiaryId = DB::table('users')
            ->join('subsidiary_user', 'users.id', '=', 'subsidiary_user.user_id')
            ->join('subsidiaries', 'subsidiary_user.subsidiary_id', '=', 'subsidiaries.id')
            ->where('users.id', $user->id) // Filtra pelo usuário logado
            ->select('subsidiary_user.subsidiary_id')
            ->first();

        // Filtrar os usuários pelo usuário logado
        $company['getcompany'] = DB::table('users')
            ->join('subsidiary_user', 'users.id', '=', 'subsidiary_user.user_id')
            ->join('subsidiaries', 'subsidiary_user.subsidiary_id', '=', 'subsidiaries.id')
            ->where('users.id', $user->id) // Filtra pelo usuário logado
            ->select('users.*', 'subsidiary_user.subsidiary_id', 'subsidiaries.name as subsidiaries_name')
            ->get();

            $input = $request;
            $file = $input['fileUpdate'];
            $name = $file->getClientOriginalName();
            $path = $file->store('files', 'public');

        $caixa = caixa::create([
            'subsidiary_id' => $subsidiaryId->subsidiary_id,
            'data' => $request->data,
            'tipo' => $request->tipo,
            'lp' => $request->subsidiary_id,
            'tipo_documento' => $request->tipo_documento,
            'num_documento' => $request->num_documento,
            'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
            'origem' => 'CAX',
            'complemento' => $request->complemento,
        ]);

        $data = $caixa->id;

        FileUpdate::query()->create([
            'name' => $name,
            'path' => $path,
            'subsidiary_id' => $subsidiaryId->subsidiary_id,
            'caixa_id' => $data,
            'userName' => $user->name, // Adiciona o nome do usuário logado
        ]);




        $valor = caixa::getCaixa();

        list($somaEntradas, $somaSaida) = caixa::getCaixa();

        $valor = $somaEntradas - $somaSaida;

        $standardRelease['getRecord'] = $standardRelease->all();

        return redirect()->back()->withInput()->with('valor', $valor)->with('success', ' Lançamento Realizado com Sucesso!');;
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
    public function edit(StandardRelease $standardRelease, caixa $caixa, string $id)
    {

        if(!$caixa = caixa::find($id))
            {
                return back();
            }

        $company = caixa::getcompany();

        $standardRelease = $standardRelease->all();

        list($somaEntradas, $somaSaida) = caixa::getCaixa();

        $valor = $somaEntradas - $somaSaida;

        return view('user.caixa.edit',$company, compact('caixa', 'standardRelease'))->with('valor', $valor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(caixa $caixa, FileUpdate $fileUpdate, Request $request, string $id)
    {
        if(!$caixa = $caixa->find($id))
        {
            return back();
        }

        $data = $request->only([
            'data',
            'tipo',
            'lp',
            'tipo_documento',
            'num_documento',
            'complemento',
        ]);


        $file = $request->only([
            'name',
            'path',
            'userName', // Adiciona o nome do usuário logado
        ]);

        $data['valor'] = str_replace(',', '.', str_replace('.', '', $request->valor));

        $caixa->update($data);

        $fileUpdate->update($file);

        return redirect()->route('user.caixa.list');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, FileUpdate $fileUpdate)
    {
        if(!$caixa = caixa::find($id))
        {
            return back();
        }
        $caixa->fileUpdate()->delete();

        $caixa->delete();
        return redirect()->route('user.caixa.list');

    }
}
