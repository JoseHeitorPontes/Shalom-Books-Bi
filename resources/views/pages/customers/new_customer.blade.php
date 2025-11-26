@extends('layout.main')

@section('body')
    <div class="w-100 d-flex justify-content-center">
        <form class="w-50" method="POST" action="{{ route('clientes.store') }}">
            @csrf

            <h3>Novo cliente</h3>

            <div class="fom-group mb-2">
                <label class="form-label fw-semibold">Nome:</label>
                <input name="name" class="form-control" placeholder="Nome do cliente" />

                @foreach ($errors->get('name') as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">CPF:</label>
                <input name="identifier" class="form-control" maxlength="13" placeholder="0000000000000" />

                @foreach ($errors->get('identifier') as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            </div>

            <div class="fom-group mb-2">
                <label class="form-label fw-semibold">Email:</label>
                <input name="email" type="email" class="form-control" placeholder="Email do cliente" />

                @foreach ($errors->get('email') as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">Telefone:</label>
                <input name="phone" class="form-control" placeholder="00000000000" />

                @foreach ($errors->get('phone') as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">Data de nascimento:</label>
                <input name="birthdate" type="date" class="form-control" />

                @foreach ($errors->get('birthdate') as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            </div>

            <div class="form-group mb-4">
                <label class="form-label fw-semibold">Gênero:</label>

                <select name="gender" class="form-select">
                    <option value="" selected>Selecione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                </select>

                @foreach ($errors->get('gender') as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
