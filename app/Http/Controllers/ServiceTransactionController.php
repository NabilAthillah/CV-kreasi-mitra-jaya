<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\ServiceTransaction;

class ServiceTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        if (Auth::check()) {
            $auth = Auth::user();
            return view('serviceTransaction', compact('services', 'auth'));
        }else{
            return view('welcome');
        }
    }

    public function adminIndex(){
        $serviceTransactions = ServiceTransaction::all();

        return view('admin.serviceTransaction', compact('serviceTransactions'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'phone_number'     => 'required',
            'address'   => 'required',
            'service'   => 'required'
        ]);
    
        $serviceTransaction = ServiceTransaction::create([
            'phone_number'     => $request->phone_number,
            'address'   => $request->address,
            'user_id' => auth()->id(),
            'service_id' => $request->service,
        ]);
    
        if($serviceTransaction){
            return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('serviceTransaction.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
