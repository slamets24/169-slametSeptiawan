@extends('layout.dasboard')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                {{ isset($mempelaiPria) ? 'Edit Data Mempelai Pria' : 'Data Mempelai Pria' }}</h1>
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
            <form
                action="{{ isset($mempelaiPria) ? route('mPria.update', ['id' => $mempelaiPria->id, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) : route('mPria.store', ['id' => $idUndangan, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) }}"
                method="post">
                @csrf
                @if (isset($mempelaiPria))
                    @method('PUT')
                @endif
                <div class="mb-3 col-md-4">
                    <label for="nmLengkapPria" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nmLengkapPria" name="nmMempelaiPria"
                        value="{{ isset($mempelaiPria) ? $mempelaiPria->nmMempelaiPria : '' }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="nmBapak" class="form-label">Nama Bapak</label>
                    <input type="text" class="form-control" id="nmBapak" name="nmBapak"
                        value="{{ isset($mempelaiPria) ? $mempelaiPria->nmBapak : '' }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="nmIbu" class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" id="nmIbu" name="nmIbu"
                        value="{{ isset($mempelaiPria) ? $mempelaiPria->nmIbu : '' }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="" class="form-label">Rekening</label><br>
                    <div class="row">
                        <div class="col-4">
                            <select name="nRekening" class="form-select">
                                <option value="bca"
                                    {{ isset($mempelaiPria) && $mempelaiPria->nRekening == 'bca' ? 'selected' : '' }}>BCA
                                </option>
                                <option value="mandiri"
                                    {{ isset($mempelaiPria) && $mempelaiPria->nRekening == 'mandiri' ? 'selected' : '' }}>
                                    MANDIRI</option>
                                <option value="bri"
                                    {{ isset($mempelaiPria) && $mempelaiPria->nRekening == 'bri' ? 'selected' : '' }}>BRI
                                </option>
                                <option value="dana"
                                    {{ isset($mempelaiPria) && $mempelaiPria->nRekening == 'dana' ? 'selected' : '' }}>DANA
                                </option>
                            </select>
                        </div>
                        <div class="col-8">
                            <input type="" class="form-control" name="noRek"
                                value="{{ isset($mempelaiPria) ? $mempelaiPria->noRek : '' }}" id="noRek">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">{{ isset($mempelaiPria) ? 'Update' : 'Input' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
