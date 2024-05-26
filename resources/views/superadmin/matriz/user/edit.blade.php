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
                                Editar Usuário
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{route('user.listen')}}">
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
            <form action="{{ route('user.update', $getRecord->id)}}" method="POST" enctype="multipart/form-data">
                @csrf()
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
                            <div class="card-header">Informações do Usuário</div>
                            <div class="card-body">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-8">
                                        <label class="small mb-1">Nome</label>
                                        <input class="form-control" name="name" value="{{$getRecord->name}}" id="name" required name="name" title="Nome e Sobrenome"
                                            type="text" placeholder="Nome e sobrenome" value="" />
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1">Tipo</label>
                                        <select class="form-select" name="user_type" value="{{$getRecord->user_type}} required aria-label="Default select example">
                                            <option selected="" disabled="">Tipo de Usuário:</option>
                                            <option value="0">Administrador</option>
                                            <option value="1">Frade</option>
                                            <option value="2">Usuário</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1">E-mail</label>
                                        <input class="form-control"  id="email " value="{{$getRecord->email}}"  name="email" value="email" type="email"
                                            placeholder="exemple@email.com.br" value="" required />
                                        <div style="color:red">{{ $errors->first('email')}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1">Senha</label>
                                        <input class="form-control" id="password" value="password" name="password" type="password"
                                            placeholder="*************" value="" />
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
