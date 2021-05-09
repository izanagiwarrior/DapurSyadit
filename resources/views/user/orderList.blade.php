@php
use App\Models\Products;
@endphp
@extends('layouts.userApp')
@section('title', 'My Order')
@section('content')
{{ $i = 0 }}
<h1 class="text-center">My Order : {{Auth::user()->name}}</h1>
<br>
<div class="container d-flex justify-content-center">
    <table class="table table-striped">
        <tr class="bg-dark text-white">
            <th>#</th>
            <th>Name</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach ($order as $index => $product)
        @if($product->buyer_name === Auth::user()->name)
        <tr>
            <td>{{ $i += 1 }}</td>
            <td>{{ $product->buyer_name }}</td>
            <td>
            @php
            $order = Products::find($product->product_id);
            echo $order['name'];
            @endphp
            </td>
            <td>{{ $product->amount }}</td>
            <td>{{ $product->buyer_contact }}</td>
            <td>{{ $product->status }}</td>
            <td>
                <form action="{{ route('UorderDelete') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <button class="btn btn-danger">Cancel Order</button>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
    </table>
</div>
@endsection