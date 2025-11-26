<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'total_books' => Book::count(),
            'total_customers' => Customer::count(),
            'total_sales' => Sale::count(),
            'revenue_month' => Sale::whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->sum('total'),
            'revenue_by_month' => Sale::selectRaw('MONTH(created_at) as month, SUM(total) as total')
                ->groupBy('month')
                ->orderBy('month')
                ->get(),
            'revenue_total' => Sale::sum('total'),
            'latest_sales' => Sale::with(['customer'])
                ->latest()
                ->take(10)
                ->get(),
            'top_customers' => Customer::withCount('sales')
                ->orderByDesc('sales_count')
                ->take(10)
                ->get(),
            'top_books' => DB::table('sale_items')
                ->join('books', 'sale_items.book_id', '=', 'books.id')
                ->select('books.title', DB::raw('SUM(sale_items.quantity) as total'))
                ->groupBy('books.title')
                ->orderByDesc('total')
                ->limit(5)
                ->get(),
            'payment_methods' => Sale::selectRaw('payment_method, COUNT(*) as total')
                ->groupBy('payment_method')
                ->get(),
        ]);
    }
}
