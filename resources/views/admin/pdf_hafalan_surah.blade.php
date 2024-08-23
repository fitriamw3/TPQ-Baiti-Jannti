<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hafalan Surah - {{ $santri->nama_santri }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px 60px;
            line-height: 1.6;
        }

        .letterhead {
            text-align: center;
            margin-bottom: 20px;
        }

        .letterhead img {
            width: 80px;
            margin-bottom: 10px;
        }

        .letterhead h1 {
            font-size: 22px;
            margin: 0;
            font-weight: bold;
        }

        .letterhead p {
            margin: 0;
            font-size: 14px;
        }

        hr {
            border: none;
            border-top: 2px solid #000;
            margin: 20px 0;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            font-size: 20px;
            margin: 0;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .content {
            margin-bottom: 40px;
        }

        .content p {
            font-size: 16px;
            text-align: justify;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-size: 16px;
        }

        .table th {
            background-color: #f0f0f0;
            font-size: 17px;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
        }

        .footer .signature {
            margin-top: 80px;
            text-align: right;
        }

        .footer .name {
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 16px;
        }

        .footer .position {
            font-style: italic;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="letterhead">
        <h1>TPQ Baiti Jannati</h1>
        <p>Jl. Sungai Raya Dalam, Komp. Srikandi 2, Kalimantan Barat</p>
        <p>Telepon: +62 812-5641-416 | Email: masjid.tpq.baitijannati@gmail.com</p>
    </div>
    
    <hr>
    
    <div class="header">
        <h2>Laporan Hafalan Surah</h2>
        <p>Nama Santri: {{ $santri->nama_santri }}</p>
    </div>
    
    <div class="content">
        @if($santri->hafalans->isEmpty())
            <p>Tidak ada hafalan untuk santri ini pada periode ini.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Surah</th>
                        <th>Jumlah Ayat</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($santri->hafalans->whereNotNull('surahs_id') as $hafalan)
                        <tr>
                            <td>{{ $hafalan->surah->nama }}</td>
                            <td>{{ $hafalan->jumlah_ayat }}</td>
                            <td>{{ $hafalan->nilai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
    <div class="footer">
        <p>Pontianak, {{ \Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</p>
        <div class="signature">
            <p class="name">Siti Marfuah</p>
            <p class="position">Pengurus TPQ Baiti Jannati</p>
        </div>
    </div>
</body>
</html>
