@extends('layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Alternatif</h1>
    </div>
    
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('alternatif.update', $alternatif->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="kode">Kode Alternatif</label>
                    <input type="text" name="kode" id="" class="form-control" value="{{ $alternatif->kode ?? old('kode') }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Nama Alternatif</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $alternatif->name }}" required>
                </div>

                <div class="form-group">
                    <label for="name">Tingkat Sabuk</label>
                    <select name="tingkat" id="" value="{{ $alternatif->tingkat }}" class="form-control">
                        <option value="kyu 2">Kyu 2</option>
                        <option value="kyu 1">Kyu 1</option>
                        <option value="dan 2">Dan 2</option>
                        <option value="dan 1">Dan 1</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="name">Jenis Kelamin</label>
                    <select name="jenis" id="" value="{{ $alternatif->id }}" class="form-control">
                        <option value="{{ $alternatif->jenis }}" disabled selected required>
                            @if ($alternatif->jenis)
                            Perempuan
                            @else
                            Laki-Laki
                            @endif
                        </option>
                        <option value="0">Laki-Laki</option>
                        <option value="1">Perempuan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection