<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
        /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
* create
*
* @return void
*/
public function create()
{
    return view('admin.category.create');
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
        'name'     => 'required'
    ]);

    $image = $request->file('image');
    $image->storeAs('public/categories', $image->hashName());

    $category = Category::create([
        'image'     => $image->hashName(),
        'name'     => $request->name
    ]);

    if($category){
        return redirect()->route('category.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        return redirect()->route('category.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

/**
* edit
*
* @param  mixed $category
* @return void
*/
public function edit(Category $category)
{
    return view('admin.category.edit', compact('category'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $category
* @return void
*/
public function update(Request $request, Category $category)
{
    $this->validate($request, [
        'name'     => 'required',
    ]);

    $category = Category::findOrFail($category->id);

    if($request->file('image') == "") {
        $category->update([
                'name'     => $request->name,
        ]);
    }else{
        Storage::disk('local')->delete('public/categories/'.$category->image);

        $image = $request->file('image');
        $image->storeAs('public/categories', $image->hashName());

        $category->update([
            'image'     => $image->hashName(),
            'name'     => $request->name,
        ]);
    }

    if($category){
        return redirect()->route('category.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        return redirect()->route('category.index')->with(['error' => 'Data Gagal Diupdate!']);
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
  $category = Category::findOrFail($id);
  Storage::disk('local')->delete('public/categories/'.$category->image);
  $category->delete();

  if($category){
     return redirect()->route('category.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    return redirect()->route('category.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
}
