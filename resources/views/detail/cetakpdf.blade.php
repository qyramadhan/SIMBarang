<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice {{ now()->format('d/m/Y') }}</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        .table-responsive {
            width: 100%;
            overflow: hidden;
        }
        .table {
            width: 100%;
            table-layout: fixed;
            word-wrap: break-word;
            border-collapse: collapse;
        }
        /* .table img {
            display: block;
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
        } */
        .table td {
            text-align: center;
            vertical-align: middle;
            border: 1px, solid black;
        }
        .table, .table th, .table td {
            border: 1px solid black !important;
        }
        .table .logo-cell {
            padding: 0;
            width: 10%;
        }
        .table .title-cell {
            width: 80%;
        }
        .table .barcode-cell {
            width: 10%;
        }
        @page {
            size: A4;
            margin: 20mm;
        }
        @media print {
            body {
                width: 210mm;
                height: 297mm;
            }
            .table {
                width: 100%;
                margin: 0 auto;
                
            }
        }
    </style>
</head>
<body>
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="card-body">
                            <div class="table-responsive">
                                @foreach($detail as $value)
                                    <table class="table table-bordered text-nowrap mb-4" style="margin-bottom: 20px;">
                                        @php
                                            $txt = $value->no_urut;
                                            $no  = (int) $txt;
                                            $number = NULL;
    
                                            if($no <= 9){
                                                $number = "0-0-".$no;
                                            }elseif($no >= 10 && $no <= 99 ){
                                                $number = "0-".substr($no,0,1).'-'.substr($no,1,1);
                                            }elseif($no >= 100 && $no <= 999 ){
                                                $number = substr($no,0,1).'-'.substr($no,1,1).'-'.substr($no,2,1);
                                            }elseif($no >= 1000){
                                                $number = substr($no,0,1).'-'.substr($no,1,1).'-'.substr($no,2,1).'-'.substr($no,3,1);
                                            }
                                        @endphp
                                    <thead>
                                    <tr>
                                        <td rowspan="2" colspan="2" class="logo-cell" style="padding: 4px;">
                                            <img src="{{ public_path('assets/images/brand/unperba.png') }}" alt="Logo Universitas" width="80px;">
                                        </td>
                                        <td colspan="10" class="title-cell card-title middle">Inventaris Universitas Perwira Purbalingga</td>
                                        <td rowspan="2" colspan="2" class="logo-cell" style="padding: 4px;">
                                            <img src="data:image/png;base64, {!! base64_encode(QrCode::size(1500)->generate(
                                                $value->nama_golongan . "\n" .
                                                $value->nama_jenis . "\n" .
                                                $value->nama_barang . "\n" .
                                                $value->no_urut . "\n" .
                                                $value->tahun . "\n" .
                                                $value->nama_lantai . "\n" .
                                                $value->nama_ruang . "\n" .
                                                $value->nama_anggaran )) !!}"/>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>{{ $value->kode_golongan }}</td>
                                            <td>{{ $value->kode_jenis }}</td>
                                            <td>{{ $value->kode_barang }}</td>
                                            @php
                                                $numberStr = str_pad($number, 3, '0', STR_PAD_LEFT);
                                                $digit1 = substr($numberStr, 0, 1);
                                                $digit2 = substr($numberStr, 2, 1);
                                                $digit3 = substr($numberStr, 4, 1);
                                            @endphp
                                            <td>{{ $digit1 }}</td>
                                            <td>{{ $digit2 }}</td>
                                            <td>{{ $digit3 }}</td>
                                            <td>{{ substr($value->tahun,2) }}</td>
                                            <td>{{ $value->kode_lantai }}</td>
                                            <td>{{ $value->kode_ruang }}</td>
                                            <td>{{ $value->kode_anggaran }}</td>
                                        </tr>
                                    </thead>
                                </table>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>