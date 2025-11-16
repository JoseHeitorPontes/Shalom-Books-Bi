@extends('layout.main')

@section('body')
    <div class="d-flex justify-content-end">
        <a class="btn btn-primary" href="livros/novo">Novo livro</a>
    </div>
    
    <div class="w-100 d-flex gap-2">
        @foreach ($books as $book)
            <div class="book-card">
                <img src="{{ asset('images/book.png') }}" class="mb-2 book-image" />

                <h4 class="mb-2">{{ $book->title }}</h4>

                <div class="mb-2 book-description">{{ $book->description }}</div>

                <div class="w-100 d-flex justify-content-center gap-2">
                    <button class="btn btn-success">Editar</button>
                    <button class="btn btn-danger">Excluir</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
