@extends('layout.app')

@section('title', 'Caixa')

@section('header')
    @include('layout.header')
@endsection

@section('lateral')
    @include('layout.lateral')
@endsection

@section('content')

    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="dollar-sign"></i></div>
                            Editar Movimentação do Caixa
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <nav class="mt-4 rounded" aria-label="breadcrumb">
            <ol class="breadcrumb px-3 py-2 rounded mb-0">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Caixa</li>
            </ol>
        </nav>
        <hr class="mt-0 mb-4" />
        <form action="{{ route('user.caixa.update', $caixa->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-8">
                    <!-- Tabbed dashboard card example-->
                    <div class="card mb-4">
                        <div class="card-header border-bottom">
                            <!-- Dashboard card navigation-->
                            <ul class="nav nav-tabs card-header-tabs" id="dashboardNav" role="tablist">
                                <li class="nav-item me-1"><a class="nav-link active" id="overview-pill" href="#overview"
                                        data-bs-toggle="tab" role="tab" aria-controls="overview"
                                        aria-selected="true">Dados Gerais</a></li>
                                <li class="nav-item"><a class="nav-link" id="activities-pill" href="#activities"
                                        data-bs-toggle="tab" role="tab" aria-controls="activities"
                                        aria-selected="false">Anexar Arquivos</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="dashboardNavContent">
                                <!-- Dashboard Tab Pane 1-->
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview-pill">
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputOrgName">Centro de custo</label>
                                            <input class="form-control" disabled id="inputOrgName" type="text"
                                                value="{{ $getcompany->first()->subsidiaries_name }}" />
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">


                                        <!-- Form Group (first name)-->
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputFirstName">Data do
                                                Lançamento:</label>
                                            <input class="form-control" id="data" name="data" type="date"
                                                placeholder="Enter your first name" value="{{ $caixa->data }}" />
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-2">
                                            <label class="small mb-1" for="inputLastName">Entrada/Saída</label>
                                            <select class="form-control" name="tipo" id="tipo">
                                                <option value="entrada" {{ $caixa->tipo == 'entrada' ? 'selected' : '' }}>
                                                    Entrada</option>
                                                <option value="saida" {{ $caixa->tipo == 'saida' ? 'selected' : '' }}>Saída
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="subsidiary">Lançamento padrão:</label>
                                            <select class="form-select" id="subsidiary_id" name="subsidiary_id">
                                                @foreach ($standardRelease as $registro)
                                                    <option value="{{ $registro->id }}">{{ $registro->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputPhone">Tipo de Documento</label>
                                            <select class="form-select " name="tipo_documento" id="tipo_documento">
                                                <option value="OUTR - Dafe"
                                                    {{ $caixa->tipo_documento == 'OUTR - Dafe' ? 'selected' : '' }}>OUTR -
                                                    Dafe</option>
                                                <option value="NF - Nota Fiscal"
                                                    {{ $caixa->tipo_documento == 'NF - Nota Fiscal' ? 'selected' : '' }}>NF
                                                    - Nota Fiscal</option>
                                                <option value="DANF - Danfe"
                                                    {{ $caixa->tipo_documento == 'DANF - Danfe' ? 'selected' : '' }}>DANF -
                                                    Danfe</option>
                                                <option value="BOL - Boleto"
                                                    {{ $caixa->tipo_documento == 'BOL - Boleto' ? 'selected' : '' }}>BOL -
                                                    Boleto</option>
                                                <option value="REP - Repasse"
                                                    {{ $caixa->tipo_documento == 'REP - Repasse' ? 'selected' : '' }}>REP -
                                                    Repasse</option>
                                                <option value="CCRD - Cartão de Credito"
                                                    {{ $caixa->tipo_documento == 'CCRD - Cartão de Credito' ? 'selected' : '' }}>
                                                    CCRD - Cartão de Credito</option>
                                                <option value="CDBT - Cartào de Debito"
                                                    {{ $caixa->tipo_documento == 'CDBT - Cartào de Debito' ? 'selected' : '' }}>
                                                    CDBT - Cartào de Debito</option>
                                                <option value="CH - Cheque"
                                                    {{ $caixa->tipo_documento == 'CH - Cheque' ? 'selected' : '' }}>CH -
                                                    Cheque</option>
                                                <option value="REC - Recibo"
                                                    {{ $caixa->tipo_documento == 'REC - Recibo' ? 'selected' : '' }}>REC -
                                                    Recibo</option>
                                                <option value="CARN - Carnê"
                                                    {{ $caixa->tipo_documento == 'CARN - Carnê' ? 'selected' : '' }}>CARN -
                                                    Carnê</option>
                                                <option value="FAT - Fatura"
                                                    {{ $caixa->tipo_documento == 'FAT - Fatura' ? 'selected' : '' }}>FAT -
                                                    Fatura</option>
                                                <option value="APOL - Apólice"
                                                    {{ $caixa->tipo_documento == 'APOL - Apólice' ? 'selected' : '' }}>APOL
                                                    - Apólice</option>
                                                <option value="DUPL - Duplicata"
                                                    {{ $caixa->tipo_documento == 'DUPL - Duplicata' ? 'selected' : '' }}>
                                                    DUPL - Duplicata</option>
                                                <option value="TRIB - Tribunal"
                                                    {{ $caixa->tipo_documento == 'TRIB - Tribunal' ? 'selected' : '' }}>
                                                    TRIB - Tribunal</option>
                                                <option value="T Banc - Transferêrencia Bancaria"
                                                    {{ $caixa->tipo_documento == 'T Banc - Transferêrencia Bancaria' ? 'selected' : '' }}>
                                                    T Banc - Transferêrencia Bancaria</option>
                                            </select>
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputBirthday">Numero Documento</label>
                                            <input class="form-control" id="num_documento" name="num_documento"
                                                type="text" name="birthday" required placeholder="Entre com o número"
                                                value="{{ $caixa->num_documento }}" />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputBirthday">Adicionar Valor</label>

                                            <div class="input-group input-group-joined">
                                                <span class="input-group-text">R$</span>
                                                <input class="form-control ps-0" type="text" id="valor"
                                                    name="valor"
                                                    value=" {{ number_format($caixa->valor, 2, ',', '.') }}" required
                                                    placeholder="valor" aria-label="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputLastName">Histórico
                                                complementar</label>
                                            <textarea class="form-control" name="complemento" id="complemento" cols="20" rows="3">{{ $caixa->complemento }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                </div>
                                <!-- Dashboard Tab Pane 2-->
                                <div class="tab-pane fade" id="activities" role="tabpanel"
                                    aria-labelledby="activities-pill">
                                    <div class="mb-3">
                                        <label for="formFileLg" class="form-label">Adicionar NF</label>
                                        @if ($caixa->fileupdate->isNotEmpty())
                                            <input name="fileUpdate" class="form-control form-control-lg" id="fileUpdate" type="file" value="{{ $caixa->fileupdate->first()->path }}">
                                            <a href="{{ $caixa->fileupdate->first()->path }}">{{$caixa->fileupdate->first()->name}}</a>
                                        @else
                                            <p>Nenhum arquivo anexado.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header border-bottom">
                        <!-- Dashboard card navigation-->
                        <button class="btn btn-success mb-2" type="submit"><i class="mx-1" data-feather="save">
                            </i>Atualizar</button>
                    </div>
                </div>
        </form>
        <div class="col-lg-4">
            <!-- Notifications preferences card-->
            <div class="card">
                <div class="card-header">Informações</div>
                <div class="card-body">
                    <div class="small text-muted">Saldo em Conta</div>
                    <div class="h3">R$ {{ number_format($valor, 2, ',', '.') }}</div>
                    <a class="text-arrow-icon small" href="{{ route('caixa.list') }}">
                        Exibir Todos dos registros
                        <i data-feather="arrow-right"></i>
                    </a>
                    <hr />

                    <label class="small mb-1" for="inputNotificationEmail">N° lançamento</label>
                    <input class="form-control" id="inputNotificationEmail" type="email" value="{{ $caixa->id }}"
                        disabled />
                </div>
            </div>
        </div>
    </div>


@section('footer')
    @include('layout.footer')
@endsection
@endsection

<div class="modal fade" id="exampleModalXl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><i class="mx-1" data-feather="search">
                </i> Busca de movimento de caixa</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>
                                <div class="badge bg-primary text-white rounded-pill">Full-time</div>
                            </td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i
                                        class="fa-solid fa-ellipsis-vertical"></i></button>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark"><i
                                        class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Donna Snider</td>
                            <td>Customer Support</td>
                            <td>New York</td>
                            <td>27</td>
                            <td>2011/01/25</td>
                            <td>$112,000</td>
                            <td>
                                <div class="badge bg-secondary text-white rounded-pill">Part-time</div>
                            </td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i
                                        class="fa-solid fa-ellipsis-vertical"></i></button>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark"><i
                                        class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal-footer"><button class="btn btn-primary" type="button"
                data-bs-dismiss="modal">Close</button></div>
    </div>
</div>
</div>
