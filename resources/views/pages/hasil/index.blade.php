@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="card">
            <h3 class="mx-auto mt-4">Hasil Seleksi Atlet</h3>
            <div class="table-responsive p-4">
                <div class="mb-3">
                    <label for="eventFilter" class="form-label">Filter Event:</label>
                    <select id="eventFilter" class="form-select">
                        <option value="">Semua Event</option>
                        <option value="popprov">Popprov</option>
                        <option value="prapon">Prapon</option>
                    </select>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Kode</th>
                            <th>Alternatif</th>
                            <th>Event</th>
                            <th>Tingkat Sabuk</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($alternatifs->sortByDesc('nilai') as $alternatif )
                            <tr data-event="{{ $alternatif->event }}">
                                <td>{{ $no++ }}</td>
                                <td>{{ $alternatif->kode }}</td>
                                <td>{{ $alternatif->name }}</td>
                                <td>{{ $alternatif->event }}</td>
                                <td>{{ $alternatif->tingkat }}</td>
                                <td>{{ $alternatif->nilai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('print') }}" id="print" class="btn btn-primary">Print</a>
            </div>
        </div>
    </div>
    <script>
        const printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function() {
            print();
        });
    
        const eventFilter = document.getElementById('eventFilter');
        const rows = document.querySelectorAll('tbody tr');
    
        eventFilter.addEventListener('change', function() {
            const selectedEvent = this.value;
            let rank = 1; // Inisialisasi nomor ranking
    
            rows.forEach(row => {
                const eventCell = row.querySelector('td:nth-child(4)'); // Mendapatkan sel dengan indeks kolom 4 (event)
    
                if (selectedEvent === '' || eventCell.innerText === selectedEvent) {
                    row.style.display = 'table-row';
                    row.querySelector('td:first-child').innerText = rank++; // Mengatur nomor ranking dan meningkatkannya
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    
@endsection
