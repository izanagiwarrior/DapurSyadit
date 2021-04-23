@extends('layouts.adminApp')

@section('title', 'Admin : Home')
@section('content')
{{ $i = 0 }}
<h1 class="text-center">List User</h1>
<br>
<div class="container d-flex justify-content-center">
    <table class="table table-striped">
        <tr class="bg-dark text-white">
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>User</th>
            <th>Action</th>
        </tr>

        @foreach ($user as $index => $product)

        <tr>
            <td>{{ $i += 1 }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->email }}</td>
            <td>
                @if ($product->is_admin === 1)
                {{ __('Admin') }}
                @else
                {{ __('User') }}
                @endif
            </td>
            <td>
                @if ($product->is_admin === 1)
                {{ __('No Delete : Admin') }}
                @elseif ($product->name === 'User')
                {{ __('No Delete : Example User') }}
                @else
                <form action="{{ route('admin.userDelete') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </table>
</div>
@endsection