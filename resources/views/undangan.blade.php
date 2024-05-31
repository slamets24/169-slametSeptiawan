@extends('layout.dasboard')
@section('content')
    <div class="card col-5 text-center mx-auto">
        <div class="card-header">
            Selamat Datang !
        </div>
        <div class="card-body">
            <h1 class="card-title">{{ $count }}</h1>
            <small class="card-text">Jumblah Undagan</small><br>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Undagan</button>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <!-- Card 1 -->
            @foreach ($undangan as $undang)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $undang->judulUndangan }}</h5>
                            <p class="card-text">{{ $undang->nPanggilPria }} & {{ $undang->nPanggilWanita }}</p>
                            <a href="{{ route('dashboard.index', [$undang->id, $undang->nPanggilPria, $undang->nPanggilWanita]) }}"
                                class="btn btn-success">Lanjut</a>
                            <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#ModalHapus{{ $undang->id }}">Hapus</a>
                        </div>
                    </div>
                </div>
                {{-- Modal Hapus --}}
                <div class="modal fade" id="ModalHapus{{ $undang->id }}" tabindex="-1" aria-labelledby="ModalHapuslLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ModalHapuslLabel"></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Apakah Anda Yakin Ingin Menghapus Undangan?</h5> <br>
                                <form action="/undangan/{{ $undang->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{--
    <form action="/undangan/{{ $undang->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form> --}}


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Silakan Isi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('undangan.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="judulUndangan" class="form-label">Tema Undagan</label>
                            <input type="text" class="form-control" id="judulUndangan" aria-describedby="emailHelp"
                                name="judulUndangan" readonly value="Prewedding">
                        </div>
                        <div class="mb-3">
                            <label for="nPanggilPria" class="form-label">Nama Panggilan Pria</label>
                            <input type="text" class="form-control" id="nPanggilPria" name="nPanggilPria"></input>
                        </div>
                        <div class="mb-3">
                            <label for="nPanggilWanita" class="form-label">Nama Panggilan Wanita</label>
                            <input type="text" class="form-control" id="nPanggilWanita" name="nPanggilWanita"></input>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
@endsection
