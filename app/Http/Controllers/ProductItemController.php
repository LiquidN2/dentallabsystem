<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Models\ProductCategory;
use App\Models\ProductItem;
use App\Http\Requests\Product\UpdateProductRequest;
use Inertia\Inertia;

class ProductItemController extends Controller
{
    //
    public function index()
    {
        // Database Pagination
        $products = ProductItem::query()
            ->orderBy('id')
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
        return Inertia::render('Products/Items/Create', [
            'productCategories' => ProductCategory::select('id as value', 'name as label')->get(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        //
        $validated = $request->validated();

        $productItem = ProductItem::create($validated);
        if(!$productItem) {
            return back()->with('message', [
                'type'    => 'error',
                'content' => 'Unable to create product item.',
            ]);
        }

        return redirect('/products/items')->with('message', [
           'type'    => 'success',
           'content' => 'Product item created successfully.',
        ]);
    }

    public function show(ProductItem $productItem)
    {
        return Inertia::render('Products/Items/Show', [
            'productItem' => $productItem
        ]);
    }

    public function edit(ProductItem $productItem)
    {
        return Inertia::render('Products/Items/Edit', [
            'productItem'       => $productItem,
            'productCategories' => ProductCategory::select('id as value', 'name as label')->get(),
        ]);
    }

    public function update(UpdateProductRequest $request, ProductItem $productItem)
    {
        $validated = $request->validated();

        if (!$productItem->update($validated)) {
            return back()->with('message', [
                'type'    => 'error',
                'content' => 'Unable to update product item',
            ]);
        };

        return redirect('/products/items')->with('message', [
            'type'    => 'success',
            'content' => 'Product item updated successfully',
        ]);
    }

    public function destroy(ProductItem $productItem)
    {
        if (!$productItem->delete()) {
            return back()->with('message', [
                'type'    => 'error',
                'content' => 'Unable to delete product item',
            ]);
        };

        return redirect('/products/items')->with('message', [
            'type'    => 'success',
            'content' => 'Product item deleted successfully',
        ]);
    }
}
