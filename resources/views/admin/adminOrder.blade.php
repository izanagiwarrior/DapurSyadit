@php
use App\Models\Products;
@endphp
@extends('layouts.adminApp')
@section('title', 'Admin : Home')
@section('content')
<div class="container-fluid">
    {{ $i = 0 }}
    <h2 class="text-center">List User</h2>
    <br>
    <div class="container d-flex justify-content-center">
        <table class="table table-striped">
            <tr class="bg-dark text-white text-center">
                <th>#</th>
                <th>Name</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach ($order as $index => $product)
            <tr class="text-center">
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
                <td class="d-flex justify-content-around">
                    @if($product->status === "Pesanan Selesai")
                    <p class="text-danger"><b>Selesai</b></p>
                    @else
                    <form action="{{ route('admin.orderProcess') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <button class="btn btn-success">Process</button>
                    </form>
                    <form action="{{ route('admin.orderDelete') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection