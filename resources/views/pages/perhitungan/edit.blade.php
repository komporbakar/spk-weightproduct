@extends('layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Update Data Alternatif Kriteria</h3>
            <h4>Alternatif: {{ $alternatif->name }}</h4>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                                            <option value="{{ $sk->id }}"
                                                @foreach ($alternatif_kriteria as $ak)
                                                    @if ($sk->kriteria_id == $k->id && $alternatif->subkriteria_id == $sk->id)
                                                        selected
                                                    @endif
                                                @endforeach
                                                >{{ $sk->name }} ({{ $subkriteria_bobot[$k->id][$sk->id] }})</option>
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
        </div>
    </div>



<!-- /.container-fluid -->
@endsection