@extends('layouts.main')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Alternatif</h6>
            <a href="#" class="btn btn-success mt-3"  data-toggle="modal" data-target="#TambahAlternatif">+ Tambah Data</a>
        </div>
        Jumlah Data Kriteria ({{ $kriteria->count() }})
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i =1; ?>
                        @foreach ($alternatif as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td colspan="">{{ $item->nama_alternatif }}</td>
                            <td colspan="2">
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

    <div class="modal py-5" id="TambahAlternatif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog py-4" role="document">
            <div class="modal-content mb-4" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="tambahalternatif.php" method="post">
                        <div class="container" class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Nama Kriteria</label>
                                    <input type="text" name="nama_alternatif" class="form-control" placeholder="Asep Ceun">
                                </div>
                                <div class="col-12 pl-auto">
                                    <button class="btn btn-primary mt-3 mx-auto" name="tambahalternatif">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
@endsection