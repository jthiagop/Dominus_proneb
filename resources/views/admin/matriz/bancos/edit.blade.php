@extends('admin.layout.app')

@section('title', 'Cadastro de Banco')

@section('header')
    @include('admin.layout.header')
@endsection

@section('lateral')
    @include('admin.layout.lateral')
@endsection


@section('content')

    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                                Add Banco
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('Lbancos.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <form action="{{ route('Lbancos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf()
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Dados do Banco</div>
                            <div class="card-body">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1">Nome do banco</label>
                                        <input class="form-control" name="nome" value="{{ old('nome') }}"
                                            id="nome" required title="Nome do Lançamento" type="text"
                                            placeholder="Banco" value="" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small mb-1">Nº da Agência</label>
                                        <input class="form-control" name="agencia" value="{{ old('agencia') }}"
                                            id="agencia" required title="Nome do Lançamento" type="text"
                                            placeholder="Agência" value="" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small mb-1">Nº da Conta</label>
                                        <input class="form-control" name="conta" value="{{ old('conta') }}"
                                            id="conta" required title="Nome do Lançamento" type="text"
                                            placeholder="Conta" value="" />
                                    </div>
                                    <!-- Form Group (last name)-->

                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-3">
                                        <label class="small mb-1">Dígito da Conta</label>
                                        <input class="form-control" name="dconta" value="{{ old('dconta') }}"
                                            id="dconta" required title="Nome do Lançamento" type="text"
                                            placeholder="Conta" value="" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small mb-1">Tipo</label>
                                        <select class="form-select" name="tipo" required
                                            aria-label="Default select example">
                                            <option selected="" disabled="">Tipo de Conta:</option>
                                            <option value="Poupança">Poupança</option>
                                            <option value="corrente">Conta Corrente</option>
                                            <option value="Aplicação">Aplicação</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-13">
                                        <label class="small mb-1">Descrição</label>
                                        <textarea class="form-control" id="descricao" name="descricao" rows="3"
                                            placeholder="Breve descrição do Lançamento"></textarea>
                                    </div>
                                </div>

                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Salvar Banco</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2"></div>

                </div>
            </form>
        </div>
    </main>

@section('footer')
    @include('admin.layout.footer')
@endsection
@endsection
