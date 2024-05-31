@extends('layout.dasboard')
@section('content')

    <body>

        <div class="container">
            <div class="card col-5 text-center mx-auto">
                <div class="card-header">
                    Selamat Datang Admin
                </div>
            </div>
            <div>
                @if (@session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <button type="button" class="btn btn-primary mr-4 mb-3" data-bs-toggle="modal"
                    data-bs-target="#modalTambahUser">+
                    Tambah User </button>
            </div>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active"href="#undangan"
                            onclick="showUndangan(this)">Undangan</a></li>
                    <li class="nav-item"><a class="nav-link " href="#user" onclick="showUser(this)">User</a>
                    </li>
                </ul>
            </nav>
            <div>
                {{-- Table Undangan --}}
                <table class="table table-responsive" id="table-undangan" style="display: block;">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Undangan</th>
                            <th scope="col">Data Mempelai</th>
                            <th scope="col">Acara</th>
                            <th scope="col">Story</th>
                            <th scope="col-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($undangan as $und)
                            @php
                                $hasAkad = null;
                                $hasResepsi = null;
                                if ($und) {
                                    $hasAkad = $und->acara->where('namaAcara', 'AKAD')->first();
                                    $hasResepsi = $und->acara->where('namaAcara', 'RESEPSI')->first();
                                }

                            @endphp
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $und->nPanggilPria }} & {{ $und->nPanggilWanita }}
                                </td>
                                <td>
                                    {{-- Button Data Mempelai --}}
                                    <button type="button"
                                        class="btn btn-success {{ isset($und->MempelaiPria->id) ? '' : 'disabled' }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalPria{{ isset($und->MempelaiPria) ? $und->MempelaiPria->id : '' }}">Pria</button>
                                    |
                                    <button type="button"
                                        class="btn btn-primary {{ isset($und->MempelaiWanita->id) ? '' : 'disabled' }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalWanita{{ isset($und->MempelaiWanita) ? $und->MempelaiWanita->id : '' }}">Wanita</button>
                                    {{-- End Button Data Mempelai --}}
                                </td>
                                <td>
                                    {{-- Button Acara --}}
                                    <button type="button" class="btn btn-primary {{ $hasAkad ? '' : 'disabled' }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalAkad{{ $hasAkad ? $hasAkad->id : '' }}">Akad</button>
                                    | <button type="button" class="btn btn-success {{ $hasResepsi ? '' : 'disabled' }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalResepsi{{ $hasResepsi ? $hasResepsi->id : '' }}">Resepsi</button>
                                    {{-- End Button Acara --}}
                                </td>
                                <td><a href="{{ isset($und->story) ? Route('show.story', [$und->id]) : '' }}"
                                        type="button" class="btn btn-success">Story</a>
                                </td>
                                <td><button type="button" class="btn btn-danger {{ isset($und->id) ? '' : 'disabled' }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ isset($und) ? $und->id : '' }}">Hapus</button>
                                </td>
                            </tr>

                            {{-- Modal Pria --}}
                            <div class="modal fade"
                                id="modalPria{{ isset($und->MempelaiPria) ? $und->MempelaiPria->id : '' }}" tabindex="-1"
                                aria-labelledby="modalPriaLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalPriaLabel">Edit Data Mempelai Pria</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ isset($und->MempelaiPria) ? Route('updated.pria') : '' }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="id"
                                                    value="{{ isset($und->MempelaiPria) ? $und->MempelaiPria->id : '' }}"
                                                    hidden>
                                                <div class="mb-3 col-md-8">
                                                    <label for="nmLengkapPria" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nmLengkapPria"
                                                        name="nmMempelaiPria"
                                                        value="{{ isset($und->MempelaiPria) ? $und->MempelaiPria->nmMempelaiPria : '' }}">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="nmBapak" class="form-label">Nama Bapak</label>
                                                    <input type="text" class="form-control" id="nmBapak" name="nmBapak"
                                                        value="{{ isset($und->MempelaiPria) ? $und->MempelaiPria->nmBapak : '' }}">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="nmIbu" class="form-label">Nama Ibu</label>
                                                    <input type="text" class="form-control" id="nmIbu" name="nmIbu"
                                                        value="{{ isset($und->MempelaiPria) ? $und->MempelaiPria->nmIbu : '' }}">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="" class="form-label">Rekening</label><br>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <select name="nRekening" class="form-select">
                                                                <option value="bca"
                                                                    {{ isset($und->MempelaiPria) && $und->MempelaiPria->nRekening == 'bca' ? 'selected' : '' }}>
                                                                    BCA
                                                                </option>
                                                                <option value="mandiri"
                                                                    {{ isset($und->MempelaiPria) && $und->MempelaiPria->nRekening == 'mandiri' ? 'selected' : '' }}>
                                                                    MANDIRI</option>
                                                                <option value="bri"
                                                                    {{ isset($und->MempelaiPria) && $und->MempelaiPria->nRekening == 'bri' ? 'selected' : '' }}>
                                                                    BRI
                                                                </option>
                                                                <option value="dana"
                                                                    {{ isset($und->MempelaiPria) && $und->MempelaiPria->nRekening == 'dana' ? 'selected' : '' }}>
                                                                    DANA
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="" class="form-control" name="noRek"
                                                                value="{{ isset($und->MempelaiPria) ? $und->MempelaiPria->noRek : '' }}"
                                                                id="noRek">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Pria --}}

                            {{-- Modal Wanita --}}
                            <div class="modal fade"
                                id="modalWanita{{ isset($und->MempelaiWanita) ? $und->MempelaiWanita->id : '' }}"
                                tabindex="-1" aria-labelledby="modalWanitaLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalWanitaLabel">Edit Data Mempelai Wanita
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="{{ isset($und->MempelaiWanita) ? Route('updated.wanita') : '' }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="id"
                                                    value="{{ isset($und->MempelaiWanita) ? $und->MempelaiWanita->id : '' }}"
                                                    hidden>
                                                <div class="mb-3 col-md-8">
                                                    <label for="nmLengkapWanita" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nmLengkapWanita"
                                                        name="nmMempelaiWanita"
                                                        value="{{ isset($und->MempelaiWanita) ? $und->MempelaiWanita->nmMempelaiWanita : '' }}">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="nmBapak" class="form-label">Nama Bapak</label>
                                                    <input type="text" class="form-control" id="nmBapak"
                                                        name="nmBapak"
                                                        value="{{ isset($und->MempelaiWanita) ? $und->MempelaiWanita->nmBapak : '' }}">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="nmIbu" class="form-label">Nama Ibu</label>
                                                    <input type="text" class="form-control" id="nmIbu"
                                                        name="nmIbu"
                                                        value="{{ isset($und->MempelaiWanita) ? $und->MempelaiWanita->nmIbu : '' }}">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="" class="form-label">Rekening</label><br>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <select name="nRekening" class="form-select">
                                                                <option value="bca"
                                                                    {{ isset($und->MempelaiWanita) && $und->MempelaiWanita->nRekening == 'bca' ? 'selected' : '' }}>
                                                                    BCA
                                                                </option>
                                                                <option value="mandiri"
                                                                    {{ isset($und->MempelaiWanita) && $und->MempelaiWanita->nRekening == 'mandiri' ? 'selected' : '' }}>
                                                                    MANDIRI</option>
                                                                <option value="bri"
                                                                    {{ isset($und->MempelaiWanita) && $und->MempelaiWanita->nRekening == 'bri' ? 'selected' : '' }}>
                                                                    BRI
                                                                </option>
                                                                <option value="dana"
                                                                    {{ isset($und->MempelaiWanita) && $und->MempelaiWanita->nRekening == 'dana' ? 'selected' : '' }}>
                                                                    DANA
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="" class="form-control" name="noRek"
                                                                value="{{ isset($und->MempelaiWanita) ? $und->MempelaiWanita->noRek : '' }}"
                                                                id="noRek">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Wanita --}}

                            {{-- Acara --}}
                            {{-- Modal Akad --}}
                            <div class="modal fade" id="modalAkad{{ $hasAkad ? $hasAkad->id : '' }}" tabindex="-1"
                                aria-labelledby="modalAkadLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalAkadLabel">Edit Acara Akad
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ isset($hasAkad) ? route('updated.acara') : '' }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id"
                                                    value="{{ isset($hasAkad) ? $hasAkad->id : '' }}" id="">
                                                <input type="hidden" name="namaAcara"
                                                    value="{{ isset($hasAkad) ? $hasAkad->namaAcara : 'AKAD' }}"
                                                    id="">
                                                <div class="row g-3">
                                                    <div class="col-md-4">
                                                        <label for="kecAcara">Kecamatan</label>
                                                        <input type="text" class="form-control" id="kecAcara"
                                                            name="kecamatan"
                                                            value="{{ isset($hasAkad) ? $hasAkad->kecamatan : '' }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="kotAcara">Kota/Kab.</label>
                                                        <input type="text" class="form-control" id="kotAcara"
                                                            name="kota"
                                                            value="{{ isset($hasAkad) ? $hasAkad->kota : '' }}" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="provAcara">Provinsi</label>
                                                        <input type="text" class="form-control" id="provAcara"
                                                            name="provinsi"
                                                            value="{{ isset($hasAkad) ? $hasAkad->provinsi : '' }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <label for="alamatLengkap">Alamat Lengkap:</label><br>
                                                <textarea rows="4" id="alamatLengkap" name="alamatLengkap" class="form-control" required>{{ isset($hasAkad) ? $hasAkad->alamatLengkap : '' }}</textarea><br>
                                                <label for="tglAcara">Tanggal Acara:</label><br>
                                                <input type="date" id="tglAcara" name="tglAcara"
                                                    class="form-control"
                                                    value="{{ isset($hasAkad) ? $hasAkad->tglAcara : '' }}" required><br>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="jamAcara">Akad dari puku:</label>
                                                        <input type='time' class="form-control" id="jamAcara"
                                                            name="aMulai"
                                                            value="{{ isset($hasAkad) ? $hasAkad->aMulai : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="jamAcaras">Akad sampai pukul:</label>
                                                        <input type='time' class="form-control" id="jamAcaras"
                                                            name="aSelesai"
                                                            value="{{ isset($hasAkad) ? $hasAkad->aSelesai : '' }}"
                                                            required />
                                                    </div>
                                                </div><br>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="linkgAcara">Link Gmaps</label>
                                                        <input type="text" id="linkgAcara" name="linkGmaps"
                                                            class="form-control"
                                                            value="{{ isset($hasAkad) ? $hasAkad->linkGmaps : '' }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="embedAcaras">Embed Goggle Maps:</label>
                                                        <input id="embedAcaras"type="text" name="embedGmaps"
                                                            class="form-control"
                                                            value="{{ isset($hasAkad) ? $hasAkad->embedGmaps : '' }}"
                                                            required>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Akad --}}
                            {{-- Modal Resepsi --}}
                            <div class="modal fade" id="modalResepsi{{ $hasResepsi ? $hasResepsi->id : '' }}"
                                tabindex="-1" aria-labelledby="modalResepsiLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalResepsiLabel">Edit Acara Resepsi
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ isset($hasResepsi) ? route('updated.acara') : '' }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id"
                                                    value="{{ isset($hasResepsi) ? $hasResepsi->id : '' }}"
                                                    id="">
                                                <input type="hidden" name="namaAcara"
                                                    value="{{ isset($hasResepsi) ? $hasResepsi->namaAcara : 'Resepsi' }}"
                                                    id="">
                                                <div class="row g-3">
                                                    <div class="col-md-4">
                                                        <label for="kecAcara">Kecamatan</label>
                                                        <input type="text" class="form-control" id="kecAcara"
                                                            name="kecamatan"
                                                            value="{{ isset($hasResepsi) ? $hasResepsi->kecamatan : '' }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="kotAcara">Kota/Kab.</label>
                                                        <input type="text" class="form-control" id="kotAcara"
                                                            name="kota"
                                                            value="{{ isset($hasResepsi) ? $hasResepsi->kota : '' }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="provAcara">Provinsi</label>
                                                        <input type="text" class="form-control" id="provAcara"
                                                            name="provinsi"
                                                            value="{{ isset($hasResepsi) ? $hasResepsi->provinsi : '' }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <label for="alamatLengkap">Alamat Lengkap:</label><br>
                                                <textarea rows="4" id="alamatLengkap" name="alamatLengkap" class="form-control" required>{{ isset($hasResepsi) ? $hasResepsi->alamatLengkap : '' }}</textarea><br>
                                                <label for="tglAcara">Tanggal Acara:</label><br>
                                                <input type="date" id="tglAcara" name="tglAcara"
                                                    class="form-control"
                                                    value="{{ isset($hasResepsi) ? $hasResepsi->tglAcara : '' }}"
                                                    required><br>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="jamAcara">Resepsi dari puku:</label>
                                                        <input type='time' class="form-control" id="jamAcara"
                                                            name="aMulai"
                                                            value="{{ isset($hasResepsi) ? $hasResepsi->aMulai : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="jamAcaras">Resepsi sampai pukul:</label>
                                                        <input type='time' class="form-control" id="jamAcaras"
                                                            name="aSelesai"
                                                            value="{{ isset($hasResepsi) ? $hasResepsi->aSelesai : '' }}"
                                                            required />
                                                    </div>
                                                </div><br>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="linkgAcara">Link Gmaps</label>
                                                        <input type="text" id="linkgAcara" name="linkGmaps"
                                                            class="form-control"
                                                            value="{{ isset($hasResepsi) ? $hasResepsi->linkGmaps : '' }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="embedAcaras">Embed Goggle Maps:</label>
                                                        <input id="embedAcaras"type="text" name="embedGmaps"
                                                            class="form-control"
                                                            value="{{ isset($hasResepsi) ? $hasResepsi->embedGmaps : '' }}"
                                                            required>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Resepsi --}}

                            {{-- Modal Undangan Hapus --}}
                            <div class="modal fade" id="modalHapus{{ $und->id }}" tabindex="-1"
                                aria-labelledby="modalHapuslLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalHapuslLabel"></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Apakah Anda Yakin Ingin Menghapus Undangan?</h5> <br>
                                            <form action="{{ route('deletedUndangan', [$und->id]) }}" method="post">
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
                            {{-- End Modal Undangan Hapus --}}
                        @endforeach
                    </tbody>
                </table>
                {{-- End Table Undangan --}}

                {{-- Table User --}}
                <table class="table table-responsive" id="table-user" style="display: none;">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">CountUndangan</th>
                            <th scope="col-2">Action</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ isset($user) && $user->idrole == 2 ? 'User' : 'Admin' }}</td>
                                <td class="text-center">{{ $user->undangan->count() }}</td>
                                <td class="text-center" colspan="2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEditUser{{ $user->id }}">
                                        Edit
                                    </button>
                                    <form action="">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalHapusUser{{ $user->id }}">Hapus</button>
                                    </form>
                                <td>
                            </tr>
                            <!-- Modal Edit User -->
                            <div class="modal fade" id="modalEditUser{{ $user->id }}" tabindex="-1"
                                aria-labelledby="editUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editUserModalLabel">Edit User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('updatedUser', [$user->id]) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" value="{{ $user->username }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" value="{{ $user->email }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="idrole" class="form-label">Role</label>
                                                    <select class="form-select" id="idrole" name="idrole">
                                                        <option value="2" {{ $user->idrole == 2 ? 'selected' : '' }}>
                                                            User</option>
                                                        <option value="1" {{ $user->idrole == 1 ? 'selected' : '' }}>
                                                            Admin</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Edit User -->

                            {{-- Modal Hapus User --}}
                            <div class="modal fade" id="modalHapusUser{{ $user->id }}" tabindex="-1"
                                aria-labelledby="modalHapusUserlLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalHapusUserlLabel"></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Apakah Anda Yakin Ingin Menghapus User {{ $user->username }}?</h5> <br>
                                            <form action="{{ route('deletedUser', [$user->id]) }}" method="post">
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
                            <!-- End Modal Hapus User -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal Form tambah User --}}
        <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="modalTambahUserLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalTambahUserLabel">Tambah Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('store.user') }}" method="post">
                            @csrf
                            <div class="mb-3 col-md-8">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="">
                            </div>
                            <div class="mb-3 col-md-8">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="">
                            </div>
                            <div class="mb-3 col-md-7">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="idrole">
                                    <option selected>Choose...</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->nRole }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-8">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="Password" name="password"
                                    value="">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Input</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Function untuk menampilkan Table undangan
            function showUndangan(tab) {
                document.getElementById('table-undangan').style.display = 'block';
                document.getElementById('table-user').style.display = 'none';
                document.querySelector('.nav-tabs .nav-link[href="#user"]').classList.remove('active');

                tab.classList.add('active');
            }

            // Function untuk menampilkan Table login
            function showUser(tab) {
                document.getElementById('table-undangan').style.display = 'none';
                document.getElementById('table-user').style.display = 'block';
                document.querySelector('.nav-tabs .nav-link[href="#undangan"]').classList.remove('active');

                tab.classList.add('active');
            }
        </script>
    @endsection
