@extends('layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Sub Alternatif</h1>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('subkriteria.store', $kriteria->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nam Sub Kriteria</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <input type="text" name="bobot" id="" class="form-control" value="{{ old('bobot') }}">
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