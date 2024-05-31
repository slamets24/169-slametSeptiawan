@extends('layout.dasboard')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dokumentasi</h1>
        </div>
        <div>
            @if (@session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (@session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show col-md-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form
                action="{{ isset($documentation) ? route('dokumentasi.update', ['id' => $documentation->id, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) : route('dokumentasi.store', ['id' => $idUndangan, 'nPanggilPria' => $nPanggilPria, 'nPanggilWanita' => $nPanggilWanita]) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($documentation))
                    @method('PUT')
                @endif
                <div class="mb-3 col-md-4">
                    <label for="fFormalPria" class="form-label">Foto Formal Mempelai Pria</label>
                    <input type="file" class="form-control" id="fFormalPria" name="fFormalPria">
                    @error('fFormalPria')
                        <div class="invalid-feeback text-danger" style="font-size: 13px;padding-left: 20px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="fFormalWanita" class="form-label">Foto Formal Mempelai Wanita</label>
                    <input type="file" class="form-control" id="fFormalWanita" name="fFormalWanita">
                    @error('fFormalWanita')
                        <div class="invalid-feeback text-danger" style="font-size: 13px;padding-left: 20px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="fWedding" class="form-label">Foto Prewedding</label>
                    <input type="file" class="form-control" id="fWedding" name="fWedding[]" multiple>
                    @error('fWedding')
                        <div class="invalid-feeback text-danger" style="font-size: 13px;padding-left: 20px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" value="">
                <div class="col-12">
                    <button type="submit" class="btn btn-success">{{ isset($documentation) ? 'Update' : 'Input' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
