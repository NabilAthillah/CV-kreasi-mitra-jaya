<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
            /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.service.index', compact('services'));
    }

    /**
* create
*
* @return void
*/
public function create()
{
    $services = Service::all();
    return view('admin.service.create')
       ->with(['services' => $services]);
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
        'description'   => 'required',
    ]);

    $image = $request->file('image');
    $image->storeAs('public/services', $image->hashName());

    $service = Service::create([
        'image'     => $image->hashName(),
        'name'     => $request->name,
        'description' => $request->description,
    ]);

    if($service){
        return redirect()->route('service.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        return redirect()->route('service.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

/**
* edit
*
* @param  mixed $service
* @return void
*/
public function edit(Service $service)
{
    return view('admin.service.edit', compact('service'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $service
* @return void
*/
public function update(Request $request, Service $service)
{
    $this->validate($request, [
        'name'     => 'required',
        'description'   => 'required',
    ]);

    $service = Service::findOrFail($service->id);

    if($request->file('image') == "") {

        $service->update([
            'name'     => $request->name,
            'description' => $request->description,
        ]);

    } else {

        Storage::disk('local')->delete('public/services/'.$service->image);

        $image = $request->file('image');
        $image->storeAs('public/services', $image->hashName());

        $service->update([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'description' => $request->description,
        ]);
    }

    if($service){
        return redirect()->route('service.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        return redirect()->route('service.index')->with(['error' => 'Data Gagal Diupdate!']);
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
  $service = Service::findOrFail($id);
  $service->delete();

  if($service){
     return redirect()->route('service.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    return redirect()->route('service.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
}
