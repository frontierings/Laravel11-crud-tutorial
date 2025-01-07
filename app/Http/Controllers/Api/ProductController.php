<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::with('user')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $p = new Product;
        $p->user_id = auth()->user()->id;
        $p->name = $request->name;
        $p->description = $request->description;
        $p->price = $request->price;
        $p->stock = $request->stock;
        if($request->photo){
            $p->photo = $request->photo->store('product','public');
        }
        $p->save();

        return response()->json($p, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(auth()->user()->id == Product::find($id)->user_id){

            $p=Product::destroy($id);

            return response()->json($p, 204);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
        
    }
}
