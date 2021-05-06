<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();

        return view('home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $products = Products::find($id);

        return view('order', compact('products'));
    }

    public function createProcess(Request $request)
    {
        $orders = new Orders();
        $orders->product_id = $request->prodID;
        $orders->amount = $request->amount;
        $orders->buyer_name = $request->buyer_name;
        $orders->buyer_contact = $request->buyer_contact;
        $orders->status = "Sedang Diproses";
        $orders->save();

        return redirect(route('home'));
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
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        $orders = Orders::all();
        $products = Products::all();

        return view('transaction', compact('orders'), compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }

    public function userOrder()
    {
        $order = Orders::all();

        return view('adminOrder', compact('order'));
    }


    public function orderDelete(Request $request)
    {
        $order = Orders::find($request->id);
        $order->delete();

        return redirect(route('admin.userOrder'));
    }

    public function orderList()
    {
        $order = Orders::all();

        return view('orderList', compact('order'));
    }

    public function UorderDelete(Request $request)
    {
        $order = Orders::find($request->id);
        $order->delete();

        return redirect(route('orderList'));
    }

    public function orderProcess(Request $request)
    {
        $order = Orders::find($request->id);
        if ($order['status'] == "Sedang Diproses") {
            $order->status = "Sedang Dikirim";
            $order->save();
        } elseif ($order['status'] == "Sedang Dikirim") {
            $order->status = "Sudah Diterima";
            $order->save();
        } elseif ($order['status'] == "Sudah Diterima") {
            $order->status = "Pesanan Selesai";
            $order->save();
        }

        return redirect(route('admin.userOrder'));
    }
}
