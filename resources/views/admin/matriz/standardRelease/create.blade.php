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
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                                Add Lançamento Padrão
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{route('standard.list')}}">
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
            <form action="{{ route('standard.store')}}" method="POST" enctype="multipart/form-data">
                @csrf()
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Informações do Lançamento</div>
                            <div class="card-body">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-8">
                                        <label class="small mb-1">Nome</label>
                                        <input class="form-control" name="name" value="{{old('name')}}" id="name" required title="Nome do Lançamento"
                                            type="text" placeholder="Nome do Lançamento" value="" />
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1">Tipo</label>
                                        <select class="form-select" name="tipo" required aria-label="Default select example">
                                            <option selected="" disabled="">Tipo de Lançamento:</option>
                                            <option value="entrada">Entrada</option>
                                            <option value="saida">Saída</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-13">
                                        <label class="small mb-1">Descrição</label>
                                        <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Breve descrição do Lançamento"></textarea>
                                    </div>
                                </div>

                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Add Lançamento</button>
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
