@extends('admin.layout.app')

@section('title', 'Matriz')

@section('header')
    @include('admin.layout.header')
@endsection

@section('lateral')
    @include('admin.layout.lateral')
@endsection


@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="table"></i></div>
                            Cadastros de Bancos
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{ route('Lbancos.create') }}">
                            <i class="me-1" data-feather="users"></i>
                            Gerenciar Grupos
                        </a>
                        <a class="btn btn-sm btn-light text-primary" href="{{ route('Lbanco.create')}}">
                            <i class="me-1" data-feather="table"></i>
                            Add Banco
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        @include('__massage')
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Banco</th>
                            <th>Conta</th>
                            <th>Agência</th>
                            <th>Tipo</th>
                            <th>Data</th>
                            <th>Convento</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Banco</th>
                            <th>Conta</th>
                            <th>Agência</th>
                            <th>Tipo</th>
                            <th>Data</th>
                            <th>Convento</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ( $bancos as $banco )
                        <tr>
                            <td>{{$banco->id}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                            {{$banco->nome}}
                                </div>
                            </td>
                            <td>{{$banco->conta}}</td>
                            <td>{{$banco->agencia}}</td>
                            <td>{{$banco->tipo}}</td>
                            <td>{{$banco->created_at}}</td>
                            <td>{{ $banco->subsidiary->name }}</td>
                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="eye"></i></a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="{{url('admin/matriz/bancos/edit/'.$banco->id) }}"><i data-feather="edit"></i></a>
                                <a class=" btn-icon btn-danger" href="#!"><i data-feather="trash-2"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</main>


@section('footer')
@include('layout.footer')
@endsection
@endsection
