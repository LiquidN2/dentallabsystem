<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->through(function ($order) {
                $order->append('customer_name');
                $order->append('customer_code');
                $order->append('product_item_name');
                $order->append('product_item_short_name');
                $order->append('product_category_id');
                $order->append('product_category_name');
                $order->append('product_category_short_name');
                return $order;
            })
            ->withQueryString();

        return Inertia::render('Orders/Index', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
