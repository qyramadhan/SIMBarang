@extends('layouts.app')

@section('title', 'Inventory - Tambah Users')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Users</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route ('roles.index')}}">Management Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Users</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
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
                                <h5 class="card-title">Tambah Users</h5>
                            </div>
                        </div>

                        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
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

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-3">
                                    <label class="mg-b-0 tx-semibold">E-Mail:</label>
                                </div>
                                <div class="col-md-9 mg-t-5 mg-md-t-0">
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-3">
                                    <label class="mg-b-0 tx-semibold">Username:</label>
                                </div>
                                <div class="col-md-9 mg-t-5 mg-md-t-0">
                                {!! Form::text('email', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-3">
                                    <label class="mg-b-0 tx-semibold">Password:</label>
                                </div>
                                <div class="col-md-9 mg-t-5 mg-md-t-0">
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-3">
                                    <label class="mg-b-0 tx-semibold">Confirm Password:</label>
                                </div>
                                <div class="col-md-9 mg-t-5 mg-md-t-0">
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-3">
                                    <label class="mg-b-0 tx-semibold">Role</label>
                                </div>
                                <div class="col-md-9 mg-t-5 mg-md-t-0">
                                    <select class="form-control form-select select2" id="roles" name="roles_id" data-placeholder="Select">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                     @endforeach
                                    </select>
                                    <div class="form-group row mb-0 mt-5">
                                        <div class="col-md-9">
                                            <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                            <a class="btn ripple btn-secondary btn-sm" href="{{ route('users.index') }}">Kembali</a>
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