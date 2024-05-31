@extends('layouts.app')

@section('title', 'Inventory - Tambah Roles')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Roles</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route ('roles.index')}}">Management Roles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Roles</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            
            @if (count($errors) > 0)
                <div class="mb-3 alert alert-danger">
                    <strong>Whoops!</strong> Terdapat beberapa masalah dengan masukan Anda.<br><br>
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
                                <h5 class="card-title">Tambah Roles</h5>
                            </div>
                        </div>

                        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                        <div class="card-body">
                            <div class="form-content">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Name:</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                        <div class="form-content">
                        <div class="row row-xs align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="mg-b-0 tx-semibold">Permission:</label>
                            </div>
                            <div class="col-md-9 row mb-3 mt-2">
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                @endforeach
                                <div class="form-group row mb-0 mt-3">
                                    <div class="col-md-9">
                                        <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                        <a class="btn ripple btn-secondary btn-sm" href="{{ route('roles.index') }}">Kembali</a>
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

@endsection
@section('js')

@endsection