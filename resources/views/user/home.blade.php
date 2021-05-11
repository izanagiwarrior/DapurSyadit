@extends('layouts.app')
@section('title', 'Order')
@section('content')
<div class="container-fluid px-5">
    <div class="row" style="height: 100%">
        <div class="col">
            <div class="banner w-100">
                <img src="{{asset('images/banner-web.png')}}" alt="">
            </div>
            <div class="row">
                <div class="d-flex flex-row justify-content-between">
                    <h2 class="title-section">Food Catalog</h2>
                    <input type="text" placeholder="search food here..." class="search-input">
                </div>
                @foreach($products as $pd)
                <div class="col-4">
                    <div class="me-card">
                        <div class="card-image">
                            <img src="{{asset("public/$pd->img_path")}}" alt="" srcset="">
                        </div>
                        <div class="card-body d-flex justify-content-around align-items-center">
                            <div class="text-container">
                                <h2 class="card-title">{{$pd->name}}</h2>
                                <p class="text-muted d-inline">15-25 min <span>.</span> </p>
                                <p class="text-muted d-inline">{{$pd->price}}</p>
                            </div>
                            <div>
                                <a href="{{route('create', $pd->id)}}" class="btn-custom px-5 py-3">Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection