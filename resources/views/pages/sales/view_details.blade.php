@extends('layout.main')

@section('body')
    <div class="w-100 d-flex flex-column align-items-center">
        <h4>{{ $sale->customer->name }}</h4>

        <div class="w-25 fs-5">
            <p><span class="fw-bold">Email: </span> {{ $sale->customer->email }}</p>
            <p><span class="fw-bold">Telefone: </span> {{ $sale->customer->phone }}</p>
            <p><span class="fw-bold">CPF: </span> {{ $sale->customer->identifier }}</p>
        </div>

        <h4>Items</h4>

        <div class="w-50">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Editora</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sale->items as $item)
                        <tr>
                            <td>{{ $item->book->title }}</td>
                            <td>{{ $item->book->publisher }}</td>
                            <td>{{ $item->book->sale_price }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <p><span class="fw-bold fs-5">Total:</span> R$ {{ $sale->total }}</p>
    </div>
@endsection
