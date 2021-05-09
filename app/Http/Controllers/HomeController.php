<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Products::all();

        return view('user.home', compact('products'));
    }

    /**
     * Show the admin application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $products = Products::all();

        return view('admin.adminHome', compact('products'));
    }
    
}
