@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container hero-content">
        <h1 class="fade-in-up">يا هلا ومرحبا في <br><span class="text-gold">بيت الكرم والجود</span></h1>
        <p class="fade-in-up delay-1">عيش تجربة الأكل السعودي الأصيل على أصوله. طعم ياخذك للماضي الجميل، وضيافة
            تبيض الوجه.</p>
        <div class="hero-buttons fade-in-up delay-2">
            <a href="{{ route('menu.index') }}" class="btn btn-primary">شوف المنيو</a>
            <a href="{{ route('contact') }}" class="btn btn-secondary">احجز مجلسك</a>
        </div>
    </div>
</section>

<!-- Our Story Teaser -->
<section class="about-section section-padding">
    <div class="container">
        <div class="about-grid">
            <div class="about-text scroll-reveal">
                <h4 class="text-gold">تراثنا العريق</h4>
                <h2>أصالة الماضي.. ونكهة الحاضر</h2>
                <p>في مطعم الكرم، الأكل عندنا مو بس وجبة، هو قصة عشق بدأت من بيوت أجدادنا. نقدم لكم أطباقنا بنفس
                    النفس ونفس الطعم اللي تربينا عليه.</p>
                <p>من ريحة الهيل والزعفران، لطعم اللحم الطري اللي يذوب بالفم، كل لقمة عندنا تحكي حكاية كرم
                    وضيافة ما تنتهي.</p>
                <a href="{{ route('about') }}" class="btn btn-primary" style="margin-top: 1rem;">اقرأ قصتنا</a>
            </div>
            <div class="about-image scroll-reveal delay-1">
                <img src="https://images.unsplash.com/photo-1590577976322-3d2d6e2130d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                    alt="جلسة سعودية تقليدية">
            </div>
        </div>
    </div>
</section>

<!-- Popular Dishes -->
<section class="features section-padding">
    <div class="container">
        <div class="section-header">
            <h4 class="text-gold">أطباقنا المميزة</h4>
            <h2 class="scroll-reveal">الأكثر طلباً</h2>
            <p class="scroll-reveal delay-1">جرب اللي يحبه قلبك من أطباقنا اللي ما تتفوت</p>
        </div>
        <div class="features-grid">
            @foreach($featuredItems as $item)
            <div class="feature-card scroll-reveal delay-1">
                <div class="card-image">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                    @else
                        <img src="https://via.placeholder.com/300" alt="{{ $item->name }}">
                    @endif
                </div>
                <div class="card-content">
                    <h3>{{ $item->name }}</h3>
                    <p>{{ Str::limit($item->description, 100) }}</p>
                    <span class="price">{{ $item->price }} ريال</span>
                    <form action="{{ route('cart.add') }}" method="POST" style="margin-top: 1rem;">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-sm btn-primary">أضف للسلة</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center" style="margin-top: 3rem;">
            <a href="{{ route('menu.index') }}" class="btn btn-primary">تصفح المنيو الكامل</a>
        </div>
    </div>
</section>

<!-- Stats/Highlights -->
<section class="section-padding" style="background-color: var(--primary-color); color: var(--white);">
    <div class="container">
        <div class="features-grid text-center">
            <div class="scroll-reveal">
                <i class="fas fa-utensils"
                    style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 1rem;"></i>
                <h3 style="color: var(--white);">وصفات أصيلة</h3>
                <p style="color: #e2e8f0;">طعم زمان 100%</p>
            </div>
            <div class="scroll-reveal delay-1">
                <i class="fas fa-star"
                    style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 1rem;"></i>
                <h3 style="color: var(--white);">خدمة 5 نجوم</h3>
                <p style="color: #e2e8f0;">تدلل عندنا</p>
            </div>
            <div class="scroll-reveal delay-2">
                <i class="fas fa-users"
                    style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 1rem;"></i>
                <h3 style="color: var(--white);">جلسات عائلية</h3>
                <p style="color: #e2e8f0;">خصوصية وراحة تامة</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta section-padding">
    <div class="container cta-content">
        <h2 class="scroll-reveal">ودك تعيش التجربة؟</h2>
        <p class="scroll-reveal delay-1">احجز مجلسك الخاص الحين واستمتع بأحلى الأوقات مع الأهل والأحباب.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary scroll-reveal delay-2">احجز الآن</a>
    </div>
</section>
@endsection
