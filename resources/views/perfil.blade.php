@extends('layouts.main')
@section('titulo', 'Perfil Usuário')


<link rel="stylesheet" type="text/css" href="{{ asset('css/perfil.css') }}">
@section('conteudo')
    <div class="conteudo">
        <section class="section-info-usuario">
            <div class="d-flex justify-content-center">
                <img src="img/perfil/{{ $usuario->img_perfil }}" alt="Imagem de perfil">
                <button type="button" class="icon-btn-img" data-bs-toggle="modal" data-bs-target="#editarImagemModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#447a37" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 
                        71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 
                        37.4-22.2L421.7 220.3 291.7 90.3z"/>
                    </svg>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="editarImagemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Imagem</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('usuario.editar.imagem', $usuario->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="img_perfil">Escolher Imagem</label>
                                <input type="file" name="img_perfil" id="img_perfil">
                                <div class="mt-4 d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: 10px">Fechar</button>
                                    <button type="Submit" class="btn btn-primary btn-padrao">Salvar Imagem</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container-info">
                <h4>{{ $usuario->nome }}</h4>
                <p>{{ date('d/m/Y', strtotime($usuario->data_nascimento)) }} - 23 anos</p>
            </div>
            <div class="d-flex container-biografia">
                <p>{{ $usuario->biografia }}</p>
            </div>
            <div class="d-flex container-endereco">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 15px; margin-right: 10px;">
                    <path fill="#447a37" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0
                    192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192
                    128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                </svg>
                <p>{{ $usuario->endereco->rua }}</p>
                <p>{{ $usuario->endereco->bairro }}</p>
                <p>{{ $usuario->endereco->cidade }}-{{ $usuario->endereco->estado }}</p>
            </div>
        </section>
        <section class="section-accordion-formulario">
            <hr/>
            <ul uk-accordion>
                <li class="uk-open">
                    <a class="uk-accordion-title" href>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 25px; margin-right: 10px;">
                            <path fill="#447a37" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 
                            220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 
                            74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 
                            32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                        </svg>
                        Editar Perfil
                    </a>
                    <div class="uk-accordion-content">
                        <form action="{{ route('usuario.editar', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" placeholder="Nome Completo"
                                value="{{ old('nome', $usuario->nome) }}">
                                @error('nome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 input-medio">
                                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror" id="data_nascimento" name="data_nascimento"
                                value="{{ old('data_nascimento', $usuario->data_nascimento) }}">
                                @error('data_nascimento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="biografia" class="form-label">Biografia</label>
                                <textarea class="form-control @error('biografia') is-invalid @enderror" id="biografia" name="biografia" rows="3">{{ old('biografia', $usuario->biografia) }}
                                </textarea>
                                @error('biografia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <h4>Endereço</h4>
                            <div class="mb-3">
                                <label for="rua" class="form-label">Logradouro</label>
                                <input type="text" class="form-control @error('rua') is-invalid @enderror" id="rua" name="rua"
                                value="{{ old('rua', $usuario->endereco->rua) }}">
                                @error('rua')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 input-medio">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro" name="bairro"
                                value="{{ old('bairro', $usuario->endereco->bairro) }}">
                                @error('bairro')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select class="form-control @error('estado') is-invalid @enderror" aria-label="Default select example" id="estado" name="estado">
                                        <option value="{{ $usuario->endereco->estado }}" selected>{{ $usuario->endereco->estado }}</option>
                                    </select>
                                    @error('estado')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <select class="form-control @error('cidade') is-invalid @enderror" aria-label="Default select example" id="cidade" name="cidade">
                                        <option value="{{ $usuario->endereco->cidade }}" selected>{{ $usuario->endereco->cidade }}</option>
                                    </select>
                                    @error('cidade')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="container-btn-submit">
                                <button type="submit" class="btn btn-primary btn-padrao">Editar</button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </section>
    </div>
@endsection