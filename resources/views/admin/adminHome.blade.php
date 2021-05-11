@extends('layouts.adminApp')

@section('title', 'Admin : Home')
@section('content')
<div class="container-fluid">
    <div class="row p-3">
        <h2>Dashboard</h2>
    </div>
    <div class="row p-3">
        <p style="font-size:20px; font-weight:light;">hello admin, welcome to this page
            lets enjoy it.</p>
    </div>
</div>
@endsection
{{-- @if (count($products) === 0)
<div class="d-flex justify-content-center">
    <p class="text-muted">There is no data...</p>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('admin.create')}}" class="btn btn-dark">Add Product</a>
</div>

@elseif (count($products) > 0)

{{ $i = 0 }}
<h1 class="text-center">List Product</h1>
<div class="container d-flex">
    <a href="{{ route('admin.create' )}}" class="btn btn-dark">Add Product</a>
</div>
<br>
<div class="container d-flex justify-content-center">
    <table class="table table-striped">
        <tr class="bg-dark text-white">
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        @foreach ($products as $index => $product)

        <tr>
            <td>{{ $i += 1 }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('admin.edit',$product->id) }}" class="btn btn-primary">Edit</a>

                &nbsp;&nbsp;

                <form action="{{ route('admin.delete') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endif --}}