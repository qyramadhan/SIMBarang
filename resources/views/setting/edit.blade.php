@extends('layouts.app')

@section('title', 'Inventory - Edit Data Pengaturan')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Pengaturan</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('/setting')}}">Management Pengaturan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Pengaturan</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
                        
            @if (count($errors) > 0)
                <div class="mb-3 alert alert-danger">
                    <strong>Ups!</strong> Terdapat beberapa masalah dengan masukan Anda.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div>
                                <h5 class="card-title">Edit Pengaturan</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ url('setting/update') }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Orang</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="nama_orang" class="form-control" placeholder="Nama Orang" value="{{ $setting->nama_orang }}"> 
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Posisi/Jabatan</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="posisi" class="form-control" placeholder="Posisi/Jabatan" value="{{ $setting->posisi }}">
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Atasan</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <select class="form-control" name="id_atasan">
                                            @php
                                                $pilih = "";
                                                if ($setting->id_atasan == 0) {
                                                    $pilih = "selected";
                                                }
                                            @endphp
                                            <option value="0" {{ $pilih }}>Atasan</option>
                                            @foreach ($set as $item)
                                                @php
                                                    $selected = "";
                                                    if($item->id_setting == $setting->id_atasan){
                                                        $selected = "selected";
                                                    }
                                                @endphp
                                                <option value="{{ $item->id_setting }}" {{ $selected }}>{{ $item->nama_orang }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                <div class="form-group row justify-content-end mb-0 mt-5">
                                    <div class="col-md-9">
                                        @csrf
                                        <input type="hidden" value="{{ $setting->id_setting}}" name="id_setting">
                                        <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                        <a class="btn ripple btn-secondary btn-sm" href="{{ url('/setting') }}">Kembali</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- ROW-1 CLOSED -->

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!--app-content closed-->

{!! Form::close() !!}

@endsection
@section('js')

@endsection