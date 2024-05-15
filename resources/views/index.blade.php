<x-header>
    <x-slot:title> Home</x-slot:title>
</x-header>

<body>
    <nav class="navbar navbar-expand-md bg-transparent sticky-top mynavbar">
        <div class="container">
            <a class="navbar-brand" href="#">2Heart</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dino</h5>
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

    <div class="row">
        <div class="col-6 p-0">
            <img src="{{ asset('img/1.jpg') }}" class="img-fluid" alt="Gambar 1">
        </div>
        <div class="col-6 p-0">
            <img src="{{ asset('img/2.jpg') }}" class="img-fluid" alt="Gambar 2">
        </div>
    </div>

    <div style="background-color: #d1d1d1; height: 20rem">

    </div>

    <div class="container" style="height : 30rem">
        <nav>
            <ul>
                <li><a href="#registration" onclick="showRegistrationForm()">Daftar</a></li>
                <li><a href="#login" onclick="showLoginForm()">Login</a></li>
            </ul>
        </nav>

        <!-- Form Pendaftaran -->
        <form id="registration-form" style="display: block;">
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" required><br>
            <label for="nomor-hp">Nomor HP:</label><br>
            <input type="text" id="nomor-hp" name="nomor-hp" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Daftar</button>
        </form>

        <!-- Form Login -->
        <form id="login-form" style="display: none;">
            <label for="email-login">Email:</label><br>
            <input type="email" id="email-login" name="email-login" required><br>
            <label for="password-login">Password:</label><br>
            <input type="password" id="password-login" name="password-login" required><br><br>
            <button type="submit">Masuk</button>
        </form>
    </div>

    <script>
        // Function untuk menampilkan form pendaftaran
        function showRegistrationForm() {
            document.getElementById('registration-form').style.display = 'block';
            document.getElementById('login-form').style.display = 'none';
        }

        // Function untuk menampilkan form login
        function showLoginForm() {
            document.getElementById('registration-form').style.display = 'none';
            document.getElementById('login-form').style.display = 'block';
        }
    </script>
    <x-fscript></x-fscript>
