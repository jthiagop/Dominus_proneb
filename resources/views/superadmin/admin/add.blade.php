@extends('superadmin.layout.app')

@section('title', 'Adicionar Administrador')

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
                                Editar Administrador
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('superadmin.list') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Voltar para lista
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Adicionar Foto - <i class="small font-italic text-muted">Em Breve</i></div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" src="/assets/img/demo/user-placeholder.svg"
                                alt="" />
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <button class="btn btn-primary" type="button">Upload new image</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Dados da Conta</div>
                        <div class="card-body">
                                <form action="{{route('superadmin.insert')}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputFirstName">Nome</label>
                                        <input class="form-control" id="name" name="name" type="text"
                                            placeholder="Digite o nome" required value="{{ old('name') }}" />
                                    </div>
                                    <!-- Form Group (last name)-->
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">

                                        <label class="small mb-1" for="inputEmailAddress">E-mail</label>
                                        <input class="form-control" id="email" name="email" required type="email"
                                            placeholder="Digite o e-mail" value="{{ old('email') }}" />
                                        <div style="color:rgb(171, 92, 92)">{{ $errors->first('email') }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="small mb-1">Senha</label>
                                        <input class="form-control" id="password" required name="password" type="password"
                                            placeholder="***********" value="" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="small mb-1">Função</label>
                                        <select class="form-select" name="user_type" required
                                            aria-label="Default select example">
                                            <option selected disabled>Selecione função:</option>
                                            <option value="superadmin">Super Administrador</option>
                                            <option value="admin">Administrador</option>
                                            <option value="frade">Frade</option>
                                            <option value="user">Usuário</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="small mb-1" for="subsidiary">Organismo:</label>
                                        <select class="form-select" id="subsidiary_id" name="subsidiary_id">
                                            @foreach ($subsidiary as $subsidiary)
                                                <option value="{{ $subsidiary->id }}">{{ $subsidiary->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Adicionar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@section('footer')
    @include('superadmin.layout.footer')
@endsection
@endsection
