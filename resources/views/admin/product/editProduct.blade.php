@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Panel ') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row d-flex justify-content-center">
                            <div class="card col-8 m-5">
                                <div class="card-header">
                                    {{ $product->name }}
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('img/product.jpg') }}" alt="product" class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="card col-12">
                            <div class="card-header">
                                Edit
                            </div>
                            <form action="{{ route('product.update',[$product]) }}" method="post" class="m-3">
                                @csrf
                                @method("PATCH")
                                <div class="form-group col-12">
                                    <label for="productName">Name</label>
                                    <input type="text" class="form-control" id="productName" name="productName"
                                           value="{{ $product->name }}">
                                </div>

                                <button type="submit" class="btn btn-primary m-2">Update</button>
                            </form>
                        </div>
                        <br>
                        <div class="card col-12">
                            <div class="card-header">
                                Details
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Manage</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product->details as $detail)
                                        <tr>
                                            <th scope="row">{{ $detail->id }}</th>
                                            <td>{{ $detail->color }}</td>
                                            <td>{{ $detail->size }}</td>
                                            <td>{{ $detail->price }}$</td>
                                            <td>
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Manage</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="{{ route('detail.edit',[$detail]) }}">Edit Detail</a></li>
                                                            <li>
                                                                <form action="{{ route('detail.destroy',[$detail]) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="dropdown-item">Remove</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <br>
                        <div class="card col-12">
                            <div class="card-header">
                                Add Detail
                            </div>
                            <div class="card-body">
                                <form action="@if(isset($productDetail)) {{ route('detail.update',[$productDetail]) }} @else {{ route('detail.store') }} @endif" method="post" class="m-3">
                                    @csrf
                                    @if(isset($productDetail)) @method('PATCH') @else @method("post") @endif

                                    <div class="form-group col-12">
                                        <label for="productId">Product : {{ $product->name }}</label>
                                        <input type="text" class="form-control" id="productId" name="productId"
                                               value="{{ $product->id }}" hidden="hidden">
                                    </div>
                                    <br>
                                    <div class="form-group col-12">
                                        <label for="productColor">Color</label>
                                        <input type="text" class="form-control" id="productColor" name="productColor"
                                               @if(isset($productDetail)) value="{{ $productDetail->color }}" @else placeholder="Type your product color" @endif >
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="productSize">Size</label>
                                        <input type="number" class="form-control" id="productSize" name="productSize"
                                               @if(isset($productDetail)) value="{{ $productDetail->size }}" @else placeholder="Type your product size" @endif >
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="productPrice">Price</label>
                                        <input type="number" class="form-control" id="productPrice" name="productPrice"
                                               @if(isset($productDetail)) value="{{ $productDetail->price }}" @else placeholder="Type your product price" @endif >
                                    </div>

                                    <button type="submit" class="btn btn-primary m-2">@if(isset($productDetail)) Update Detail @else Add Detail @endif</button>
                                </form>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
