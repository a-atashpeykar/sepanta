@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="card-body">
                            <div class="row">
                                    @foreach($products as $product)
                                            <div class="card col-4 flex justify-content-between">
                                            <div class="card-header">
                                                {{ $product->name }}
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/product.jpg') }}" alt="product" class="img-thumbnail">
                                            </div>
                                            <a href="{{ route('product.show',[$product]) }}" class="btn btn-secondary m-1">Product details . . .</a>
                                        </div>
                                    @endforeach
                            </div>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
