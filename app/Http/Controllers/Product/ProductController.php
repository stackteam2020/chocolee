<?php

namespace App\Http\Controllers\Product;

use File;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Http\Requests\Product\CreateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file_extension = $file->getClientOriginalExtension();
            $extensions_array = ['jpg', 'jpeg', 'png'];
            if (in_array($file_extension, $extensions_array)) {
                $file_name = $request->name .'.jpg';
                $file->move('uploadedImages/products/', $file_name);
                $product->image = $file_name;
            }
        }
        $product->update();

        return redirect()->route('products.index');
        // return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        if ($request->hasFile('image')) {
            File::delete(public_path('uploadedImages/products/'.$product->image));
            $file = $request->image;
            $file_extension = $file->getClientOriginalExtension();
            $extensions_array = ['jpg', 'jpeg', 'png'];
            if (in_array($file_extension, $extensions_array)) {
                $file_name = $request->name .'.jpg';
                $file->move('uploadedImages/products/', $file_name);
                $product->image = $file_name;
            }
        }
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        File::delete(public_path('uploadedImages/products/'.$product->image));
        $product->delete();
        return back();
    }
}
