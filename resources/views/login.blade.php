<x-header>
    <x-slot:title> Login</x-slot:title>
</x-header>

<body class="bg-gradient" style="background-color: #d1d1d1;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="{{ asset('img/6.jpg') }}" alt="" style="width: 100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        @if (@session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        @if (@session()->has('loginError'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('loginError') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email')
                                            is-invalid @enderror"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email"
                                                value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                            <div class="invalid-feeback text-danger"
                                                style="font-size: 13px;padding-left: 20px">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password')
                                            is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        @error('password')
                                            <div class="invalid-feeback text-danger"
                                                style="font-size: 13px;padding-left: 20px">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                    <div class="text-center">
                                        <a class="small" href="/register">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/">Back To HomePage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <x-fscript></x-fscript>
