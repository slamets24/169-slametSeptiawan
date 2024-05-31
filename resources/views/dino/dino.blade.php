<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $undangan->nPanggilPria }} & {{ $undangan->nPanggilWanita }} Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:wght@100;300;400;600;700&display=swap"
        rel="stylesheet">

    <!-- simplyCountdown -->
    <link rel="stylesheet" href="{{ asset('js/countdown/simplyCountdown.theme.default.css') }}" />
    <script src="{{ asset('/js/countdown/simplyCountdown.min.js') }}"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/dinostyle.css') }}">
</head>

<body>

    <section id="hero"
        class="hero w-100 h-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
        <main>
            <h4>Kepada <span>Bapak/Ibu/Saudara/i, </span></h4>
            <h1>{{ $undangan->nPanggilPria }} & {{ $undangan->nPanggilWanita }}</h1>
            <p>Akan melangsungkan resepsi pernikahan dalam:</p>
            <div class="simply-countdown"></div>
            <a href="#home" class="btn btn-lg mt-4" onClick="enableScroll()">Lihat Undangan</a>
        </main>

    </section>

    <nav class="navbar navbar-expand-md bg-transparent sticky-top mynavbar">
        <div class="container">
            <a class="navbar-brand" href="#">ThowHeart</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ThowHeart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="#home">Home</a>
                        <a class="nav-link" href="#info">Info</a>
                        <a class="nav-link" href="#story">Story</a>
                        <a class="nav-link" href="#gallery">Gallery</a>
                        <a class="nav-link" href="#rsvp">RSVP</a>
                        <a class="nav-link" href="#gifts">Gifts</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section id="home" class="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>Acara Pernikahan</h2>
                    <h3>Diselenggarakan pada {{ date('j F Y', strtotime($acara[1]->tglAcara)) }} di
                        {{ $acara[1]->kota }},
                        {{ $acara[1]->provinsi }}.
                    </h3>
                    <p>Oleh karena itu, d engan segala hormat, kami bermaksud untuk mengundang Bapak/Ibu, Saudara/i,
                        untuk hadir
                        pada acara pernikahan kami. </p>
                </div>
            </div>

            <div class="row couple">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-8 text-end">
                            <h3>{{ $mPria->nmMempelaiPria }}</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque praesentium aut ipsa
                                perferendis,
                                incidunt soluta?</p>
                            <p>Putra dari Bpk. {{ $mPria->nmBapak }} <br> dan <br> Ibu {{ $mPria->nmIbu }}</p>
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $doc->fFormalPria) }}" alt="{{ $mPria->nmMempelaiPria }}"
                                class="img-responsive rounded-circle">
                        </div>
                    </div>
                </div>

                <span class="heart"><i class="bi bi-heart-fill"></i></span>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $doc->fFormalWanita) }}"
                                alt="{{ $mWanita->nmMempelaiWanita }}" class="img-responsive rounded-circle">
                        </div>
                        <div class="col-8">
                            <h3>{{ $mWanita->nmMempelaiWanita }}</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque praesentium aut ipsa
                                perferendis,
                                incidunt soluta?</p>
                            <p>Putra dari Bpk. {{ $mWanita->nmBapak }} <br> dan <br> Ibu {{ $mWanita->nmIbu }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="info" class="info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <h2>Informasi Acara</h2>
                    <p class="alamat">{{ $acara[0]->alamatLengkap }}</p>
                    {!! $acara[0]->embedGmaps !!}
                    <a href="{{ $acara[0]->linkGmaps }}" target="_blank" class="btn btn-light btn-sm my-3">Klik untuk
                        membuka peta</a>
                    <p class="description ">Diharapkan untuk tidak salah alamat dan tanggal. Manakala tiba di tujuan
                        namun tidak
                        ada tanda-tanda sedang dilangsungkan pernikahan, boleh jadi Anda salah jadwal, atau salah
                        tempat.</p>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                @foreach ($acara as $acr)
                    <div class="col-md-5 col-10">
                        <div class="card text-center text-bg-light mb-5">
                            <div class="card-header ">{{ $acr->namaAcara }}</div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <i class="bi bi-clock d-block"></i>
                                        <span>{{ date('H:i', strtotime($acr->aMulai)) }} -
                                            {{ date('H:i', strtotime($acr->aSelesai)) }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <i class="bi bi-calendar3 d-block"></i>
                                        <span>{{ date('l, j F Y', strtotime($acr->tglAcara)) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                Saat acara akad diharapkan untuk kondusif menjaga kekhidmatan dan kekhusyuan seluruh
                                prosesi.
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-md-5 col-10">
                    <div class="card text-center text-bg-light">
                        <div class="card-header">Resepsi</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <i class="bi bi-clock d-block"></i>
                                    <span>{{ date('H:i', strtotime($resepsi->aMulai)) }} -
                                        {{ date('H:i', strtotime($resepsi->aSelesai)) }}</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-calendar3 d-block"></i>
                                    <span>{{ date('l, j F Y', strtotime($resepsi->tglAcara)) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Saat acara akad diharapkan untuk kondusif menjaga kekhidmatan dan kekhusyuan seluruh
                            prosesi.
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section id="story" class="story">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>Bagaimana Cinta Kami Bersemi</span>
                    <h2>Cerita Kami</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, similique non soluta nulla
                        asperiores
                        voluptatem.</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <ul class="timeline">
                        @foreach ($story as $index => $item)
                            <li class="{{ $index % 2 == 1 ? 'timeline-inverted' : '' }}">
                                <div class="timeline-image"
                                    style="background-image: url('{{ asset('storage/' . $item->gambar) }}');"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3>{{ $item->judul }}</h3>
                                        <span></span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{{ $item->cerita }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>Memori Kisah Kami</span>
                    <h2>Galeri Foto</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, itaque?</p>
                </div>
            </div>

            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center">
                @if (!empty($fWedding))
                    @foreach ($fWedding as $wedding)
                        <div class="col mt-3">
                            <a href="{{ asset('storage/' . $wedding) }}" style="width: 1200px; height:768px"
                                data-toggle="lightbox" data-caption="" data-gallery="mygallery">
                                <img src="{{ asset('storage/' . $wedding) }}" style="width: 300px; height:400px"
                                    alt="" class="img-fluid w-100 rounded">
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section id="rsvp" class="rsvp">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <h2>Ucapan & Doa</h2>
                </div>
            </div>
            <div class="row g-4 m-3">
                <div class="col-md-6">
                    <form action="{{ Route('storeUcapan', [$undangan->id]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" id="nama" name="nama" class="form-control"
                                placeholder="Nama Lengkap / Fulan&Fulana">
                        </div>
                        <div class="mb-3">
                            <input type="text" id="alamat" name="alamat" class="form-control"
                                placeholder="Alamat : Cirebon">
                        </div>
                        <div class="mb-3">
                            <textarea rows="6" type="text" id="ucapan" name="ucapan" class="form-control-lg form-control"
                                placeholder="contoh: Selamat untuk acaranya"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Sekarang</button>
                    </form>
                </div>
                <div class="col-md-6" style="max-height: 400px; overflow-y: auto;">
                    @foreach ($ucapan->reverse() as $ucap)
                        <div class="card mb-3" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ucap->nama }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $ucap->alamat }}</h6>
                                <p class="card-text text-dark">{{ $ucap->ucapan }}</p>
                                <p class="card-text text-muted">{{ $ucap->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="gifts" class="gifts">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>ungkapan tanda kasih</span>
                    <h2>Kirim Hadiah</h2>
                </div>
            </div>

            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="fw-bold text-uppercase">{{ $mPria->nRekening }}</div>
                            {{ $mPria->noRek }} - {{ $mPria->nmMempelaiPria }}
                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold text-uppercase">{{ $mWanita->nRekening }}</div>
                            {{ $mWanita->noRek }} - {{ $mWanita->nmMempelaiWanita }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <small class="block">Design by <a
                            href="https://instagram.com/sandhikagalih">@sandhikagalih</a>.</small>

                    <ul class="mt-3">
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-tiktok"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div id="audio-container">
        <audio id="song" autoplay loop>
            <source src="{{ asset('audio/save-and-sound.mp3') }}" type="audio/mp3">
        </audio>

        <div class="audio-icon-wrapper" style="display: none;">
            <i class="bi bi-disc"></i>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
    <style>
        .col-md-6::-webkit-scrollbar {
            display: none;
        }
    </style>
    <style>
        .col-md-6::-webkit-scrollbar {
            display: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var tglAcara = new Date('{{ $acara[0]->tglAcara }}');
            var aMulai = '{{ $acara[0]->aMulai }}'.split(':');

            simplyCountdown('.simply-countdown', {
                year: tglAcara.getFullYear(),
                month: tglAcara.getMonth() + 1, // Bulan di JavaScript 0-indexed
                day: tglAcara.getDate(),
                hours: parseInt(aMulai[0]), // Jam dari aMulai
                minutes: parseInt(aMulai[1]) || 0, // Menit dari aMulai, default 0
                seconds: parseInt(aMulai[2]) || 0, // Detik dari aMulai, default 0
                words: { //words displayed into the countdown
                    days: {
                        singular: 'hari',
                        plural: 'hari'
                    },
                    hours: {
                        singular: 'jam',
                        plural: 'jam'
                    },
                    minutes: {
                        singular: 'menit',
                        plural: 'menit'
                    },
                    seconds: {
                        singular: 'detik',
                        plural: 'detik'
                    }
                },
            });
        });
    </script>

    <script>
        const stickyTop = document.querySelector('.sticky-top');
        const offcanvas = document.querySelector('.offcanvas');

        offcanvas.addEventListener('show.bs.offcanvas', function() {
            stickyTop.style.overflow = 'visible';
        });

        offcanvas.addEventListener('hidden.bs.offcanvas', function() {
            stickyTop.style.overflow = 'hidden';
        });
    </script>

    <script>
        const rootElement = document.querySelector(":root");
        const audioIconWrapper = document.querySelector('.audio-icon-wrapper');
        const audioIcon = document.querySelector('.audio-icon-wrapper i');
        const song = document.querySelector('#song');
        let isPlaying = false;

        function disableScroll() {
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

            window.onscroll = function() {
                window.scrollTo(scrollTop, scrollLeft);
            }

            rootElement.style.scrollBehavior = 'auto';
        }

        function enableScroll() {
            window.onscroll = function() {}
            rootElement.style.scrollBehavior = 'smooth';
            // localStorage.setItem('opened', 'true');
            playAudio();
        }

        function playAudio() {
            song.volume = 0.1;
            audioIconWrapper.style.display = 'flex';
            song.play();
            isPlaying = true;
        }

        audioIconWrapper.onclick = function() {
            if (isPlaying) {
                song.pause();
                audioIcon.classList.remove('bi-disc');
                audioIcon.classList.add('bi-pause-circle');
            } else {
                song.play();
                audioIcon.classList.add('bi-disc');
                audioIcon.classList.remove('bi-pause-circle');
            }

            isPlaying = !isPlaying;
        }

        // if (!localStorage.getItem('opened')) {
        //   disableScroll();
        // }
        disableScroll();
    </script>
    <script>
        window.addEventListener("load", function() {
            const form = document.getElementById('my-form');
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                const data = new FormData(form);
                const action = e.target.action;
                fetch(action, {
                        method: 'POST',
                        body: data,
                    })
                    .then(() => {
                        alert("Konfirmasi kehadiran berhasil terkirim!");
                    })
            });
        });
    </script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const nama = urlParams.get('n') || '';
        const pronoun = urlParams.get('p') || 'Bapak/Ibu/Saudara/i';
        const namaContainer = document.querySelector('.hero h4 span');
        namaContainer.innerText = `${pronoun} ${nama},`.replace(/ ,$/, ',');

        document.querySelector('#nama').value = nama;
    </script>
</body>

</html>
