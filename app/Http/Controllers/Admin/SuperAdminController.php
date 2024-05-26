<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                //data e hora
                $dataAtual = Carbon::now();
                $diaDaSemanaPorExtenso = $dataAtual->format('l');
                $dataPorExtenso = $dataAtual->format('d \d\e F \d\e Y');
                $hora = $dataAtual->format('H:i');
                $data['getRecord'] = User::all();

                return view('superadmin.dashboard', $data, compact('dataPorExtenso', 'hora', 'diaDaSemanaPorExtenso'));
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
