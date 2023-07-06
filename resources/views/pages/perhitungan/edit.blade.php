@extends('layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3>Update Data Alternatif Kriteria</h3>
            <h4>Alternatif: {{ $alternatif->name }}</h4>
        </div>
        <div class="card-body">
            <div class="row d-flex">
                <div class="col-md-8">
                    <form method="post" action="{{ route('nilai.update', $alternatif->id) }}">
                        @csrf
                        @method('put')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria as $k)
                                    <tr>
                                        <td>{{ $k->name }}</td>
                                        <td>
                                            <input type="hidden" name="kriteria_id[]" value="{{ $k->id }}">
                                            <select name="subkriteria_id[]" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($k->subkriteria as $sk)
                                                @php
                                                    $alternatifKriteria = DB::table('alternatif_kriteria')
                                                        ->where('alternatif_id', $alternatif->id)
                                                        ->where('kriteria_id', $k->id)
                                                        ->first();
                                                    $selected = '';
                                                    if ($alternatifKriteria && $alternatifKriteria->nilai == $sk->bobot) {
                                                        $selected = 'selected';
                                                    }
                                                @endphp
                                                <option value="{{ $sk->id }}" {{ $selected }}>{{ $sk->name }} ({{ $subkriteria_bobot[$k->id][$sk->id] }})</option>
                                                @endforeach
                                            </select>
                                        </td>   
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                <div class="col-md-4">
                    <div>
                        <p>Nilai untuk Laki-laki dan Perempuan berbeda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
@endsection