<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);

        return view('pages.customers.index', [
            'customers' => $customers,
        ]);
    }

    public function store(StoreCustomerRequest $request)
    {
        $data = $request->validated();

        Customer::create($data);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function destroy(int $id)
    {
        Customer::destroy($id);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente excluido com sucesso!');
    }

    public function update(UpdateCustomerRequest $request)
    {
        $data = $request->validated();

        Customer::update($data);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente editado com sucesso!');
    }

    public function newCustomer()
    {
        return view('pages.customers.new_customer');
    }

    public function editCustomer(int $id)
    {
        $customer = Customer::findOrFail($id);

        return view('pages.customers.edit_customer', [
            'customer' => $customer,
        ]);
    }
}
