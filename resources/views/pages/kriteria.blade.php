@extends('layouts.main')

@section('content')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
                <a href="#" class="btn btn-success mt-3"  data-toggle="modal" data-target="#TambahKriteria">+ Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h1>{{ $jml_alternatif->nama_alternatif }}</h1>
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
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                           
                            <?php $i =1; ?>    
                            @foreach ($kriteria as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->nama_kriteria }}</td>
                                <td>{{ $item->bobot }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td colspan="1">
                                    <a href="#" class="btn btn-warning" >Ubah</a>
                                    <a href="#" class="btn btn-danger" >Hapus</a>
                                </td>
                            </tr
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection