<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::orderBy('id', 'desc')->get();
        return view ('dashboard', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validation = $request->validate([
            'productname' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);
        $data = Product::create($validation);
        if ($data) {
            session()->flash('success', 'Product Added Successfully');
            return redirect(route('dashboard'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('create'));
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
        $products = Product::findOrFail($id);
        return view('product.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $products = Product::findOrFail($id);
        $productname = $request->productname;
        $category = $request->category;
        $price = $request->price;
 
        $products->productname = $productname;
        $products->category = $category;
        $products->price = $price;
        $data = $products->save();
        if ($data) {
            session()->flash('success', 'Product Updated Successfully');
            return redirect(route('dashboard'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('update'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $products = Product::findOrFail($id)->delete();
        if ($products) {
            session()->flash('success', 'Product Deleted Successfully');
            return redirect(route('dashboard'));
        } else {
            session()->flash('error', 'Product Not Delete successfully');
            return redirect(route('dashboard'));
        }
    }
}
