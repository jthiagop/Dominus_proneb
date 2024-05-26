<?php

namespace App\Http\Controllers;

use App\Models\Subsidiary;
use App\Models\Subsidiary_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Lista de Administradores';
        return view('superadmin.admin.list', $data);
    }

    public function add(Subsidiary $subsidiary)
    {
        $subsidiary = $subsidiary->all();
        $data['header_title'] = 'Novo Administrador';
        return view('superadmin.admin.add', compact('subsidiary'));
    }

public function insert(Request $request)
{
    $data = $request->all(); //Busca tudo que vem do Request

    request()->validate([
        'email' => 'required|email|unique:users,email'
    ]);

    $user = User::create($data);
    $user->subsidiaries()->attach($request->subsidiary_id);

        return redirect('superadmin/admin/list')->with('success', 'Super Administrador Cadastrado com Sucesso!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.dashboard');
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
    public function edit(string $id, Subsidiary $subsidiary)
    {
        $subsidiary = $subsidiary->all();
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = 'Editar Administrador';
            return view('superadmin.admin.edit', $data, compact('subsidiary'));
        }
        else {
            abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('superadmin/admin/list')->with('success', 'Super Administrador Atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
