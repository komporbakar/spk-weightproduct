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
                    <label for="name">Kode ALternaitf</label>
                    <input type="text" name="kode" id="" class="form-control" value="{{ $alternatif->kode ?? old('kode') }}">
                </div>
                <div class="form-group">
                    <label for="name">Nama Alternatif</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $alternatif->name }}">
                </div>
                
                <div class="form-group">
                    <label for="name">Jenis Kelamin</label>
                    <select name="jenis" id="" value="{{ $alternatif->id }}" class="form-control">
                        <option value="{{ $alternatif->jenis }}" disabled selected>
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