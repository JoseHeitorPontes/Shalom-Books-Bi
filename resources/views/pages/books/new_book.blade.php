@extends('layout.main')

@section('body')
    <div class="w-100 d-flex justify-content-center">
        <form class="w-50" method="POST" action="{{ route('livros.store') }}">
            @csrf

            <h3>Novo livro</h3>

            <div class="fom-group mb-2">
                <label class="form-label fw-semibold">Titulo:</label>
                <input name="title" class="form-control" />
            </div>

            <div class="fom-group mb-2">
                <label class="form-label fw-semibold">Descrição:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">Editora:</label>
                <input name="publisher" class="form-control" />
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">ISBN:</label>
                <input name="international_standard_book_number" class="form-control" maxlength="13" />
            </div>

            <div class="form-group mb-2">
                <label class="form-label fw-semibold">Preço de custo:</label>
                <input name="cost_price" class="form-control" />
            </div>

            <div class="form-group mb-4">
                <label class="form-label fw-semibold">Preço de venda:</label>
                <input name="sale_price" class="form-control" />
            </div>

            <div class="form-group mb-4">
                <label class="form-label fw-semibold">Imagem:</label>
                <input name="image" class="form-control" type="file" />
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
