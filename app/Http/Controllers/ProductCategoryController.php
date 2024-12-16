<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductCategoryController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('Products/Categories/Index');
    }
}
