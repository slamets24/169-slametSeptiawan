@extends('layout.dasboard')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Acara</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
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
        <div class="container">
            <div class="row" style="height: 30rem;">
                <div class="col-md-6">
                    <nav>
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active"href="#akad"
                                    onclick="showAkadForm(this)">Akad</a></li>
                            <li class="nav-item"><a class="nav-link " href="#resepsi"
                                    onclick="showResepsiForm(this)">Resepsi</a>
                            </li>
                        </ul>
                    </nav>



                    <form id="akad-form" style="display: block;" method="post"
                        action="{{ isset($akad) ? route('acara.update', ['id' => $akad->id, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) : route('acara.store', ['id' => $idUndangan, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) }}">
                        @csrf
                        @if (isset($akad))
                            @method('PUT')
                        @endif
                        <input type="hidden" name="namaAcara" value="AKAD" id="">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="kecAcara">Kecamatan</label>
                                <input type="text" class="form-control" id="kecAcara" name="kecamatan"
                                    value="{{ isset($akad) ? $akad->kecamatan : '' }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="kotAcara">Kota/Kab.</label>
                                <input type="text" class="form-control" id="kotAcara" name="kota"
                                    value="{{ isset($akad) ? $akad->kota : '' }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="provAcara">Provinsi</label>
                                <input type="text" class="form-control" id="provAcara" name="provinsi"
                                    value="{{ isset($akad) ? $akad->provinsi : '' }}" required>
                            </div>
                        </div>
                        <label for="alamatLengkap">Alamat Lengkap:</label><br>
                        <textarea rows="4" id="alamatLengkap" name="alamatLengkap" class="form-control" required>{{ isset($akad) ? $akad->alamatLengkap : '' }}</textarea><br>
                        <label for="tglAcara">Tanggal Acara:</label><br>
                        <input type="date" id="tglAcara" name="tglAcara" class="form-control"
                            value="{{ isset($akad) ? $akad->tglAcara : '' }}" required><br>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="jamAcara">Akad dari puku:</label>
                                <input type='time' class="form-control" id="jamAcara" name="aMulai"
                                    value="{{ isset($akad) ? $akad->aMulai : '' }}" required />
                            </div>
                            <div class="col-md-6">
                                <label for="jamAcaras">Akad sampai pukul:</label>
                                <input type='time' class="form-control" id="jamAcaras" name="aSelesai"
                                    value="{{ isset($akad) ? $akad->aSelesai : '' }}" required />
                            </div>
                        </div><br>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="linkgAcara">Link Gmaps</label>
                                <input type="text" id="linkgAcara" name="linkGmaps" class="form-control"
                                    value="{{ isset($akad) ? $akad->linkGmaps : '' }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="embedAcaras">Embed Goggle Maps:</label>
                                <input id="embedAcaras"type="text" name="embedGmaps" class="form-control"
                                    value="{{ isset($akad) ? $akad->embedGmaps : '' }}" required>
                            </div>
                        </div>

                        <button type="submit"
                            class="btn btn-primary mt-4">{{ isset($akad) ? 'Update' : 'Input' }}</button>
                    </form>

                    <form id="resepsi-form" style="display: none;" method="post"
                        action="{{ isset($resepsi) ? route('acara.update', ['id' => $resepsi->id, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) : route('acara.store', ['id' => $idUndangan, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) }}">
                        @csrf
                        @if (isset($resepsi))
                            @method('PUT')
                        @endif
                        <input type="hidden" name="namaAcara" value="RESEPSI" id="">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="kecAcara">Kecamatan</label>
                                <input type="text" class="form-control" id="kecAcara" name="kecamatan"
                                    value="{{ isset($resepsi) ? $resepsi->kecamatan : '' }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="kotAcara">Kota/Kab.</label>
                                <input type="text" class="form-control" id="kotAcara" name="kota"
                                    value="{{ isset($resepsi) ? $resepsi->kota : '' }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="provAcara">Provinsi</label>
                                <input type="text" class="form-control" id="provAcara" name="provinsi"
                                    value="{{ isset($resepsi) ? $resepsi->provinsi : '' }}" required>
                            </div>
                        </div>
                        <label for="alamatLengkap">Alamat Lengkap:</label><br>
                        <textarea rows="4" id="alamatLengkap" name="alamatLengkap" class="form-control" required fixed>{{ isset($resepsi) ? $resepsi->alamatLengkap : '' }}</textarea><br>
                        <label for="tglAcara">Tanggal Acara:</label><br>
                        <input type="date" id="tglAcara" name="tglAcara" class="form-control"
                            value="{{ isset($resepsi) ? $resepsi->tglAcara : '' }}" required><br>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="jamAcara">Resepsi dari puku:</label>
                                <input type='time' class="form-control" id="jamAcara" name="aMulai"
                                    value="{{ isset($resepsi) ? $resepsi->aMulai : '' }}" required />
                            </div>
                            <div class="col-md-6">
                                <label for="jamAcaras">Resepsi sampai pukul:</label>
                                <input type='time' class="form-control" id="jamAcaras" name="aSelesai"
                                    value="{{ isset($resepsi) ? $resepsi->aSelesai : '' }}" required />
                            </div>
                        </div><br>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="linkgAcara">Link Gmaps</label>
                                <input type="text" id="linkgAcara" name="linkGmaps" class="form-control"
                                    value="{{ isset($resepsi) ? $resepsi->linkGmaps : '' }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="embedAcaras">Embed Goggle Maps:</label>
                                <input id="embedAcaras"type="text" name="embedGmaps" class="form-control"
                                    value="{{ isset($resepsi) ? $resepsi->embedGmaps : '' }}" required>
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-primary mt-4">{{ isset($resepsi) ? 'Update' : 'Input' }}</button>
                    </form>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $('#time').timepicker({
                        timeFormat: 'HH:mm:ss',
                        interval: 30,
                        minTime: '0',
                        maxTime: '11:59pm',
                        defaultTime: '12',
                        startTime: '00:00',
                        dynamic: false,
                        dropdown: true,
                        scrollbar: true
                    });
                });
            </script>
            <script>
                function showAkadForm(tab) {
                    document.getElementById('akad-form').style.display = 'block';
                    document.getElementById('resepsi-form').style.display = 'none';
                    document.querySelector('.nav-tabs .nav-link[href="#resepsi"]').classList.remove('active');

                    tab.classList.add('active');
                }


                function showResepsiForm(tab) {
                    document.getElementById('akad-form').style.display = 'none';
                    document.getElementById('resepsi-form').style.display = 'block';
                    document.querySelector('.nav-tabs .nav-link[href="#akad"]').classList.remove('active');

                    tab.classList.add('active');
                }
            </script>
        </div>
    @endsection
