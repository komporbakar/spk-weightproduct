@extends('layouts.main')

@section('content')
    <div class="container">
       <div class="card">
           <h3 class="mx-auto mt-4">Hasil Seleksi Atlet</h3>
           <div class="table-responsive p-4">
            <table class="table table-bordered">
                <thead>
                    <th>Rank</th>
                    <th>Kode</th>
                    <th>Alternatif</th>
                    <th>Tingkat Sabuk</th>
                    <th>Nilai</th>
                </thead>
                <tbody>
                    <?php $no=1 ?>
                    @foreach ($alternatifs->sortByDesc('nilai') as $alternatif )
                    <tr>
    
                        <td>{{ $no++ }}</td>
                        <td>{{ $alternatif->kode }}</td>
                        <td>{{ $alternatif->name }}</td>
                        <td>{{ $alternatif->tingkat }}</td>
                        <td>{{ $alternatif->nilai }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('print') }}"  id="print" class="btn btn-primary">Print</a>
           </div>
       </div>
    </div>
    <script>
        const print = getElementbyId('print')
        print.addEventListener('onclick', function(){
            print()
        })
    </script>
@endsection