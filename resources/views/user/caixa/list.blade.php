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
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="filter"></i></div>
                                Caixa da Fraternidade
                            </h1>
                            <div class="page-header-subtitle">Busca de movimentação de caixa</div>
                        </div>
                        <nav class="mt-4 rounded" aria-label="breadcrumb">
                            <ol class="breadcrumb px-3 py-2 rounded mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.caixa.index') }}">Caixa</a></li>
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
            <div class="card mb-4">
                <div class="card-header">Extended DataTables</div>
                <div class="card-body">
                    <table  style="overflow-x:auto;" id="datatablesSimple">
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
                            @foreach ($caixas as $caixa )
                            <tr>
                                <td>{{$caixa->id}}</td>
                                <td>{{date(' d-m-Y', strtotime($caixa->data))}}</td>
                                <td>{{$caixa->tipo_documento}}</td>
                                <td>{{$caixa->num_documento}}</td>
                                <td>
                                    @if($caixa->tipo == 'entrada')
                                    <span class="badge badge-orange"></span>
                                    <div class="badge bg-success text-white rounded-pill">Entrada</div>
                                @elseif($caixa->tipo == 'saida')
                                <div class="badge bg-danger text-white rounded-pill">Saída</div>

                                @endif

                                </td>
                                <td>R$ {{ number_format($caixa->valor, 2, ',', '.') }}</td>
                                <td>{{$caixa->complemento}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="{{route('user.caixa.edit', $caixa->id)}}"><i class="fa-regular fa-edit"></i></a>
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
            <form action="{{ isset($caixa) ? route('user.caixa.destroy', $caixa->id) : '#' }}" method="post">
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
