<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\Book;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('customer')->paginate(15);
        
        return view('pages.sales.index', [
            'sales' => $sales,
        ]);
    }
    
    public function store(StoreSaleRequest $request)
    {
        $data = $request->validated();

        $sale = Sale::create($data);
        $sale->items()->createMany($data['items']);
        
        return redirect()->route('vendas.index')->with('success', 'Venda cadastrada com sucesso!');
    }

    public function destroy(int $id)
    {
        Sale::destroy($id);

        return redirect()->route('vendas.index')->with('success', 'Venda excluida com sucesso!');
    }
    
    public function newSale()
    {
        $customers = Customer::all();
        $books = Book::all();
        
        return view('pages.sales.new_sale', [
            'customers' => $customers,
            'books' => $books,
        ]);
    }

    public function viewDetails(int $id)
    {
        $sale = Sale::with([
            'customer',
            'items.book',
        ])->findOrFail($id);

        return view('pages.sales.view_details', [
            'sale' => $sale,
        ]);
    }
}
