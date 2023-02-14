@extends('layouts.main')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sub kriteria</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kriteria</th>
                            <th>Nama Sub Kriteria</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Nama </th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i =1; ?>
                        @foreach ($subkriteria as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td colspan="">{{ $item->name }}</td>

                            <td>
                                <div colspan="3">

                                    <div class="border-1">
                                        <div class="row">
                                            <div class="col-auto">
                                                @foreach ($item->subkriteria as $sub)
                                                <button class="badge btn-primary">
                                                    {{ $sub->name }}
                                                </button> 
                                                @endforeach
                                            </div>
                                        </div>
                                    </div></td>
                                </div>
                            <td colspan="1">
                                <a href="{{ route('subkriteria.create', $item->id) }}" class="btn btn-success">Tambah</a> 
                                <a href="{{ route('subkriteria.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                {{-- <form action="{{ route('subkriteria.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form> --}}
                            </td>
                        </tr
                         @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection