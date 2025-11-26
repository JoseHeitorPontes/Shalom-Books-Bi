@extends('layout.main')

@section('body')
    <div class="w-100 d-flex justify-content-center">
        <form class="w-50" method="POST" action="{{ route('vendas.store') }}">
            @csrf

            <h3>Nova venda</h3>

            <div class="fom-group mb-2">
                <label class="form-label fw-semibold">Cliente:</label>
                <select name="customer_id" class="form-select">
                    <option selected>Selecione</option>

                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">Forma de pagamento:</label>

                <select name="payment_method" class="form-control">
                    <option selected>Selecione</option>
                    <option value="cash">Espécie</option>
                    <option value="debit">Débito</option>
                    <option value="credit">Crédito</option>
                    <option value="pix">Pix</option>
                </select>
            </div>

            <div class="mb-2">
                <h4>Items</h4>

                <div id="sale-items" class="d-flex flex-column gap-2 mb-2">
                    <div id="sale-item-0" class="sale-item d-flex gap-2">
                        <div class="w-50">
                            <label class="form-label fw-semibold">Livro:</label>

                            <select name="items[0][book_id]" class="form-select sale-item-book">
                                <option value="" selected>Selecione</option>
                                
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>    
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group w-25">
                            <label class="form-label fw-semibold">Quantidade:</label>

                            <input name="items[0][quantity]" type="number" class="w-100 text-center form-control sale-item-quantity" value="1" />
                        </div>
                    </div>
                </div>

                <button id="add-item-button" type="button" class="btn btn-light">Adicionar</button>
            </div>
            
            <div class="w-100 d-flex justify-content-end mb-4">
                <div class="form-group w-25">
                    <label class="form-label fw-semibold">Total:</label>

                    <input id="sale-total" name="total" type="number" class="w-100 text-center form-control" readonly />
                </div>
            </div>

            <div class="d-flex justify-content-end mb-4">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        let index = 1;
        let total = 0;

        const bookPrices = @json($books->pluck('sale_price', 'id'));

        function calculateTotal() {
            document.querySelectorAll("#sale-items .sale-item").forEach((row) => {
                const bookSelect = row.querySelector(".sale-item-book");
                const quantityInput = row.querySelector(".sale-item-quantity");

                const price = bookPrices[bookSelect.value] ?? 0;
                const quantity = parseInt(quantityInput.value) || 1;

                total += price * quantity;
            });

            document.getElementById("sale-total").value = total;
        }

        document.getElementById("add-item-button").addEventListener("click", () => {
            const saleItems = document.getElementById("sale-items");

            const newSaleItem = `
                <div id="sale-item-${index}" class="sale-item d-flex gap-2">
                    <div class="w-50">
                        <label class="form-label fw-semibold">Livro:</label>

                        <select name="items[${index}][book_id]" class="form-select sale-item-book">
                            <option value="" selected>Selecione</option>
                            
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>    
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group w-25">
                        <label class="form-label fw-semibold">Quantidade:</label>

                        <input name="items[${index}][quantity]" type="number" class="w-100 text-center form-control sale-item-quantity" value="1" />
                    </div>

                    <div class="d-flex align-items-end">
                        <button type="button" class="btn btn-light delete-sale-item" onClick="deleteSaleItem(${index})">Excluir</button>    
                    </div>
                </div>
            `;

            saleItems.innerHTML += newSaleItem;

            addEventListenersToRow(index);

            index++;
        });

        function deleteSaleItem(saleItemId) {
            document.getElementById(`sale-item-${saleItemId}`).remove();

            calculateTotal();
        }

        function addEventListenersToRow(rowId) {
            const row = document.getElementById(`sale-item-${rowId}`);

            const bookSelect = row.querySelector(".sale-item-book");
            const quantityInput = row.querySelector(".sale-item-quantity");

            bookSelect.addEventListener("change", calculateTotal);
            quantityInput.addEventListener("change", calculateTotal);
        }

        addEventListenersToRow(0);
    </script>
@endsection
    