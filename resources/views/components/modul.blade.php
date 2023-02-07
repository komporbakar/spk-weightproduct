{{-- Modul Tambah Kriteria --}}

    <div class="modal py-5" id="TambahKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog py-4" role="document">
            <div class="modal-content mb-4" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="tambahdata.php" method="post">
                        <div class="container" class="form-group">
                            <div class="row">
                                <div class="col-12">
                                <label for="">Kode Kriteria</label>
                                <input type="text" name="kode_kriteria" class="form-control" placeholder="C1">
                            </div>
                            <div class="col-12">
                                <label for="">Nama Kriteria</label>
                                <input type="text" name="nama_kriteria" class="form-control" placeholder="Tinggi Badan">
                            </div>
                            <div class="col-12">
                                <label for="">Bobot</label>
                                <input type="number" name="bobot" class="form-control" placeholder="40">
                            </div>
                            <div class="col-12 pl-auto">
                                <button class="btn btn-primary mt-3 mx-auto" name="tambahkriteria">
                                    Save
                                </button>
                            </div>
                        </div>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>

{{-- Modal Alternatif --}}

