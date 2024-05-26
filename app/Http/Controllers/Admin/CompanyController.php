<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {

        $company['getRecord'] = DB::table('companies')
            ->join('addresses', 'addresses.company_id', '=', 'companies.id')
            ->select('companies.*', 'addresses.*')
            ->get();

        return view('admin.matriz.company.list', $company);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $address = Address::all();
        return view('admin.matriz.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Company $company, Address $address)
    {
        $data = $request->all();
        $company = $company->all();

        $data['natureza'] = 'Matriz';

        $company = Company::create($data);  // Cria uma nova Company e retorna a instância criada

        $data['company_id'] = $company->id;  // Adiciona o id da Company ao array de dados

        $address = Address::create($data);  // Cria um novo Address com o subsidiary_id definido

        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //data e hora
        $dataAtual = Carbon::now();
        $diaDaSemanaPorExtenso = $dataAtual->format('l');
        $dataPorExtenso = $dataAtual->format('d \d\e F \d\e Y');
        $hora = $dataAtual->format('H:i');

        //Company::where('id','=', $id)->first();
        if (!$company['getRecord'] = Company::find($id)) {
            return back();
        }



        return view('user.dashboard', $company, compact('dataPorExtenso', 'hora', 'diaDaSemanaPorExtenso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company, string $id)
    {
        if (!$company['getRecord'] = $company->where('id', $id)->first()) {
            return back();
        }

        return view('admin.matriz.company.edit', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Company $company, Request $request, string $id)
    {
        if (!$company = $company->find($id)) {
            return back();
        }

        $company->update($request->all());
        $company->address->update($request->all());


        //dd($company);

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, string $id)
    {
        if (!$company = $company->find($id)) {
            return back();
        }

        $company->delete();

        return redirect()->route('company.index');
    }
}
