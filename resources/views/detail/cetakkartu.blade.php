<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice {{ now()->format('d/m/Y') }}</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style type="text/css">
    .tg td, .tg th {
        font-size: 12px;
        border: 1px solid black;
        text-align: center;
    }

    .tg {
        width: 100%; 
        border-collapse: collapse;
    }

    .tg td,.tg th {
        width: auto; 
    }

    body {
        margin: 0;
        padding: 0;
    }

    .table-responsive {
        width: 100%;
        margin: 0;
        padding: 0;
    }
</style>
</head>
<body>
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h6 style="text-align: center;"> KARTU INVENTARIS BARANG </h6><br>
                            @foreach($detail->take(1) as $value)
                            <h6> LOKASI : {{ $value->nama_lantai }}</h6>
                            <h6> RUANG  : {{ $value->nama_ruang }}</h6>
                            @endforeach
                            <table class="tg">
                                <thead>
                                    <tr>
                                        <th class="tg-0lax" rowspan="2">No</th>
                                        <th class="tg-0lax" colspan="8" rowspan="2">Kode Barang</th>
                                        <th class="tg-0lax" rowspan="2">Nama Barang</th>
                                        <th class="tg-0lax" rowspan="2">Jumlah <br>Barang</th>
                                        <th class="tg-0lax" colspan="3">Keadaan Barang</th>
                                        <th class="tg-0lax" rowspan="2">Keterangan</th>
                                    </tr>
                                    <tr>
                                        <th class="tg-0lax">B</th>
                                        <th class="tg-0lax">KB</th>
                                        <th class="tg-0lax">RB</th>
                                    </tr>
                                </thead>
                                @foreach($detail as $key => $value)
                                <tbody>
                                    <tr>
                                        <td class="tg-0lax">{{ ++$key }}<</td>
                                        <td class="tg-0lax">{{ $value->kode_golongan }}</td>
                                        <td class="tg-0lax">{{ $value->kode_jenis }}</td>
                                        <td class="tg-0lax">{{ $value->kode_barang }}</td>
                                        <td class="tg-0lax">{{ $value->no_urut }}</td>
                                        <td class="tg-0lax">{{ substr($value->tahun,2) }}</td>
                                        <td class="tg-0lax">{{ $value->kode_lantai }}</td>
                                        <td class="tg-0lax">{{ $value->kode_ruang }}</td>
                                        <td class="tg-0lax">{{ $value->kode_anggaran }}</td>
                                        <td class="tg-0lax">{{ $value->nama_barang }}</td>
                                        <td class="tg-0lax">{{ $value->jumlah_barang }}</td>
                                        <td class="tg-0lax"> 
                                            @if ($value->kondisi_barang == 1)
                                                V
                                            @endif
                                        </td>
                                        <td class="tg-0lax">
                                            @if ($value->kondisi_barang == 2)
                                                V
                                            @endif
                                        </td>
                                        <td class="tg-0lax">
                                            @if ($value->kondisi_barang == 3)
                                                V
                                            @endif
                                        </td>
                                        <td class="tg-0lax">{{ $value->keterangan }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table><br>
                            @php
                                use Carbon\Carbon;
                            @endphp
                            <div style="font-family:sans-serif; padding-left: 770px;"> 
                                Purbalingga, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                            </div>
                            <div style="font-family:sans-serif; width: 50%; float: left; padding-left: 10px;"> 
                                KaBag Umum & Perlengkapan
                            </div>
                            <div style="font-family:sans-serif; width: 50%; float: left; padding-left: 290px;"> 
                                Pencatat Barang
                            </div><br><br><br><br>
                            <div style="clear: both;"></div>
                            <div style="font-family:sans-serif; width: 50%; float: left; padding-left: 30px;"> 
                                Dewi Wijayanti, S.Sos
                            </div>
                            <div style="font-family:sans-serif; width: 50%; float: left; padding-left: 270px;"> 
                                Yudha Rahadianto
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>