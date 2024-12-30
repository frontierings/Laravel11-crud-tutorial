<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('user')->get();
        return view('product.index')
                ->with('products',$products);
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
        //dd($request);
        $p = new Product;
        $p->user_id = auth()->user()->id;
        $p->name = $request->name;
        $p->description = $request->description;
        $p->price = $request->price;
        $p->stock = $request->stock;

        $path = $request->photo->store('product','public');
        $p->photo = $path;

        $p->save();
        return redirect()->route('product.index');
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
        $p = Product::find($id);
        return view('product.edit')
                ->with('product',$p);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $p = Product::find($id);
        $p->name = $request->name;
        $p->description = $request->description;
        $p->price = $request->price;
        $p->stock = $request->stock;

        if($request->photo){
            $path = $request->photo->store('product','public');
            $p->photo = $path;
        }
        $p->save();

        return redirect()->route('product.edit',$id)
                ->with('message','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(auth()->user()->id == Product::find($id)->user_id){
            Product::destroy($id);

            // $p = Product::find($id);
            // $p->delete();
            return redirect()->route('product.index')
                ->with('message','Deleted successfuly.');
        }
        
        return redirect()->route('product.index')
        ->with('message','You cannot delete this product.');
        
    }
}
