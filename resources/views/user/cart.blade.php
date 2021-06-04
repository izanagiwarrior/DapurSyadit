@extends('layouts.app')
@section('title', 'Cart')
@section('content')

@if (count($cart) === 0)

<div class="d-flex justify-content-center">
    <p class="text-muted">There is no data...</p>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('home') }}" class="btn btn-dark">Order Now</a>
</div>
@elseif (count($cart) > 0)
<?php
$i = 0;
?>
<h1 class="text-center">Cart</h1>
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
            <th>Action</th>
        </tr>
        <?php
        $total = 0;
        ?>
        @foreach ($cart as $index => $order)
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
            <td>
                <form action="{{ route('UorderDelete') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $order->id }}" name="id">
                    <button class="btn btn-danger">Cancel</button>
                </form>
            </td>
            <?php
            $total += $order->amount * $ps->price;
            ?>
            @endif
            @endforeach
        </tr>
        @endforeach
    </table>
    <div class="text-right">
        <p>Total : Rp. {{$total}}</p>
    </div>
    <form action="{{ route('cartConfirmation') }}" method="post">
        @csrf
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
        <button class="btn btn-primary">Order</button>
    </form>
</div>
@endif
@endsection