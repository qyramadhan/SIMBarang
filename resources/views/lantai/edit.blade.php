@extends('layouts.app')

@section('title', 'Inventory - Edit Data Lantai')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Edit Data Lantai</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('/lantai')}}">Manage Lantai</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                <h5 class="card-title">Edit Data Lantai</h5>
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
                                <form action="{{ url('lantai/update') }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Kode Lantai</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="kode_lantai" class="form-control" placeholder="Name" value="{{ $lantai->kode_lantai }}"> 
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Lantai</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="nama_lantai" class="form-control" placeholder="Name" value="{{ $lantai->nama_lantai }}">
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Gedung</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <select class="form-control" name="nama_gedung">
                                            @foreach ($gedung as $v)
                                                @php
                                                    $statusA = "";
                                                    if($v->id_gedung == $lantai->nama_gedung){
                                                        $statusA = "selected";
                                                    }
                                                @endphp
                                                <option value="{{ $v->id_gedung }}" {{ $statusA }}>{{ $v->nama_gedung }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                <div class="form-group row justify-content-end mb-0 mt-5">
                                    <div class="col-md-9">
                                        @csrf
                                        <input type="hidden" value="{{ $lantai->id_lantai }}" name="id_lantai">
                                        <button type="submit" class="btn ripple btn-primary">Simpan</button>
                                        <a class="btn ripple btn-secondary" href="{{ url('/lantai') }}">Kembali</a>
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