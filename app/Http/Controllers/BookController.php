<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);

        return view('pages.books.index', [
            'books' => $books
        ]);
    }

    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();

        Book::create($data);

        return redirect()->route('livros.index')
            ->with('success', 'Livro cadastrado com sucesso!');
    }

    public function newBook()
    {
        return view('pages.books.new_book');
    }
}
