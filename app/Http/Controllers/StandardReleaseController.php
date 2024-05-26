<?php

namespace App\Http\Controllers;

use App\Models\StandardRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandardReleaseController extends Controller
{

    public function list(StandardRelease $standardRelease){

        $data = $standardRelease->all();

        return view('admin.matriz.standardRelease.list', compact('data'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.matriz.standardRelease.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StandardRelease $standardRelease)
    {
        $data = $request->all();

        if (Auth::check()) {
            $usuario_id = Auth::user()->id;
            $data['user_id'] = $usuario_id;

            $standardRelease->create($data);  // Cria uma nova Company e retorna a instância criada
            return redirect('admin/matriz/standardRelease/list')->with('success', 'Lançamento Padrão Cadastrado com Sucesso!');
        }




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
