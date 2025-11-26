@extends('layout.main')

@section('body')
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-primary" href="clientes/novo">Novo cliente</a>
    </div>

    <table class="table table-bordered mb-4">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Data de nascimento</th>
                <th>Gênero</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @if ($customers->count() > 0)
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->identifier }}</td>
                        <td>{{ $customer->birthdate_formatted }}</td>
                        <td>{{ $customer->gender_formatted }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-info">
                                    Ver
                                </button>

                                <a class="btn btn-success" href="{{ route('clientes.editCustomer', $customer->id) }}">
                                    Editar
                                </a>

                                <form method="POST">
                                    @csrf
                                    @method("DELETE")

                                    <button type="submit" class="btn btn-danger">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="12" class="text-center text-black-50 fw-semibold">Nenhum resultado encontrado</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $customers->links() }}
    </div>
@endsection
