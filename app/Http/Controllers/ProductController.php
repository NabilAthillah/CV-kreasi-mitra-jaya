<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
        /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
* create
*
* @return void
*/
public function create()
{
    $categories = Category::all();
    return view('admin.product.create')
       ->with(['categories' => $categories]);
}


/**
* store
*
* @param  mixed $request
* @return void
*/
public function store(Request $request)
{
    $this->validate($request, [
        'image'     => 'required|image|mimes:png,jpg,jpeg',
        'name'     => 'required',
        'price'   => 'required',
        'description'   => 'required',
        'stock'   => 'required',
        'category'   => 'required'
    ]);

    $image = $request->file('image');
    $image->storeAs('public/products', $image->hashName());

    $product = Product::create([
        'image'     => $image->hashName(),
        'name'     => $request->name,
        'price'   => $request->price,
        'stock'   => $request->stock,
        'description' => $request->description,
        'category_id' => $request->category,
    ]);

    if($product){
        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        return redirect()->route('product.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

/**
* edit
*
* @param  mixed $product
* @return void
*/
public function edit(Product $product)
{
    $categories = Category::all();
    return view('admin.product.edit', compact('product', 'categories'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $product
* @return void
*/
public function update(Request $request, Product $product)
{
    $this->validate($request, [
        'name'     => 'required',
        'price'   => 'required',
        'stock'   => 'required',
        'description'   => 'required',
        'category'   => 'required'
    ]);

    $product = Product::findOrFail($product->id);

    if($request->file('image') == "") {

        $product->update([
            'name'     => $request->name,
            'price'   => $request->price,
            'stock'   => $request->stock,
            'description' => $request->description,
            'category_id' => $request->category,
        ]);

    } else {

        Storage::disk('local')->delete('public/products/'.$product->image);

        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product->update([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'price'   => $request->price,
            'stock'   => $request->stock,
            'description' => $request->description,
            'category_id' => $request->category,
        ]);

    }

    if($product){
        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        return redirect()->route('product.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}

/**
* destroy
*
* @param  mixed $id
* @return void
*/
public function destroy($id)
{
  $product = Product::findOrFail($id);
  Storage::disk('local')->delete('public/products/'.$product->image);
  $product->delete();

  if($product){
     return redirect()->route('product.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    return redirect()->route('product.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
}
