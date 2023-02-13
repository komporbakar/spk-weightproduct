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

                <form action="{{ route('kriteria.store') }}" method="post">
                    @csrf
                    <div class="container" class="form-group">
                        <div class="row">
                            <div class="col-12">
                            <label for="">Kode Kriteria</label>
                            <input type="text" name="kode" class="form-control" placeholder="C1">
                        </div>
                        <div class="col-12">
                            <label for="">Nama Kriteria</label>
                            <input type="text" name="name" class="form-control" placeholder="Tinggi Badan">
                        </div>
                        <div class="col-12">
                            <label for="">Bobot</label>
                            <input type="number" name="bobot" class="form-control" placeholder="40">
                        </div>
                        <div class="col-12">
                            <label for="">Type</label>
                            <select name="type" id="" class="form-control">
                                <option disabled selected>-- Pilih Type --</option>
                                <option value="0">BENEFIT</option>
                                <option value="1">COST</option>
                            </select>
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

{{-- Modul Delete Kriteria --}}
<div class="modal fade text-left" id="DeleteKriteria" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Delete Temp Modal </h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        Yakin akan hapus data ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" class="btn btn-primary ml-1"
                            data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


{{-- Modal Alternatif --}}

