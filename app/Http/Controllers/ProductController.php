<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$product = Product::all();
        $products = Product::latest()->paginate(5);
        return view('product.index',compact('products'));
    }
    
    public function trashedProducts()
    {
        //$product = Product::all();
        $products = Product::onlyTrashed()->latest()->paginate(5);
        return view('product.trash',compact('products'));
    }

    
    public function trashRestore($id)
    {
        //$product = Product::all();
        $products = Product::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('products.index')->with('success','product restore successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required',
        ]);

        $product = Product::create($request->all());
        return redirect()->route('products.index')
        ->with("success","added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')
        ->with("success","updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
        ->with("success","deleted successfully");
    }

    public function softDelete($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('products.index')
        ->with("success","deleted successfully");
    }  
    
    public function test($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('products.index')
        ->with("success","deleted successfully");
    } 
    
    public function  deletefromdatabase(  $id)
    {

        $pr= Product::withTrashed()->find($id);
        $pr->forceDelete();
        return redirect()->route('product.trash')
        ->with('success','product deleted successflly') ;
    }
}
