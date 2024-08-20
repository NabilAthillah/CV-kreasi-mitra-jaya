<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
        /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    /**
* create
*
* @return void
*/
public function create()
{
    return view('admin.about.create');
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
        'vision'     => 'required',
        'mission'     => 'required',
        'short_company_description'     => 'required',
        'long_company_description'     => 'required'
    ]);

    $about = About::create([
        'vision'     => $request->vision,
        'mission'     => $request->mission,
        'short_company_description'     => $request->short_company_description,
        'long_company_description'     => $request->long_company_description,
    ]);

    if($about){
        return redirect()->route('about.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        return redirect()->route('about.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

/**
* edit
*
* @param  mixed $about
* @return void
*/
public function edit(About $about)
{
    return view('admin.about.edit', compact('about'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $about
* @return void
*/
public function update(Request $request, About $about)
{
    $this->validate($request, [
        'vision'     => 'required',
        'mission'     => 'required',
        'short_company_description'     => 'required',
        'long_company_description'     => 'required'
    ]);

    $about = About::findOrFail($about->id);

    $about->update([
            'vision'     => $request->vision,
            'mission'     => $request->mission,
            'short_company_description'     => $request->short_company_description,
            'long_company_description'     => $request->long_company_description
    ]);

    if($about){
        return redirect()->route('about.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        return redirect()->route('about.index')->with(['error' => 'Data Gagal Diupdate!']);
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
  $about = About::findOrFail($id);
  $about->delete();

  if($about){
     return redirect()->route('about.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    return redirect()->route('about.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
}
