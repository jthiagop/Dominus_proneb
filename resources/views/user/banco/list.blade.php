@extends('layout.app')

@section('title', 'Registros')

@section('header')
    @include('layout.header')
@endsection

@section('lateral')
    @include('layout.lateral')
@endsection

@section('content')
    <main>
        <header class="page-header page-header-dark bg-gray-800 pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="filter"></i></div>
                                Banco da Fraternidade
                            </h1>
                            <div class="page-header-subtitle">Busca de movimentação de Bancos</div>
                        </div>
                        <nav class="mt-4 rounded" aria-label="breadcrumb">
                            <ol class="breadcrumb px-3 py-2 rounded mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.banco.index') }}">Banco</a></li>
                                <li class="breadcrumb-item active">Lista de Registros</li>
                            </ol>
                        </nav>
                        <hr class="mt-0 mb-4" />
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-teal">
                        <div class="card-body">
                            <div class="small text-muted">Entradas do mês atual</div>
                            <div class="h3">R$ {{ number_format($entrada, 2, ',', '.') }}</div>
                            <a class="text-arrow-icon small text-teal" href="#!">
                                Ver histórico de entradas
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 2-->
                    <div class="card h-100 border-start-lg border-start-danger">
                        <div class="card-body">
                            <div class="small text-muted">Saídas do mês atual</div>
                            <div class="h3">R$ {{ number_format($saida, 2, ',', '.') }}</div>
                            <a class="text-arrow-icon small text-danger" href="#!">
                                Ver histórico de saídas
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Saldo total</div>
                            <div class="h3 d-flex align-items-center">R$ {{ number_format($valor, 2, ',', '.') }}</div>
                            <a class="text-arrow-icon small text-success" href="#!">
                                Ver detalhes do saldo
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">Extended DataTables</div>
                <div class="card-body">
                    <table  id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nº do Lançamento</th>
                                <th>Data</th>
                                <th>Tipo de Docuemnto</th>
                                <th>Documento</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Complemento Histórico</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nº do Lançamento</th>
                                <th>Data</th>
                                <th>Tipo de Docuemnto</th>
                                <th>Documento</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Complemento Histórico</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($lancBanco as $banco )
                            <tr>
                                <td>{{$banco->id}}</td>
                                <td>{{$banco->data}}</td>
                                <td>{{$banco->tipo_documento}}</td>
                                <td>{{$banco->num_documento}}</td>
                                <td>
                                    @if($banco->tipo == 'entrada')
                                    <span class="badge badge-orange"></span>
                                    <div class="badge bg-success text-white rounded-pill">Entrada</div>
                                @elseif($banco->tipo == 'saida')
                                <div class="badge bg-danger text-white rounded-pill">Saída</div>

                                @endif

                                </td>
                                <td>R$ {{ number_format($banco->valor, 2, ',', '.') }}</td>
                                <td>{{$banco->complemento}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="{{route('user.banco.edit', $banco->id)}}"><i class="fa-regular fa-edit"></i></a>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" id="dropdownNoAnimation" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownNoAnimation">
                                            <a class="dropdown-item" href="#!"><i class="fa-regular fa-eye px-1"></i>Exibir</a>
                                            <a class="dropdown-item" data-bs-toggle="modal" href="#staticBackdrop" data-bs-target="#staticBackdrop"><i class="fa-regular fa-trash-can px-1"></i> Excluir</a>
                                        </div>
                                    </div>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-danger">
            <form action="{{ isset($banco) ? route('user.banco.destroy', $banco->id) : '#' }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body modal-center">
                        <h3 class="text-danger mb-5">
                            <i class="fa fa-exclamation-triangle"></i> ATENÇÂO
                        </h3>
                        <p>
                            Você está preste a excluir uma lançamento! Deseja realmente excluir este registro?
                        </p>

                        <small>
                            <div id="mensagem-excluir"></div>
                        </small>

                        <input type="hidden" class="form-control" name="id-excluir" id="id-excluir" value="97">
                    </div>
                    <div class="modal-footer"><button class="btn btn-success" type="button" data-bs-dismiss="modal">Não</button><button class="btn btn-danger" type='submit'>Sim</button></div>
                </form>
            </div>
        </div>
    </div>
