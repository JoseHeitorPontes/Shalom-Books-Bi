@extends('layout.main')

@section('body')
    <div class="w-100 d-flex justify-content-center">
        <form class="w-50" method="POST" action="{{ route('clientes.store') }}">
            @csrf

            <h3>Novo cliente</h3>

            <div class="fom-group mb-2">
                <label class="form-label fw-semibold">Nome:</label>
                <input name="name" class="form-control" />
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">CPF:</label>
                <input name="identifier" class="form-control" maxlength="13" />
            </div>

            <div class="fom-group mb-2">
                <label class="form-label fw-semibold">Email:</label>
                <input name="email" type="email" class="form-control" maxlength="13" />
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">Telefone:</label>
                <input name="phone" class="form-control" />
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">Data de nascimento:</label>
                <input name="birthdate" type="date" class="form-control" />
            </div>

            <div class="form-group mb-4">
                <label class="form-label fw-semibold">Gênero:</label>

                <select class="form-select">
                    <option>Selecione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
