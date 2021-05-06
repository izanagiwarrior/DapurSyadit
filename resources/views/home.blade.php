@extends('layouts.userApp')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center mt-4">Order</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (count($products) === 0)
                    <div class="d-flex justify-content-center">
                        <p class="text-muted">Mohon maaf semua stock sedang habis.</p>
                    </div>
                    @elseif (count($products) > 0)

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($products as $index => $product)
                                            <div class="col-sm-6 mr-2 mb-4 text-center">
                                                <div class="card border-2" style="width: 18rem;">
                                                    <img src="{{ asset('public/'.$product->img_path) }}" height="225">
                                                    <div class="card-body">
                                                        <h6 class="card-title">{{ $product->name }}</h6>
                                                        <p class="card-text">{{ $product->description }}</p>
                                                        <h4 class="card-text">Rp. {{ $product->price }}</h4>
                                                        <div><a href="{{ route('create',$product->id) }}" class="btn bg-success text-white">Order Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection