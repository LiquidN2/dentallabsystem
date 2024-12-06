<?php

namespace App\Http\Controllers;

use App\Enums\CustomerStatus;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    //
    public function index(Request $request)
    {
        if (!$request->has('search')) {
            return Inertia::render('Customers/Index', [
                'customers' => null,
            ]);
        }

        $filters = [];
        foreach ($request->all() as $key => $value) {
            if ($key == 'page' || $key == 'search') continue;
            $filters []= [$key, 'like', "%{$value}%"];
        }

        $query = count($filters) > 0 ? Customer::where($filters) : Customer::orderByDesc('id');
        $customers = $query->paginate(20)->withQueryString();

        return Inertia::render('Customers/Index', [
            'customers' => $customers,
        ]);
    }

    public function create()
    {
        return Inertia::render('Customers/Create', [
            'customerStatuses' => CustomerStatus::getFormOptions(),
        ]);
    }

    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();

        $customer = Customer::create($validated);
        if (!$customer) {
            return back()->with('message', [
                'type'    => 'danger',
                'content' => 'Unable to create customer.'
            ]);
        }

        return redirect()->route('customers.index')->with('message', [
            'type'    => 'success',
            'content' => 'New customer has been created.'
        ]);
    }

    public function show(Customer $customer)
    {
        return Inertia::render('Customers/Show', [
            'customer' => $customer,
        ]);
    }

    public function edit(Customer $customer)
    {
        return Inertia::render('Customers/Edit', [
            'customer'         => $customer,
            'customerStatuses' => CustomerStatus::getFormOptions(),
        ]);
    }

    public function update(StoreCustomerRequest $request, Customer $customer)
    {
        $validated = $request->validated();

        if (!$customer->update($validated)) {
            return back()->with('message', [
                'type'    => 'danger',
                'content' => 'Unable to update customer.'
            ]);
        };

        return redirect("/customers/{$customer->id}")->with('message', [
            'type'    => 'success',
            'content' => 'Customer information has been updated!'
        ]);
    }

    public function destroy(Customer $customer)
    {
        if (!$customer->delete()) {
            return back()->with('message', [
                'type'    => 'danger',
                'content' => 'Unable to delete customer.'
            ]);
        };

        return redirect("/customers")->with('message', [
            'type'    => 'success',
            'content' => 'Customer has been deleted!'
        ]);
    }
}
