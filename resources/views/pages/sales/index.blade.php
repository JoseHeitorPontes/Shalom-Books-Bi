@extends('layout.main')

@section('body')
    <div class="w-100 d-flex justify-content-end mb-4">
        <a class="btn btn-primary" href="{{ route('vendas.newSale') }}">Nova venda</a>
    </div>

    <table class="table table-bordered mb-4">
        <thead>
            <tr>
                <th>Nome do cliente</th>
                <th>Data da venda</th>
                <th>Forma de pagamento</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @if ($sales->count() > 0)
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->customer->name }}</td>
                        <td>{{ $sale->updated_at_formatted }}</td>
                        <td>{{ $sale->payment_method_formatted }}</td>
                        <td>{{ $sale->total }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-info" href="{{ route('vendas.viewDetails', $sale->id) }}">Ver</a>

                                <form action="{{ route('vendas.destroy', $sale->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Excluir</button>
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
        {{ $sales->links() }}
    </div>
@endsection
