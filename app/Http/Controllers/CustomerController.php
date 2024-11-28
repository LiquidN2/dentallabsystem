<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('Customers/Index', [
            'customers' => Customer::latest()->paginate(20),
        ]);
    }
}
