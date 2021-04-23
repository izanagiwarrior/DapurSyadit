@extends('layouts.userApp')
@section('title', 'Transaction')
@section('content')

@if (count($orders) === 0)

<div class="d-flex justify-content-center">
    <p class="text-muted">There is no data...</p>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('home') }}" class="btn btn-dark">Order Now</a>
</div>
@elseif (count($orders) > 0)
{{ $i = 0 }}
<h1 class="text-center">Transaction</h1>
<br><br>
<div class="container d-flex justify-content-center">
    <table class="table table-striped">
        <tr class="bg-dark text-white">
            <th>#</th>
            <th>Product</th>
            <th>Buyer Name</th>
            <th>Contact</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Total Price</th>
        </tr>
        @foreach ($orders as $index => $order)
        <tr>
            <td>{{ $i += 1 }}</td>
            @foreach ($products as $ps)
            @if ($ps->id === $order->product_id)
            <td>{{ $ps->name }}</td>
            @endif
            @endforeach
            <td>{{ $order->buyer_name }}</td>
            <td>{{ $order->buyer_contact }}</td>
            @foreach ($products as $ps)
            @if ($ps->id === $order->product_id)
            <td>Rp. {{ $ps->price}}</td>
            <td>{{ $order->amount}}</td>
            <td>Rp. {{ $order->amount*$ps->price }}</td>
            @endif
            @endforeach
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection