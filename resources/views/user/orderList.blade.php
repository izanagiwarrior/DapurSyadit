@php
use App\Models\Products;
@endphp
@extends('layouts.app')
@section('title', 'My Order')
@section('content')
<?php
$i = 0;
?>
<h1 class="text-center">History : {{Auth::user()->name}}</h1>
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
        </tr>

        @foreach ($order as $index => $product)
        @if($product->user_id === Auth::user()->id)
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
        </tr>
        @endif
        @endforeach
    </table>
</div>
@endsection