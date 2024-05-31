<x-header>
    <x-slot:title> Home</x-slot:title>
</x-header>

<body>
    <nav class="navbar navbar-expand-md bg-transparent sticky-top mynavbar">
        <div class="container">
            <a class="navbar-brand" href="#">TwoHeart</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('img/TH1.png') }}" width="25%" alt="">
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="navbar-nav ms-auto">

                        <a class="nav-link" href="#home">Home</a>
                        <a class="nav-link pr-5" href="#fitur">Fitur</a>

                        @auth
                            @if (Auth::user()->idrole == '2')
                                <a class="nav-link" href="/undangan">{{ Auth::user()->username }}</a>
                            @endif
                            @if (Auth::user()->idrole == '1')
                                <a class="nav-link" href="/admin">{{ Auth::user()->username }}</a>
                            @endif
                        @else
                            <a class="nav-link" href="{{ Route('login') }}">Login</a>
                            <a class="nav-link" href="{{ Route('login') }}">Register</a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="card text-bg-dark">
        <div class="row" id="home">
            <div class="col-6 p-0 card-img">
                <img src="{{ asset('img/1.jpg') }}" class="img-fluid" alt="Gambar 1">
            </div>
            <div class="col-6 p-0 card-img">
                <img src="{{ asset('img/2.jpg') }}" class="img-fluid" alt="Gambar 2">
            </div>
        </div>
        <div class="card-img-overlay d-flex align-items-center">
            <div>
                <h2 class="card-title">TwoHeart</h2>
                <p class="card-text text-start">Membuat Orang lain menunggu itu juga termasuk Dosa Besar.<br>Maka
                    Segerakan lah....</p>
                <button type="button" class="btn btn-dark">Buat Undangan</button>
            </div>
        </div>
    </div>
    <div class="p-5">
        <div class="card mb-3 mx-auto" style="max-width: 600px;">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('img/10.jpg') }}" width="100%" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <p class="card-text fst-italic">"Wahai para pemuda, siapa saja di antara kalian yang sudah mampu
                            menanggung
                            nafkah, hendaknya dia menikah. Karena menikah lebih mampu menundukkan pandangan dan menjaga
                            kemaluan. Sementara siapa saja yang tidak mampu maka hendaknya ia berpuasa karena puasa bisa
                            menjadi tameng syahwat baginya." (HR. Bukhari, Muslim)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #d1d1d1; height: auto" class="" id="fitur">
        <section class="section" id="feature">
            <div class="container mt-100 mt-60 p-5">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4">
                            <h4 class="title mb-4">Fitur Yang Ada</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div
                            class="card features feature-clean explore-feature p-4 border-0 rounded-md shadow text-center">
                            <div class="icons text-black text-center mx-auto">
                                <span class="d-block rounded h3 mb-0">
                                    <i class="fas fa-solid fa-book"></i>
                                </span>
                            </div>
                            <div class="card-body p-0 content">
                                <h5 class="mt-4"><a href="#" class="title text-dark">Ucapan & Doa</a>
                                </h5>
                                <p class="text-muted">Dapat menerima ucapan dan doa serta status kehadiran dari tamu
                                    undangan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div
                            class="card features feature-clean explore-feature p-4 border-0 rounded-md shadow text-center">
                            <div class="icons text-grey text-center mx-auto">
                                <span class="d-block rounded h3 mb-0">
                                    <i class="fas fa-solid fa-envelope-open"></i>
                                </span>
                            </div>
                            <div class="card-body p-0 content">
                                <h5 class="mt-4"><a href="#" class="title text-dark">Amplop
                                        Digital</a>
                                </h5>
                                <p class="text-muted">Tamu dapat memberikan amplop langsung secara digital</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div
                            class="card features feature-clean explore-feature p-4 border-0 rounded-md shadow text-center">
                            <div class="icons text-black text-center mx-auto">
                                <span class="d-block rounded h3 mb-0">
                                    <i class="fas fa-solid fa-map"></i>
                                </span>
                            </div>
                            <div class="card-body p-0 content">
                                <h5 class="mt-4"><a href="#" class="title text-dark">Penunjuk
                                        Lokasi</a>
                                </h5>
                                <p class="text-muted">Dapat menunjukkan dan mengarahkan tamu ke lokasi acara</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div
                            class="card features feature-clean explore-feature p-4 border-0 rounded-md shadow text-center">
                            <div class="icons text-black text-center mx-auto">
                                <span class="d-block rounded h3 mb-0">
                                    <i class="fas fa-solid fa-images"></i>
                                </span>
                            </div>
                            <div class="card-body p-0 content">
                                <h5 class="mt-4"><a href="#" class="title text-dark">Galeri
                                        Foto</a></h5>
                                <p class="text-muted">Bagikan momen bahagia Kamu kepada tamu undangan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div
                            class="card features feature-clean explore-feature p-4 border-0 rounded-md shadow text-center">
                            <div class="icons text-black text-center mx-auto">
                                <span class="d-block rounded h3 mb-0">
                                    <i class="fas fa-solid fa-music"></i>
                                </span>
                            </div>
                            <div class="card-body p-0 content">
                                <h5 class="mt-4"><a href="#" class="title text-dark">Background
                                        Musik</a>
                                </h5>
                                <p class="text-muted">Hiasi undangan pernikahan online dengan musik kesukaanmu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <small class="block">Design by <a
                            href="https://www.instagram.com/mamatsphp/">@Kulazutto</a>.</small>

                </div>
            </div>
        </div>
    </footer>
    <style>
        footer {
            padding: 3rem;
            color: black;
        }

        footer a {
            color: var(--bg);
            font-weight: bold;
            text-decoration: none;
        }

        footer a:hover {
            color: black;
        }

        footer li {
            list-style: none;
            display: inline;
            margin: 0.5rem;
        }
    </style>
    <x-fscript></x-fscript>
