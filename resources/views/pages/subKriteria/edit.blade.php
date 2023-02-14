@extends('layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Sub Kriteria</h1>
    </div>
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
                {{-- <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button> --}}
            {{-- </form> --}}
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection