<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();

        return view('adminHome', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminCreate');
    }

    public function createProcess(Request $request)
    {
        if ($files = $request->file('img_path')) {
            $destinationPath = 'public/images/';
            $file = $request->file('img_path');
            // upload path         
            $profileImage = rand(1000, 20000) . "." .
                $files->getClientOriginalExtension();
            $pathImg = $file->storeAs('images', $profileImage);
            $files->move($destinationPath, $profileImage);
        }


        $products = new Products();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->stock = $request->stock;
        $products->img_path = $pathImg;
        $products->save();

        return redirect(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);

        return view('adminUpdate', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if ($files = $request->file('img_path')) {
            $destinationPath = 'public/images/';
            $file = $request->file('img_path');
            // upload path         
            $profileImage = rand(1000, 20000) . "." .
                $files->getClientOriginalExtension();
            $pathImg = $file->storeAs('images', $profileImage);
            $files->move($destinationPath, $profileImage);
        }

        $products = Products::find($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->stock = $request->stock;
        $products->img_path = request()->$pathImg;
        $products->save();

        return redirect(route('admin.home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $products = Products::find($request->id);
        $products->delete();

        return redirect(route('admin.home'));
    }
}
