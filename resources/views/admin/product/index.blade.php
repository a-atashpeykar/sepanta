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
                    <div class="nav">
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-products-tab" data-bs-toggle="pill" data-bs-target="#v-pills-products" type="button" role="tab" aria-controls="v-pills-products" aria-selected="true">Products</button>
                                <button class="nav-link" id="v-pills-create-tab" data-bs-toggle="pill" data-bs-target="#v-pills-create" type="button" role="tab" aria-controls="v-pills-create" aria-selected="false">Create</button>
                            </div>
                            <div class="tab-content col-12" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab" tabindex="0">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Count</th>
                                            <th scope="col">Manage</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <th scope="row">{{ $product->id }}</th>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ count($product->details) }}</td>
                                                <td>
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Manage</a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="{{ route('product.edit',[$product]) }}">Edit Product</a></li>
                                                                <li>
                                                                    <form action="{{ route('product.destroy',[$product]) }}" method="post">
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

                                <div class="tab-pane fade" id="v-pills-create" role="tabpanel" aria-labelledby="v-pills-create-tab" tabindex="0">
                                    <form action="{{ route('product.store') }}" method="post">
                                        @csrf
                                        @method("POST")
                                        <div class="form-group col-12">
                                            <label for="productName">Name</label>
                                            <input type="text" class="form-control" id="productName" name="productName" placeholder="Type your product name">
                                        </div>
                                        <button type="submit" class="btn btn-primary m-2">Create</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
