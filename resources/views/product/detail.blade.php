@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="{{ route('product.index') }}" class="btn btn-secondary m-2">Back</a>
                        <div class="card-body">
                            <div class="row">
                                    @foreach($product->details as $detail)
                                        <div class="card col-3 m-1">
                                            <div class="card-body">
                                                <img src="{{ asset('img/product.jpg') }}" alt="product" class="img-thumbnail">
                                            </div>
                                            <div class="card-header">
                                                Color: {{ $detail->color }}
                                            </div>
                                            <div class="card-header">
                                                Size: {{ $detail->size }}
                                            </div>
                                            <div class="card-header">
                                                Price: {{ $detail->price }}$
                                            </div>
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
