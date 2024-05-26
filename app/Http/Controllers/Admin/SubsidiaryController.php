<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Subsidiary;
use Illuminate\Http\Request;

class SubsidiaryController extends Controller
{
    public function list(Subsidiary $subsidiary)
    {
        $subsidiary['getRecord'] = $subsidiary->all();

        return view('superadmin.matriz.subsidiary.list', $subsidiary);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Subsidiary $subsidiary)
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.matriz.subsidiary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Subsidiary $subsidiary)
    {
        $data = $request->all();
        $subsidiary = $subsidiary->all();

        $data['natureza'] = 'Filial';

        $subsidiary = Subsidiary::create($data);  // Cria uma nova Company e retorna a instância criada

        $data['subsidiary_id'] = $subsidiary->id;  // Adiciona o id da Company ao array de dados

        $address = Address::create($data);  // Cria um novo Address com o subsidiary_id definido

        return redirect()->route('subsidiary.list');
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
    public function edit(Subsidiary $subsidiary, string $id)
    {
        if (!$subsidiary['getRecord'] = $subsidiary->where('id', $id)->first()) {
            return back();
        }

        return view('superadmin.matriz.subsidiary.edit', $subsidiary);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Subsidiary $subsidiary, Request $request, string $id)
    {
        if (!$subsidiary = $subsidiary->find($id)) {
            return back();
        }

        request()->validate([
            'cnpj' => 'required|unique:subsidiaries,cnpj,'.$id
        ]);

        $subsidiary->update($request->all());
        $subsidiary->address->update($request->all());


        //dd($company);

        return redirect()->route('subsidiary.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
