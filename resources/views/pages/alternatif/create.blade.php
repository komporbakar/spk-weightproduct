@extends('layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Alternatif</h1>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('alternatif.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Kode ALternaitf</label>
                    <input type="text" name="kode" id="" class="form-control" value="{{ old('kode') }}">
                </div>
                <div class="form-group">
                    <label for="name">Nama Alternatif</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="name">Tingkat Sabuk</label>
                    <select name="tingkat" id="tingkat" class="form-control">
                        <option value="kyu 2">Kyu 2</option>
                        <option value="kyu 1">Kyu 1</option>
                        <option value="dan 2">Dan 2</option>
                        <option value="dan 1">Dan 1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Jenis Kelamin</label>
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="0">Laki-Laki</option>
                        <option value="1">Perempuan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection