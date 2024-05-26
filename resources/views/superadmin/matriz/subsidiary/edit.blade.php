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
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                                Atualizando Organismo - {{$getRecord->name}}
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('subsidiary.list') }}">
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
            <form action="{{ route('subsidiary.update', $getRecord->id) }}" method="POST" enctype="multipart/form-data">
                @csrf()
                @method('PUT')

                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Profile Picture</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2"
                                    src="/assets/img/demo/user-placeholder.svg" alt="" />
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <!-- Profile picture upload button-->
                                <button class="btn btn-primary" type="file">Upload new image</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Detalhe do Organismo</div>

                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-body">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-8">
                                        <label class="small mb-1" for="inputFirstName">Razão Social</label>
                                        <input class="form-control" name="name" id="inputFirstName" value="{{$getRecord->name}}" title="Razão"
                                            type="text" placeholder="Digite a razão social" value="" />
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName">CNPJ</label>
                                        <input class="form-control" id="inputLastName" name="cnpj" value="{{$getRecord->cnpj}}" type="text"
                                            data-mask="999.999/00001-99" placeholder="Digite o CNPJ" value="" />
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputEmailAddress">Data do CNPJ</label>
                                        <input class="form-control" id="inputEmailAddress" name="data_cnpj"
                                            value="{{$getRecord->data_cnpj}}" type="date" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputEmailAddress">Data de Fundação</label>
                                        <input class="form-control" id="inputEmailAddress" name="data_fundacao"
                                            type="date" value="{{$getRecord->data_fundacao}}" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small mb-1">Status</label>
                                        <select class="form-select" name="status" required aria-label="Default select example">
                                            <option {{( $getRecord->status == 0) ? 'selected' : '' }} value="0">Desativado</option>
                                            <option {{( $getRecord->status == 1) ? 'selected' : '' }} value="1">Ativo</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <!-- Form de Endereço -->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName">CEP</label>
                                        <input class="form-control" id="inputLastName" name="cep" type="text"
                                            placeholder="Digite o CEP" value="{{$getRecord->address->cep}}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Cidade</label>
                                        <input class="form-control" id="inputLastName" name="cidade" type="text"
                                            placeholder="Digite a rua" value="{{$getRecord->address->cidade}}" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small mb-1" for="inputLastName">UF</label>
                                        <input class="form-control" id="inputLastName" name="uf" type="text"
                                            placeholder="Número" value="{{$getRecord->address->uf}}" />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Rua</label>
                                        <input class="form-control" id="inputLastName" name="cep" type="text"
                                            placeholder="Digite a Rua" value="{{$getRecord->address->rua}}" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small mb-1" for="inputLastName">Número</label>
                                        <input class="form-control" id="inputLastName" name="numero" type="text"
                                            placeholder="Digite o Número" value="{{$getRecord->address->numero}}" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName">Bairro</label>
                                        <input class="form-control" id="inputLastName" name="bairro" type="text"
                                            placeholder="Digite o Bairro" value="{{$getRecord->address->bairro}}" />
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName">Imagem</label>
                                        <input class="form-control" type="file" name="image" id="image" value="{{$getRecord->address->image}}"></input>
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName">Complemento</label>
                                        <textarea class="form-control" name="complemento" id="complemento" cols="20" rows="10">{{$getRecord->address->complemento}}</textarea>
                                    </div>
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Atualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

@section('footer')
    @include('superadmin.layout.footer')
@endsection
@endsection
