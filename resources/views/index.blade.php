@extends('layouts.app')

@section('title', 'Landing Page')

@section('content')
    <header>
        <img src="{{ asset('asset/image/main-title.png') }}" alt="Header Image" style="width: 800px; position: absolute;">
        
    </header>
    <section id="about" class="about-section bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center">
                    <img src="asset/image/about.png" alt="Gambar Roti" class="img-fluid mb-4 mb-md-0"> <!-- Ganti dengan URL gambar roti Anda -->
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <p>Didirikan atas dasar kecintaan terhadap roti bakar dan keinginan untuk menghadirkan pengalaman kuliner yang unik dan lezat bagi masyarakat. Berawal dari eksperimen di dapur rumah, Toast Brebed terinspirasi dari resep roti bakar tradisional yang kemudian dimodifikasi dengan sentuhan modern dan kreatif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider untuk menampilkan gambar menu -->
    <section id="menu" class="text-center">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($blogs as $blog)
                <div class="carousel-item @if( $loop->iteration == 1) active @endif">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-4 text-center desc-product">
                            <img src="{{ Storage::url('public/blogs/').$blog->image }}" class="img-fluid" alt="Menu 1"> <!-- Atur lebar dan tinggi maksimum -->
                            <p class="product-name">{{ $blog->title }}</p>
                            <p class="product-desc">{!! $blog->content !!}</p>
                            <p class="product-price">{{ $blog->price }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="fas fa-chevron-left" aria-hidden="true" style="color: #FBAB61; font-size: 50pt;"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="fas fa-chevron-right" aria-hidden="true" style="color: #FBAB61; font-size: 50pt;"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Teks "Our Menu" di tengah -->
        <div class="menu-heading">our</div>
        <div class="sub-heading">me·nu</div>
        <a href="/pesanan" class="button-order">Order Now</a>
    </section>
    <!-- Testimonial Section -->
    <section id="testimonials" class="testimonial-section">
        <div class="container">
            <h2 class="text-center" style="color: #FBAB61; font-weight: bold;">Testimonials</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"udah order berkali kali dan ga bosen, top of my mind kalo lagi pengen roti bakar kalo ga anget anget. emang top dah @toastbrebed mana murah banget only 12rb ann, kalian semua harus pada cobain sih emang."</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"enak banget siii, harganya affordable banget buat mahaiswa apalagi anak kos. simple, ngenyangin, dan cocok buat ngemil. recommended banget siii karena emang se enak itu."</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"udah murah, enak, fluffy, gurih, ga pelit topping. baru pertama kali nyoba dan emang enak, mana cuman 12rb an?! poin plus buat pengantarannya karena on time dan datang ke pembeli juga masih hangat, pasti bakal repeat order sih ini."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
