@extends('layout.app')

@section('title', 'Caixa')

@section('header')
    @include('layout.header')
@endsection

@section('lateral')
    @include('layout.lateral')
@endsection

@section('content')

    <style>
        /* Adicione estilos para a tabela aqui */
        #datatablesSimple {
            width: 100%;
            border-collapse: collapse;
        }

        #datatablesSimple th,
        #datatablesSimple td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>

    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="dollar-sign"></i></div>
                            Movimentação do Caixa
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
        @include('__massage')

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
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
                                                placeholder="Enter your first name" value="Valerie" />
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-2">
                                            <label class="small mb-1" for="inputLastName">Entrada/Saída</label>
                                            <select class="form-control" name="tipo" id="tipo">
                                                <option value="entrada">Entrada</option>
                                                <option value="saida">Saída</option>
                                            </select>
                                        </div>

                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="subsidiary">Lançamento padrão:</label>
                                            <select id="select-beast" name="lp" placeholder="Digite o que procura..."
                                                autocomplete="off">
                                                @foreach ($getRecord as $registro)
                                                    <option value="{{ $registro->name }}">{{ $registro->id }} - {{ $registro->name }} - {{ $registro->tipo }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputPhone">Tipo de Documento</label>
                                            <select class="form-control" name="tipo_documento" id="tipo_documento">
                                                <option value="OUTR - Dafe">OUTR - Dafe</option>
                                                <option value="NF - Nota Fiscal">NF - Nota Fiscal</option>
                                                <option value="DANF - Danfe">DANF - Danfe</option>
                                                <option value="BOL - Boleto">BOL - Boleto</option>
                                                <option value="REP - Repasse">REP - Repasse</option>
                                                <option value="CCRD - Cartão de Credito">CCRD - Cartão de Credito
                                                </option>
                                                <option value="CDBT - Cartào de Debito">CDBT - Cartào de Debito
                                                </option>
                                                <option value="CH - Cheque">CH - Cheque</option>
                                                <option value="REC - Recibo">REC - Recibo</option>
                                                <option value="CARN - Carnê">CARN - Carnê</option>
                                                <option value="FAT - Fatura">FAT - Fatura</option>
                                                <option value="APOL - Apólice">APOL - Apólice</option>
                                                <option value="DUPL - Duplicata">DUPL - Duplicata</option>
                                                <option value="TRIB - Tribunal">TRIB - Tribunal</option>
                                                <option value="T Banc - Transferêrencia Bancaria">T Banc -
                                                    Transferêrencia
                                                    Bancaria</option>
                                            </select>
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputBirthday">Numero Documento</label>
                                            <input class="form-control" id="num_documento" name="num_documento"
                                                type="text" name="birthday" placeholder="Entre com o número"
                                                value="" />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputBirthday">Adicionar Valor</label>

                                            <div class="input-group input-group-joined">
                                                <span class="input-group-text">R$</span>
                                                <input class="form-control ps-0" type="text" id="valor"
                                                    name="valor" required placeholder="valor" aria-label="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputLastName">Histórico
                                                complementar</label>
                                            <textarea class="form-control" name="complemento" id="complemento" cols="20" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                </div>
                                <!-- Dashboard Tab Pane 2-->
                                <div class="tab-pane fade" id="activities" role="tabpanel"
                                    aria-labelledby="activities-pill">
                                    <div class="mb-3">
                                        <h4>Adicionar Nota Fiscal</h4>
                                        <div class="input-group hdtuto control-group lst increment">
                                            <input type="file" name="fileUpdate[]" class="myfrm form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+ Add</button>
                                            </div>
                                        </div>
                                        <div class="clone d-none">
                                            <div class="hdtuto control-group lst input-group mt-2">
                                                <input type="file" name="fileUpdate[]" class="myfrm form-control">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger" type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i> Excluir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header border-bottom">
                        <!-- Dashboard card navigation-->
                        <button class="btn btn-success" type="submit"><i class="mx-1" data-feather="save"></i>Lançar</button>
                        <a class="btn btn-warning" href="{{ route('user.caixa.list') }}" role="button"><i class="mx-1" data-feather="search"></i>Buscar</a>
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
                    <a class="text-arrow-icon small" href="{{ route('user.caixa.list') }}">
                        Exibir Todos dos registros
                        <i data-feather="arrow-right"></i>
                    </a>
                    <hr />

                    <label class="small mb-1" for="inputNotificationEmail">N° lançamento</label>
                    <input class="form-control" id="inputNotificationEmail" type="email" value="name@example.com"
                        disabled />
                </div>
            </div>
        </div>
    </div>





    <script>
        $(document).ready(function() {
            $('#select_field').select2();
        });
    </script>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="file" name="fileUpdate[' + i +
                '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Deletar</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>

@section('footer')
    @include('layout.footer')
@endsection
@endsection
