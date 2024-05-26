@extends('admin.layout.app')

@section('title', 'Add Organismo')

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
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Lista de Organismos
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
                                <i class="me-1" data-feather="users"></i>
                                Gerenciar Grupos
                            </a>
                            <a class="btn btn-sm btn-light text-primary" href="{{route('org.create')}}">
                                <i class="me-1" data-feather="user-plus"></i>
                                Add Organismo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4 ">
            @include('__massage')
            <div class="card mb-4">
                <div class="card-header">Extended DataTables</div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Criado por</th>
                                <th>Data</th>
                                <th>Natureza</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Criado por</th>
                                <th>Data</th>
                                <th>Natureza</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($getRecord as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2"><img class="avatar-img img-fluid"
                                                    src="/assets/img/illustrations/profiles/profile-2.png" /></div>
                                                {{$record->name}}
                                        </div>
                                    </td>
                                    <td>
                                        @if($record->status == 0)

                                            Desativado
                                        @else
                                            Ativado

                                        @endif
                                    </td>
                                    <td>{{$record->create_by_name }}</td>
                                    <td>{{date(' d-m-Y H:i', strtotime($record->created_at))}}</td>
                                    <td>{{$record->natureza}}</td>
                                    <td>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                            href=""><i
                                                data-feather="eye"></i></a>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                            href="{{url('admin/matriz/org/edit/'.$record->id)}}"><i
                                                data-feather="edit"></i></a>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i
                                                data-feather="trash-2"></i></a>
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
    @include('admin.layout.footer')
@endsection
@endsection
