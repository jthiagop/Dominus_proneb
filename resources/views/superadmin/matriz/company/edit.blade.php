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
                                Atualizando Matriz - {{$getRecord->name}}
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('company.index') }}">
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
            <form action="{{ route('company.update', $getRecord->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="inputLastName">CEP</label>
                                        <input class="form-control" id="inputLastName" name="cep" type="text"
                                            placeholder="Digite o CEP" value="{{$getRecord->address->cep}}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Cidade</label>
                                        <input class="form-control" id="inputLastName" name="cidade" type="text"
                                            placeholder="Digite a rua" value="{{$getRecord->address->cidade}}" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="inputLastName">UF</label>
                                            <select  class="form-control" id="uf" name="uf" name="estado">
                                                <option value="AC" {{ $getRecord->address->uf == 'AC' ? 'selected' : '' }}>Acre</option>
                                                <option value="AL" {{ $getRecord->address->uf == 'AL' ? 'selected' : '' }}>Alagoas</option>
                                                <option value="AP" {{ $getRecord->address->uf == 'AP' ? 'selected' : '' }}>Amapá</option>
                                                <option value="AM" {{ $getRecord->address->uf == 'AM' ? 'selected' : '' }}>Amazonas</option>
                                                <option value="BA" {{ $getRecord->address->uf == 'BA' ? 'selected' : '' }}>Bahia</option>
                                                <option value="CE" {{ $getRecord->address->uf == 'CE' ? 'selected' : '' }}>Ceará</option>
                                                <option value="DF" {{ $getRecord->address->uf == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                                                <option value="ES" {{ $getRecord->address->uf == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                                                <option value="GO" {{ $getRecord->address->uf == 'GO' ? 'selected' : '' }}>Goiás</option>
                                                <option value="MA" {{ $getRecord->address->uf == 'MA' ? 'selected' : '' }}>Maranhão</option>
                                                <option value="MT" {{ $getRecord->address->uf == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                                                <option value="MS" {{ $getRecord->address->uf == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                                                <option value="MG" {{ $getRecord->address->uf == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                                                <option value="PA" {{ $getRecord->address->uf == 'PA' ? 'selected' : '' }}>Pará</option>
                                                <option value="PB" {{ $getRecord->address->uf == 'PB' ? 'selected' : '' }}>Paraíba</option>
                                                <option value="PR" {{ $getRecord->address->uf == 'PR' ? 'selected' : '' }}>Paraná</option>
                                                <option value="PE" {{ $getRecord->address->uf == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                                                <option value="PI" {{ $getRecord->address->uf == 'PI' ? 'selected' : '' }}>Piauí</option>
                                                <option value="RJ" {{ $getRecord->address->uf == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                                                <option value="RN" {{ $getRecord->address->uf == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                                                <option value="RS" {{ $getRecord->address->uf == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                                                <option value="RO" {{ $getRecord->address->uf == 'RO' ? 'selected' : '' }}>Rondônia</option>
                                                <option value="RR" {{ $getRecord->address->uf == 'RR' ? 'selected' : '' }}>Roraima</option>
                                                <option value="SC" {{ $getRecord->address->uf == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                                                <option value="SP" {{ $getRecord->address->uf == 'SP' ? 'selected' : '' }}>São Paulo</option>
                                                <option value="SE" {{ $getRecord->address->uf == 'SE' ? 'selected' : '' }}>Sergipe</option>
                                                <option value="TO" {{ $getRecord->address->uf == 'TO' ? 'selected' : '' }}>Tocantins</option>
                                                <option value="EX" {{ $getRecord->address->uf == 'EX' ? 'selected' : '' }}>Estrangeiro</option>
                                            </select>
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
    @include('admin.layout.footer')
@endsection
@endsection
