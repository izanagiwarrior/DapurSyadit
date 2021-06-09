<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\Cart;
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

        return view('user.home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $products = Products::find($id);

        return view('user.order', compact('products'));
    }

    public function createProcess(Request $request)
    {
        $cart = new Cart();
        $cart->user_id = $request->userID;
        $cart->product_id = $request->prodID;
        $cart->amount = $request->buyer_quantity;
        $cart->buyer_name = $request->buyer_name;
        $cart->buyer_contact = $request->buyer_contact;
        $cart->status = "Sedang Diproses";
        $cart->address = $request->address;
        $cart->save();

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

        return view('user.transaction', compact('orders'), compact('products'));
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

        return view('admin.adminOrder', compact('order'));
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

        return view('user.orderList', compact('order'));
    }

    public function cart(Request $request)
    {
        $cart = Cart::all();
        $products = Products::all();

        return view('user.cart', compact('cart', 'products'));
    }

    public function UorderDelete(Request $request)
    {
        $order = Cart::find($request->id);
        $order->delete();

        return redirect(route('cart'));
    }

    public function statistic()
    {
        $products = Products::all();
        $order = Orders::selectRaw("sum(amount) amount, product_id")
            ->groupBy('product_id')
            ->get();
        return view('admin.adminStatistic', compact('order', 'products'));
    }

    public function cartConfirmation(Request $request)
    {
        $cart = Cart::all();
        // echo $cart;
        foreach ($cart as $cr) {
            if ($cr->user_id == $request->user_id) {
                $cart2 = new Orders();
                $cart2->user_id = $cr->user_id;
                $cart2->product_id = $cr->product_id;
                $cart2->amount = $cr->amount;
                $cart2->buyer_name = $cr->buyer_name;
                $cart2->buyer_contact = $cr->buyer_contact;
                $cart2->status = "Sedang Diproses";
                $cart2->address = $cr->address;
                $cart2->save();
                $delete = Cart::find($cr->id);
                $delete->delete();
            }
        }

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
