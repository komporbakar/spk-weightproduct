@extends('layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Kriteria</h1>
    </div>

    <!-- Content Row -->
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Kode Kriteria</label>
                    <input type="text" name="kode" id="" class="form-control" value="{{ $kriteria->kode }}">
                </div>
                <div class="form-group">
                    <label for="name">Nama Kriteria</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $kriteria->name }}">
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot Kriteria</label>
                    <input type="text" name="bobot" id="" class="form-control" value="{{ $kriteria->bobot }}">
                </div>
                <div class="form-group">
                    <label for="image">Type Kriteria</label>
                    <select name="type" id="" value="{{ $kriteria->id }}" class="form-control">
                        <option value="{{ $kriteria->type }}" disabled selected>
                            @if ($kriteria->type)
                                BENEFIT
                            @else
                                COST
                            @endif
                        </option>
                        <option value="0">BENEFIT</option>
                        <option value="1">COST</option>
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