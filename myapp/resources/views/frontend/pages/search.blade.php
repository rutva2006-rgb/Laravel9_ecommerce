
@extends('layouts.app')
@section('title','Search Products')

@section('content')

<div class="py-5 bg-gray">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <h4 class="fw-bold">Search Results</h4>
                <div class="underline mb-3"></div>
            </div>

            @forelse ($searchProduct as $productsItem)
                <div class="col-md-10 mb-3">
                    <div class="border rounded bg-white shadow-sm p-3 product-card">
                        <div class="row align-items-center">

                            <!-- Product Image -->
                            <div class="col-md-3 position-relative text-center">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">New</span>
                                @if($productsItem->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$productsItem->category->slug.'/'.$productsItem->slug) }}">
                                        <img src="{{ asset($productsItem->productImages[0]->image) }}"
                                             class="img-fluid rounded"
                                             alt="{{ $productsItem->name }}">
                                    </a>
                                @endif
                            </div>
                            <!-- Product Details -->
                            <div class="col-md-9">
                                <!-- Product Details -->
                                <div class="product-card-body">

                                    <p class="product-brand">{{  $productsItem->brand }}</p>

                                    <h5 class="product-name">
                                        <a href="{{ url('/collections/'.$productsItem->category->slug.'/'.$productsItem->slug) }}">
                                            {{  $productsItem->name }}
                                        </a>
                                    </h5>

                                    <div class="product-prices">
                                        <span class="selling-price">${{  $productsItem->selling_price }}</span>
                                        <span class="original-price">${{  $productsItem->original_price }}</span>
                                    </div>
                                    <p style="height:40px; overflow: hidden;">
                                        <b>Description: </b>{{ $productsItem->description }}
                                    </p>
                                    <a href="{{ url('/collections/'.$productsItem->category->slug.'/'.$productsItem->slug) }}"
                                        class="btn btn-outline-primary">
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center py-4">
                    <h4 class="text-muted">No Such Products Found</h4>
                </div>
            @endforelse

        </div>
    </div>
</div>

@endsection
