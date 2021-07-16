<?php

namespace App\Http\Controllers;

use App\Models\Catalogs;
use Illuminate\Http\Request;
use DB;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\Product;
// use App\Product;
use App\Http\Models\Catalog;

class CatalogController extends Controller
{
    public function addProduct()
    {
        return view('catalog.add-product');
    }

    public function saveProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        Catalogs::create($request->all());
        return redirect()->route('list.product');
    }

    public function listProduct()
    {
        $product = Catalogs::get();
        /*dd($product);*/
        return view('catalog.list-product', ['products' => $product]);
    }

    public function editProduct($id)
    {
        $product = Catalogs::where('id', $id)->first();
        /*dd($product);*/
        return view('catalog.edit-product', ['products' => $product]);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Catalogs::find($id);
        $product->fill($request->all());
        $product->save();
        return redirect()->route('list.product');
    }

    public function deleteProduct($id)
    {
        Catalogs::where('id', $id)->delete();
        return back();
    }

    ////////////////////////////////

    // public function index()
    // {
    //     // dd('sucess');
    //     return ProductResource::collection(Catalogs::all());
    // }

    // public function dashboard()
    // {
    //     return view('dashboard');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required', 
    //         'price' => 'required',
    //     ]);
    //     $product = new Catalogs([
    //         'name' => $request->name,
    //         'price' => $request->price,
    //     ]);
    //     $product->fill($request->all());
    //     $product->save();

    //     return response()->json([
    //         'data' => 'Sucess!'
    //     ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required', 
    //         'price' => 'required',
    //     ]);
    //     $product = Catalogs::findOrFail($id);
    //     $product->name = $request->name();
    //     $product->price = $request->price();
    //     $product->save();

    //     return response()->json([
    //         'data' => 'Sucess!'
    //     ]);
    // }

    // public function destroy($id)
    // {
    //     $product = Catalogs::findOrFail($id);
    //     $product->delete();

    //     return response()->json([
    //         'data' => 'Sucess!'
    //     ]);
    // }

    // public function edit($id)
    // {
    //     return new ProductResource(Catalogs::findOrFail($id));
    // }
}
