@extends('layouts.app')

@section('title', 'Inventory - Tambah Ruang Baru')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Tambah Ruang Baru</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('/ruang')}}">Manage Ruang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Ruang Baru</li>
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
                                <h5 class="card-title">Tambah Ruang Baru</h5>
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
                                <form action="{{ url('ruang/store') }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Kode Ruang</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="kode_ruang" class="form-control" placeholder="Kode Ruang"> 
                                    </div>
                                </div>
                        
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Ruang</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="nama_ruang" class="form-control" placeholder="Nama Ruang">
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Lantai</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                       <select class="form-control form-select select2" name="nama_lantai">
                                        @foreach ($lantai as $value)
                                            <option value="{{ $value->id_lantai }}">{{ $value->nama_lantai }}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Gedung</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                       <select class="form-control form-select select2" name="nama_gedung">
                                        @foreach ($gedung as $value)
                                            <option value="{{ $value->id_gedung }}">{{ $value->nama_gedung }}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                </div>
                        
                                <div class="form-group row justify-content-end mb-0 mt-5">
                                    <div class="col-md-9">
                                        @csrf
                                        <button type="submit" class="btn ripple btn-primary">Submit</button>
                                        <a class="btn ripple btn-secondary" href="{{ url('/ruang') }}">Kembali</a>
                                    </div>
                                </div>
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