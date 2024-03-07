@extends('layouts.app')

@section('title', 'Inventory - Edit Data Kategori')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Edit Data Kategori</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('/ruang')}}">Manage Kategori</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
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
                                <h5 class="card-title">Edit Data Kategori</h5>
                            </div>
                        </div>

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
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
                                <form action="{{ url('kategori/update') }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Kode Kategori</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="kode_kategori" class="form-control" placeholder="Name" value="{{ $kategori->kode_kategori }}"> 
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Kategori</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="nama_kategori" class="form-control" placeholder="Name" value="{{ $kategori->nama_kategori }}">
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Jenis</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <select class="form-control" name="nama_jenis">
                                            @foreach ($jenis as $v)
                                                @php
                                                    $statusA = "";
                                                    if($v->id_jenis == $kategori->nama_jenis){
                                                        $statusA = "selected";
                                                    }
                                                @endphp
                                                <option value="{{ $v->id_jenis }}" {{ $statusA }}>{{ $v->nama_jenis }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Golongan</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <select class="form-control" name="nama_golongan">
                                            @foreach ($golongan as $v)
                                                @php
                                                    $statusA = "";
                                                    if($v->id_golongan == $kategori->nama_golongan){
                                                        $statusA = "selected";
                                                    }
                                                @endphp
                                                <option value="{{ $v->id_golongan }}" {{ $statusA }}>{{ $v->nama_golongan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-end mb-0 mt-5">
                                    <div class="col-md-9">
                                        @csrf
                                        <input type="hidden" value="{{ $kategori->id_kategori }}" name="id_kategori">
                                        <button type="submit" class="btn ripple btn-primary">Simpan</button>
                                        <a class="btn ripple btn-secondary" href="{{ url('/kategori') }}">Kembali</a>
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