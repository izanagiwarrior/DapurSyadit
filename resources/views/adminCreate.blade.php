@extends('layouts.adminApp')
@section('title', 'Admin : Create')
@section('content')
<h1 class="text-center">Input Product</h1>

<form action="{{ route('admin.createProcess') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Product Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Price</label>
        <div class="input-group-prepend">
            <span class="input-group-text">Rp. </span>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1">
        </div>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea type="text" class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Stock</label>
        <input type="text" name="stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Image file input</label>
        <input type="file" name="img_path" class="form-control-file" id="exampleFormControlFile1">
    </div>

    <div class="form-group">
        <button type="submit" value="submit" class="btn btn-dark">Submit</button>
    </div>
</form>
@endsection