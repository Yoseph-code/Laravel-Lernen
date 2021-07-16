<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $product = new Product([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        $product->save();

        return response()->json([
            'name' => 'Product created!'
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        Product::create($request->all());
        return response()->json([
            'name' => 'Product created!'
        ]);;
    }

    public function edit($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return response()->json([
            'name' => 'Product updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'name' => 'Product deleted!'
        ]);
    }
}
