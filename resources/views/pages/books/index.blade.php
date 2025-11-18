@extends('layout.main')

@section('body')
    <div class="d-flex justify-content-end">
        <a class="btn btn-primary" href="livros/novo">Novo livro</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center justify-content-between">
            <span class="fw-bold">
                {{ session('success') }}
            </span>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="w-100 d-flex gap-2">
        @foreach ($books as $book)
            <div class="book-card">
                <img src="{{ asset('images/book.png') }}" class="mb-2 book-image" />

                <h4 class="mb-2">{{ $book->title }}</h4>

                <div class="mb-2 book-description">{{ $book->description }}</div>

                <div class="w-100 d-flex justify-content-center gap-2">
                    <a class="btn btn-success" href="{{ route('livros.editBook', $book->id) }}">Editar</a>

                    <form method="POST" action="{{ route('livros.destroy', $book->id) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
