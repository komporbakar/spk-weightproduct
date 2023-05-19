@extends('layouts.main')

@section('content')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
                <a href="#" class="btn btn-success mt-3" data-toggle="modal" data-target="#TambahKriteria">+ Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h5>Jumlah Data Kriteria ({{ $kriteria->count() }})</h5>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i =1; ?>    
                            @foreach ($kriteria as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>
                                        @if ($item->type == 0)
                                            Benefit
                                        @else
                                            Cost
                                        @endif
                                    </td>
                                    <td colspan="1">
                                        <a href="{{ route('kriteria.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('kriteria.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection