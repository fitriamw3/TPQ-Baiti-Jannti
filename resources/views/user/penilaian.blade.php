@extends('user.layout.app')

@section('content')

<section id="nilai" class="nilai">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Nilai Santri</h2>
            <p>Rekap nilai mengaji dan evaluasi santri.</p>
        </div>

        @if($nilai->isEmpty())
            <p class="text-muted">Tidak ada data nilai.</p>
        @else
            <div class="table-responsive" data-aos="fade-up">
                <table id="nilaiTable" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Juz</th>
                            <th scope="col">Surah</th>
                            <th scope="col">Ayat Mulai</th>
                            <th scope="col">Ayat Akhir</th>
                            <th scope="col">Nilai Tajwid</th>
                            <th scope="col">Nilai Kelancaran</th>
                            <th scope="col">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilai as $nilaiItem)
                            <tr>
                                <td>{{ $nilaiItem->juz }}</td>
                                <td>{{ $nilaiItem->nama_surah }}</td>
                                <td>{{ $nilaiItem->ayat_mulai }}</td>
                                <td>{{ $nilaiItem->ayat_akhir }}</td>
                                <td>{{ $nilaiItem->nilai_tajwid }}</td>
                                <td>{{ $nilaiItem->nilai_lancar }}</td>
                                <td>{{ $nilaiItem->catatan ?? 'Tidak ada catatan' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- DataTables JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#nilaiTable').DataTable({
            "pagingType": "full_numbers",
            "pageLength": 10,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>

@endsection

<style>
    .section-title h2 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .section-title p {
        font-size: 1rem;
        color: #6c757d;
    }

    #nilaiTable {
        margin-top: 1rem;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
</style>
