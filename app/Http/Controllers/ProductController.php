<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Products::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'product_description'=> 'required',
            'product_price' => 'required|integer'
        ]);
        $product = new Products([
            'product_name' => $request->get('product_name'),
            'product_description'=> $request->get('product_description'),
            'product_price'=> $request->get('product_price')
        ]);
        $product->save();
        return redirect('/products')->with('success', 'Produto Adicionado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'=>'required',
            'product_description'=> 'required',
            'product_price' => 'required|integer'
        ]);

        $product = Products::find($id);
        $product->product_name = $request->get('product_name');
        $product->product_description = $request->get('product_description');
        $product->product_price = $request->get('product_price');
        $product->save();

        return redirect('/products')->with('success', 'Produto atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Produto Excluido!');
    }
}
