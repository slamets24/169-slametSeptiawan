@extends('layout.dasboard')
@section('content')

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <a href="{{ route('admin') }}" class="btn btn-success mb-3" type="button">Kembali Ke Dashboard Admin</a>
                </div>
                <div class="row">
                    @foreach ($story as $stry)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <img style="height: 270px; object-fit: cover; object-position:center; "
                                    src="{{ asset('storage/' . $stry->gambar) }}" class="card-img-top" alt="..."
                                    style="width: 100%">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $stry->judul }}</h5>
                                    <p class="card-text">{{ Str::limit($stry->cerita, 200) }}</p>
                                    <a href="" class="btn btn-primary" data-bs-target="#edit{{ $stry->id }}"
                                        data-bs-toggle="modal">
                                        Edit Cerita</a>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Edit --}}
                        <div class="modal fade" id="edit{{ $stry->id }}" tabindex="-1" aria-labelledby="editLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editLabel">Tambah Cerita Baru</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('updated.story', [$stry->id]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            {{-- <input type="" name="id" value="{{ $stry->id }}"> --}}
                                            <div class="mb-3">
                                                <label for="judul" class="form-label">Judul Cerita</label>
                                                <input type="text" class="form-control" id="judul" name="judul"
                                                    required placeholder="contoh: 2016 Atau Pertama Kenal"
                                                    value="{{ $stry->judul }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="isi" class="form-label">Isi Cerita</label>
                                                <textarea class="form-control" id="isi" name="cerita" required placeholder="Cerita Kisahmu" rows="4">{{ $stry->cerita }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="gambar" class="form-label">Gambar Cerita</label>
                                                <input type="file" class="form-control" id="gambar" name="gambar"
                                                    required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah Cerita</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endsection
