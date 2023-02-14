@extends('layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Sub Kriteria</h1>
    </div>
    <div>
        <div class="row">
            <div class="col-md-5">
                <div class="card shadow mb-4">
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
            <div class="col-md-7">
                <div class="card shadow">
                    <div class="card-body">
                        {{-- <form action="" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf --}}
                            {{-- <h1>{{ $subkriteria->subkriteria->name }}</h1> --}}
                            @foreach ($subkriteria as $item)
                                <div class="form-group">
                                    <label for="name">{{ $item->name }}</label>
                                    
                                    <form action="{{ route('subkriteria.destroy', $item->id) }}" method="post" class="d-inline">
                                        {{-- @method('delete') --}}
                                        @csrf
                                        <div class="d-flex">
                                                <input type="text" name="name" id="" class="form-control mr-4" value="{{ $item->bobot }}">
                                            <button class="btn btn-danger ms-4 rounded" type="submit">
                                                x
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection