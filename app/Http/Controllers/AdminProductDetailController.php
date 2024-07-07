<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class AdminProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(ProductRequest $productRequest)
    {
        $product = Product::where('id',$productRequest->productAllowedInputs()['productId'])->first();
        $product->details()->create([
            'color' => $productRequest->productAllowedInputs()['productColor'],
            'size' => $productRequest->productAllowedInputs()['productSize'],
            'price' => $productRequest->productAllowedInputs()['productPrice'],
        ]);

        return redirect()->route('product.edit',[$product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detail = ProductDetail::where('id',$id)->first();
        return view('admin.product.editProduct',[
            'productDetail' => $detail,
            'product' => $detail->product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $productRequest, string $id)
    {
        $detail = ProductDetail::where('id',$id)->first();
        $detail->update([
            'color' => $productRequest->productAllowedInputs()['productColor'],
            'size' => $productRequest->productAllowedInputs()['productSize'],
            'price' => $productRequest->productAllowedInputs()['productPrice'],
        ]);

        return redirect()->route('product.edit',[$detail->product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = ProductDetail::where('id',$id)->first();
        $detail->forceDelete();
        return redirect()->route('product.edit',[$detail->product]);
    }
}
