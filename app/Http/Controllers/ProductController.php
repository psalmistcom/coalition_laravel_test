<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest('id')->get();
        // return view('index', ProductResource::collection($products));
        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd($request);

        $data = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        if ($data->fails()) {
            return response()->json(['error' => $data->errors()]);
        }

        $data['total'] = $request->price * $request->quantity;

        Product::create($data);
        return response()->json(['success', 'Product Data succesfully submitted']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
