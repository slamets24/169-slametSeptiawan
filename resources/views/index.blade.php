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
                        <a class="nav-link" href="#info">Info</a>
                        <a class="nav-link" href="#story">Story</a>
                        <a class="nav-link" href="#gallery">Gallery</a>
                        <a class="nav-link" href="#rsvp">RSVP</a>
                        @auth
                            <a class="nav-link" href="/undangan">{{ Auth::user()->username }}</a>
                        @else
                            <a class="nav-link" href="{{ Route('login') }}">Login</a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-6 p-0">
            <img src="{{ asset('img/1.jpg') }}" class="img-fluid" alt="Gambar 1">
        </div>
        <div class="col-6 p-0">
            <img src="{{ asset('img/2.jpg') }}" class="img-fluid" alt="Gambar 2">
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
                        <h5 class="card-title">Lorem Ipsum</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown
                            printer took a galley of type and scrambled it to make a type specimen book..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #d1d1d1; height: 20rem">

    </div>

    <div class="container">
        <div class="row justify-content-center mt-5" style="height: 30rem;">
            <div class="col-md-6">
                <nav>
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active"href="#registration"
                                onclick="showRegistrationForm(this)">Daftar</a></li>
                        <li class="nav-item"><a class="nav-link " href="#login" onclick="showLoginForm(this)">Login</a>
                        </li>
                    </ul>
                </nav>

                <!-- Form Pendaftaran -->
                <form id="registration-form" style="display: block;">
                    <label for="nama">Nama:</label><br>
                    <input type="text" id="nomor-hp" name="nomor-hp" class="form-control" required><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" class="form-control" required><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" class="form-control" required><br><br>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>

                <!-- Form Login -->
                <form id="login-form" style="display: none;">
                    <label for="email-login">Email:</label><br>
                    <input type="email" id="email-login" name="email-login" class="form-control" required><br>
                    <label for="password-login">Password:</label><br>
                    <input type="password" id="password-login" name="password-login" class="form-control"
                        required><br><br>
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Function untuk menampilkan form pendaftaran
        function showRegistrationForm(tab) {
            document.getElementById('registration-form').style.display = 'block';
            document.getElementById('login-form').style.display = 'none';
            document.querySelector('.nav-tabs .nav-link[href="#login"]').classList.remove('active');

            tab.classList.add('active');
        }

        // Function untuk menampilkan form login
        function showLoginForm(tab) {
            document.getElementById('registration-form').style.display = 'none';
            document.getElementById('login-form').style.display = 'block';
            document.querySelector('.nav-tabs .nav-link[href="#registration"]').classList.remove('active');

            tab.classList.add('active');
        }
    </script>
    <x-fscript></x-fscript>
