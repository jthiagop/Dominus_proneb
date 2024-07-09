@extends('superadmin.layout.app')

@section('title', 'Matriz')

@section('header')
    @include('superadmin.layout.header')
@endsection

@section('lateral')
    @include('superadmin.layout.lateral')
@endsection


@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Lista de Administradores
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="#">
                            <i class="me-1" data-feather="users"></i>
                            Gerenciar Grupos
                        </a>
                        <a class="btn btn-sm btn-light text-primary" href="{{route('superadmin.add')}}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Add Admin
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
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Função</th>

                            <th>Data Criação</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Função</th>
                            <th>Data Criação</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ( $getRecord as $value )
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-2">
                                        <img class="avatar-img img-fluid"
                                        src="/assets/img/illustrations/profiles/profile-2.png" />
                                    </div>
                                    {{$value->name}}
                                </div>
                            </td>
                            <td>{{$value->email}}</td>
                            <td>{{ $value->user_type }}</td>
                            <td>{{date(' d-m-Y H:i', strtotime($value->created_at))}}</td>
                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="{{route('superadmin.edit',$value->id)}}"><i data-feather="edit"></i></a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="trash-2"></i></a>
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
@include('superadmin.layout.footer')
@endsection
@endsection
