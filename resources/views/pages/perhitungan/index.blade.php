@extends('layouts.main')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perhitungan</h6>
            <a href="{{ route('hasil') }}" class="btn btn-success mt-3" ">Proses Penilaian</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {{-- <h5>Dummy</h5> --}}
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Kode Alternatif</th>
                            @foreach ($kriteria as $krit )
                            <th>{{ $krit->kode }}</th>
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1; ?>
                        @forelse ($alternatif as $index => $alt)
                        {{-- @foreach ($alternatif as $item) --}}
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td colspan="">{{ $alt->name }}</td>
                            <td colspan="">{{ $alt->kode }}</td>
                            @php
                            $nilai = [];
							foreach ($kriteria as $k) {
                                    $ks = $alt->kriteria->find($k->id);
									$nilai[] = $ks ? $ks->pivot->nilai : 0;
								}
							@endphp
                            @foreach ($nilai as $n)
                            <td colspan="">
                                {{ $n }}
                            </td>
                            @endforeach
                            <td colspan="1">
                                <a href="{{ route('nilai.edit', $alt->id) }}" class="btn btn-info">Penilaian</a>
                                <form action="" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                        
                        @empty
                        
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="{{ $kriteria->count() + 4 }}">Belum ada data alternatif.</td>
						</tr>
							
						@endforelse
                        </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection