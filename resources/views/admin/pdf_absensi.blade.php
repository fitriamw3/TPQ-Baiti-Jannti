<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rekap Absensi Santri</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
            line-height: 1.5;
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
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 10px;
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
        <h2>Laporan Rekap Absensi Santri</h2>
        <p>Periode: {{ $periode }}</p>
    </div>

    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Santri</th>
                    <th>Hadir</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alpha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekapAbsensi as $index => $rekap)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $rekap->santri->nama_santri }}</td>
                        <td>{{ $rekap->hadir_count }}</td>
                        <td>{{ $rekap->sakit_count }}</td>
                        <td>{{ $rekap->izin_count }}</td>
                        <td>{{ $rekap->alpha_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
