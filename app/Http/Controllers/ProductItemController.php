<?php

namespace App\Http\Controllers;

use App\Models\ProductItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductItemController extends Controller
{
    //
    public function index()
    {
        // Database Pagination
        $products = ProductItem::query()
            ->orderBy('name')
            ->paginate(10)
            ->through(function ($product) {
                // $product->product_category_name = $product->productCategory->name ?? '';
                // return $product;
                // Append the custom attribute
                return $product->append('product_category_name');
            })
            ->withQueryString();

        return Inertia::render('Products/Items/Index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return Inertia::render('Products/Items/Create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        return Inertia::render('Products/Items/Show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return Inertia::render('Products/Items/Edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {

    }

    public function destroy(Product $product)
    {

    }

}
