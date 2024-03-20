@extends('layouts.app')

@section('title', 'Inventory - Edit Data Kartu Barang')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Edit Kartu Barang</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('/kartu')}}">Management Kartu Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kartu Barang</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div>
                                <h5 class="card-title">Edit Kartu Barang</h5>
                            </div>
                        </div>

                        @if (count($errors) > 0)
                        <div class="mb-3 alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                             @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ url('kartu/update') }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Ruang</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <select class="form-control" name="id_ruang">
                                            @foreach ($ruang as $v)
                                                @php
                                                    $statusA = "";
                                                    if($v->id_ruang == $kartu->id_ruang){
                                                        $statusA = "selected";
                                                    }
                                                @endphp
                                                <option value="{{ $v->id_ruang }}" {{ $statusA }}>{{ $v->nama_ruang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Keterangan</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{ $kartu->keterangan }}">
                                    </div>
                                </div>

                                <div class="form-group row justify-content-end mb-0 mt-5">
                                    <div class="col-md-9">
                                        @csrf
                                        <input type="hidden" value="{{ $kartu->id_kartu }}" name="id_kartu">
                                        <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                        <a class="btn ripple btn-secondary btn-sm" href="{{ url('/kartu') }}">Kembali</a>
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