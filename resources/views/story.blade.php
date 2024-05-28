@extends('layout.dasboard')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Cerita</h1>
        </div>
        <div>
            @if (@session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (@session()->has('edit'))
                <div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
                    {{ session('edit') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-grid gap-2 col-5 mb-4">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+
                    Tambah Cerita Baru</button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Cerita Baru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="{{ route('story.store', ['id' => $idUndangan, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Cerita</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required
                                        placeholder="contoh: 2016 Atau Pertama Kenal">
                                </div>
                                <div class="mb-3">
                                    <label for="isi" class="form-label">Isi Cerita</label>
                                    <textarea class="form-control" id="isi" name="cerita" required placeholder="Cerita Kisahmu" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar Cerita</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah Cerita</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- STROY --}}
        <div class="row">
            @if ($story)
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
                                <a href="" class="ml-4" data-bs-toggle="modal"
                                    data-bs-target="#ModalHapus{{ $stry->id }}"><i
                                        class="fas fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Hapus --}}
                    <div class="modal fade" id="ModalHapus{{ $stry->id }}" tabindex="-1"
                        aria-labelledby="ModalHapuslLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ModalHapuslLabel"></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Apakah Anda Yakin Ingin Menghapus Cerita ini?</h5> <br>
                                    <form
                                        action="{{ Route('story.destroy', ['id' => $stry->id, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
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
                                    <form
                                        action="{{ route('story.update', ['id' => $stry->id, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
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
            @endif
        </div>
    </div>
@endsection
