@extends('layouts.app')

@section('title', $item->name)

@section('content')
<!-- Page Header (Small) -->
<header class="page-header small" style="background-image: url('https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); height: 300px;">
    <div class="container">
        <h1>{{ $item->name }}</h1>
    </div>
</header>

<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="product-image" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="img-fluid w-100">
                    @else
                        <img src="https://via.placeholder.com/600" alt="{{ $item->name }}" class="img-fluid w-100">
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details p-lg-5">
                    <span class="badge bg-secondary mb-3">{{ $item->category->name }}</span>
                    <h2 class="mb-3">{{ $item->name }}</h2>
                    <h3 class="price text-gold mb-4">{{ $item->price }} ريال</h3>
                    <p class="lead text-muted mb-5">{{ $item->description }}</p>
                    
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <div class="d-flex align-items-center mb-4">
                            <label class="me-3 fw-bold">الكمية:</label>
                            <div class="input-group" style="width: 150px;">
                                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('quantity').stepDown()">-</button>
                                <input type="number" id="quantity" name="quantity" class="form-control text-center" value="1" min="1">
                                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('quantity').stepUp()">+</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">أضف للسلة <i class="fas fa-cart-plus ms-2"></i></button>
                    </form>
                </div>
            </div>
        </div>

        @if(isset($relatedItems) && $relatedItems->count() > 0)
        <div class="related-products mt-5 pt-5">
            <h3 class="mb-4 text-center">أطباق مشابهة</h3>
            <div class="row">
                @foreach($relatedItems as $related)
                <div class="col-md-3 mb-4">
                    <div class="feature-card">
                        <div class="card-image">
                            <a href="{{ route('menu.show', $related->id) }}">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}">
                                @else
                                    <img src="https://via.placeholder.com/300" alt="{{ $related->name }}">
                                @endif
                            </a>
                        </div>
                        <div class="card-content text-center p-3">
                            <h5 class="mb-2"><a href="{{ route('menu.show', $related->id) }}" class="text-dark" style="text-decoration: none;">{{ $related->name }}</a></h5>
                            <span class="text-gold fw-bold">{{ $related->price }} ريال</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
