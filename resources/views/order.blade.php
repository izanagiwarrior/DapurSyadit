@extends('layouts.app')
@section('title', 'Order')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <img src="{{ asset('public/'.$products->img_path) }}" height="400">
        </div>
        <div class="col">
            <h1>{{ $products->name }}</h1>
            <p>{{ $products->description }}</p>
            <h6>Stock : {{ $products->stock }}</h6>
            <h1>$ {{ $products->price }}</h1>
        </div>
    </div>
</div>
<br><br><br>

<h1 class="text-center">Buyer Information</h1>
<form action="{{ route('createProcess') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="buyer_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Contact</label>
        <input type="text" name="buyer_contact" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Contact">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Quantity</label>
        <input type="text" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Quantity">
    </div>

    <input type="hidden" id="custId" name="prodID" value="{{ $products->id }}">

    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
@endsection