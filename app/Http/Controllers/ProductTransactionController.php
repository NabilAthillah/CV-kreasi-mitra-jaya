<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTransaction;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $products = Product::get()->where('category_id', $id)->all();
        $categories = Category::where('id', $id)->get();

        if(Auth::check()){
            $auth = Auth::user();
            return view('productById', compact('products', 'auth', 'categories'));
        }else{
            return redirect('/login');
        }
    }

    public function adminIndex(){
        $productTransactions = ProductTransaction::all();

        return view('admin.productTransaction', compact('productTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $products = Product::get()->where('id', $id)->all();

        if(Auth::check()){
            $auth = Auth::user();
            return view('productTransaction', compact('products', 'auth'));
        }else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'proof_of_payment'     => 'required|image',
            'phone_number'     => 'required',
            'address'   => 'required',
            'product'   => 'required',
            'qty' => 'required',
            'totalPrice' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 400);
        }
    
        try {
            $image = $request->file('proof_of_payment');
            $image->storeAs('public/product_transactions', $image->hashName());
        
            $productTransaction = ProductTransaction::create([
                'proof_of_payment'     => $image->hashName(),
                'phone_number'     => $request->phone_number,
                'address'   => $request->address,
                'user_id' => auth()->id(),
                'product_id' => $request->product,
                'qty' => $request->qty,
                'totalPrice' => $request->totalPrice
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
                'data' => $productTransaction
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Disimpan!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Product::all();

        if(Auth::check()){
            $auth = Auth::user();
            return view('product', compact('products', 'auth'));
        }else{
            return redirect('/login');
        }
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
