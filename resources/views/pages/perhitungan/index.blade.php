@extends('layouts.main')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perhitungan</h6>
            <a href="{{ route('alternatif.create') }}" class="btn btn-success mt-3" ">+ Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <h5>Dummy</h5>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i =1; ?>
                        {{-- @foreach ($alternatif as $item) --}}
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td colspan=""></td>
                            <td colspan=""></td>
                            <td colspan="1">
                                <a href="" class="btn btn-warning">Edit</a>
                                <form action="" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr
                         {{-- @endforeach --}}
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection