<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;  // Use singular form
use App\Models\Categories;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Products::with('category')->where('is_deleted', false)->get();
        $orders=Products::all();
        
        return view('application', compact('orders'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
           
            'order_name' => 'required|unique:products,product_name',
            'order_type' => 'required|exists:categories,category_id',

        ]);
        
        $validated['category_id'] = $request->category;
}
}
