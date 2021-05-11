@extends('layouts.app')
@section('title', 'Order')
@section('content')
<div class="row mx-5">
    <div class="col-6 px-3">
        {{-- bagian img makanan --}}
        <img src="{{asset("public/$products->img_path")}}" width="700" alt="" class="img-food">
        {{-- bagian img makanan --}}
    </div>
    <div class="col-6 pl-5">
        <div class="row p-3 ">
            <div class="col">
                {{-- bagian title makanan --}}
                <h5 class="font-weight-bold">{{$products->name}}</h5>
                {{-- bagian title makanan --}}

                {{-- bagian waktu sedia makanan dan harga --}}
                <p class="text-muted">15-25 min <span>.</span> {{$products->price}}</p>
                {{-- bagian waktu sedia makanan dan harga --}}
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                {{-- bagian deskripsi makanan --}}
                <p>{{ $products->description }}</p>
                {{-- bagian deskripsi makanan --}}
            </div>
        </div>
        <div class="row p-3">
            <div class="col pb-4">
                {{-- bagian stock makanan --}}
                @if ($products->stock === 0)
                <h6 class="text-danger">Out Of Stock</h6>
                @else
                <h6 class="text-primary">Ready Stock</h6>
                @endif
                {{-- bagian stock makanan --}}
            </div>
        </div>
        <form action="{{route('createProcess')}}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Buyer name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="fill here"
                            name="buyer_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Buyer Contact</label>
                        <input type="text" max="13" class="form-control" id="exampleInputPassword1"
                            placeholder="fill here" name="buyer_contact">
                        <input type="hidden" name="prodID" value="{{$products->id}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn-custom py-3 px-5">Buy</button>
                </div>
                <div class="col d-flex justify-content-end">
                    {{-- bagian qty makanan --}}
                    <div class="quantity-control" data-quantity="">
                        <a class="quantity-btn" data-quantity-minus=""><svg viewBox="0 0 409.6 409.6">
                                <g>
                                    <g>
                                        <path
                                            d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
                                    </g>
                                </g>
                            </svg></a>
                        <input type="number" class="quantity-input" data-quantity-target="" value="1" step="1" min="1"
                            max="" name="buyer_quantity">
                        <a class="quantity-btn" data-quantity-plus=""><svg viewBox="0 0 426.66667 426.66667">
                                <path
                                    d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                            </svg>
                        </a>
                    </div>
                    {{-- bagian qty makanan --}}
        </form>
    </div>
</div>
</div>
</div>
@endsection