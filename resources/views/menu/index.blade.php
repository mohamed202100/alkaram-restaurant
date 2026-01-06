@extends('layouts.app')

@section('title', 'المنيو')

@section('content')
<!-- Page Header -->
<header class="page-header" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); min-height: 450px; background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div class="container">
        <h1 style="color: white; font-size: 3.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">قائمة الطعام</h1>
        <p style="color: #f8f9fa; font-size: 1.5rem;">تشكيلة متنوعة من أشهى الأطباق السعودية</p>
    </div>
</header>

<!-- Menu Sections -->
<section class="section-padding">
    <div class="container">
        <!-- Category Filter (Optional enhancement) -->
        <div class="menu-filter text-center mb-5">
            <button class="filter-btn active" data-filter="all">الكل</button>
            @foreach($categories as $category)
                <button class="filter-btn" data-filter=".cat-{{ $category->id }}">{{ $category->name }}</button>
            @endforeach
        </div>

        @foreach($categories as $category)
            @if($category->items->count() > 0)
            <div class="category-section mb-5 cat-{{ $category->id }}">
                <h3 class="category-title text-gold mb-4 text-center">{{ $category->name }}</h3>
                <div class="features-grid">
                    @foreach($category->items as $item)
                        <div class="feature-card">
                            <div class="card-image">
                                <a href="{{ route('menu.show', $item->id) }}">
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                                    @else
                                        <img src="https://via.placeholder.com/300" alt="{{ $item->name }}">
                                    @endif
                                </a>
                            </div>
                            <div class="card-content">
                                <a href="{{ route('menu.show', $item->id) }}">
                                    <h3>{{ $item->name }}</h3>
                                </a>
                                <p>{{ Str::limit($item->description, 80) }}</p>
                                <span class="price">{{ $item->price }} ريال</span>
                                <form action="{{ route('cart.add') }}" method="POST" style="margin-top: 1rem;">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary w-100">أضف للسلة</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Simple filter script
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            const filter = btn.dataset.filter;
            const sections = document.querySelectorAll('.category-section');
            
            sections.forEach(sec => {
                if (filter === 'all' || sec.classList.contains(filter.substring(1))) {
                    sec.style.display = 'block';
                } else {
                    sec.style.display = 'none';
                }
            });
        });
    });
</script>
<style>
    .filter-btn {
        background: none;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        padding: 0.5rem 1.5rem;
        margin: 0 0.5rem;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s;
    }
    .filter-btn.active, .filter-btn:hover {
        background-color: var(--primary-color);
        color: var(--white);
    }
</style>
@endpush
