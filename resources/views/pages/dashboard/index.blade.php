@extends('layout.main')

@section('body')
    <div class="w-100 d-flex gap-4 mb-4">
        <div class="w-20 card bg-primary-subtle">
            <div class="card-body text-center">
                <h6>📚 Total de livros</h6>

                <span class="fs-4">{{ $total_books }}</span>
            </div>
        </div>

        <div class="w-20 card bg-info-subtle">
            <div class="card-body text-center">
                <h6>👥 Total de clientes</h6>

                <span class="fs-4">{{ $total_customers }}</span>
            </div>
        </div>

        <div class="w-20 card bg-secondary-subtle">
            <div class="card-body text-center">
                <h6>🛒 Total de vendas</h6>

                <span class="fs-4">{{ $total_sales }}</span>
            </div>
        </div>

        <div class="w-20 card bg-success-subtle">
            <div class="card-body text-center">
                <h6>💸 Faturamento mensal</h6>
                
                <span class="fs-4">{{ $revenue_month }}</span>
            </div>
        </div>
        
        <div class="w-20 card bg-success">
            <div class="card-body text-center">
                <h6>💰 Faturamento total</h6>

                <span class="fs-4">{{ $revenue_total }}</span>
            </div>
        </div>
    </div>

    <div class="w-100 d-flex gap-4">
        <div class="card w-50">
            <div class="card-body">
                <h4 class="mb-4">Últimas vendas</h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($latest_sales as $sale)
                            <tr>
                                <td>{{ $sale->customer->name }}</td>
                                <td>{{ $sale->updated_at_formatted }}</td>
                                <td>{{ $sale->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card w-50">
            <div class="card-body">
                <h4 class="mb-4">Clientes com mais compras</h4>

                <table class="table table-bordered">
                    <thead>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Número de compras</th>
                    </thead>

                    <tbody>
                        @foreach ($top_customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->age }}</td>
                                <td>{{ $customer->sales_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between px-5 mb-4">
        <div class="w-50">
            <h4 class="mt-5">Top 5 livros mais vendidos</h4>
            <canvas id="books-chart"></canvas>
        </div>

        <div class="w-25">
            <h4 class="mt-5">Métodos de pagamento mais utilizados</h4>
            <canvas id="payment-chart"></canvas>
        </div>
    </div>

    <div class="w-100 d-flex justify-content-center">
        <div class="w-80 px-5 mb-4">
            <h4>Faturamento mensal</h4>
            <canvas id="revenue-chart"></canvas>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.getElementById("revenue-chart"), {
                type: "line",
                data: {
                    labels: {!! json_encode($revenue_by_month->pluck('month')) !!},
                    datasets: [{
                        label: "Faturamento",
                        data: {!! json_encode($revenue_by_month->pluck('total')) !!},
                        borderWidth: 2
                    }]
                }
            });

            new Chart(document.getElementById("books-chart"), {
                type: "bar",
                data: {
                    labels: {!! json_encode($top_books->pluck('title')) !!},
                    datasets: [{
                        label: "Quantidade vendida",
                        data: {!! json_encode($top_books->pluck('total')) !!},
                        borderWidth: 2
                    }]
                }
            });

            new Chart(document.getElementById("payment-chart"), {
                type: "doughnut",
                data: {
                    labels: {!! json_encode($payment_methods->pluck('payment_method')) !!},
                    datasets: [{
                        data: {!! json_encode($payment_methods->pluck('total')) !!}
                    }]
                }
            });
        });
    </script>
@endsection
