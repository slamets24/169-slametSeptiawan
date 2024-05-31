@extends('layout.dasboard')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>Diharapkan Untuk Lengkapi Data Data Terlebih Dahulu agar tidak ada Error sama Sekali :)</h1>
                <h3>Jika Sudah Mengisi Silakan Balik lagi kehalaman Dashboard Thx :)</h3>
                <p>Karna Ada Tombol Dibawah sini hehehe</p>
            </div>
            <div>
                @php
                    $i = 3;
                @endphp
                @if ($cek)
                    <a href="{{ route('show', ['id' => $id]) }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Lihat Undangan</a>
                @endif

            </div>
        </div>
    @endsection
