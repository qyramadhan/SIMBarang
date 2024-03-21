@extends('layouts.app')

@section('title', 'Inventory - Detail User')

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
						<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Management Users</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail Users</li>
					</ol>
				</div>
			</div>
			<!-- PAGE-HEADER END -->

			<!-- ROW-1 OPEN -->
			<div class="row">
				<div class="col-xl-12 col-md-12">
					<div class="card">
						<div class="card-body pb-4">
							<div class=" profile-cover">
								<div class="profile-cover__action-2 profile-2">
									<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/15.jpg" style="background: url(&quot;../assets/images/users/15.jpg&quot;) center center;"></span>
									<a href="{{ route('users.edit',$user->id) }}"><i class="mdi mdi-pencil"></i></a>
								</div>
								<div class="profile-info">
									<h3 class="mb-1">{{ $user->name }}</h3>
										@if(!empty($user->getRoleNames()))
										@foreach($user->getRoleNames() as $v)
											<h6>{{ $v }}</h6>
										@endforeach
										@endif
								</div>
								<div class="row">
									<div class="col-xl-6">
										<div class="profile-tabs">
											<nav class="nav nav-pills flex-column flex-sm-row pt-4">
												<a class="nav-link active" data-bs-toggle="tab" href="#edit">Detail User</a>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ROW-1 CLOSED -->

			<!-- Row-2 OPEN-->
			<div class="row">
				<div class="col-xl-12 col-xxl-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Tentang</h3>
						</div>
						<div class="card-body">
                            <div class="form-content">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
										<label class="text-muted">{{ $user->name }}</label>
									</div>

									<div class="form-content">
										<div class="row row-xs align-items-center mb-4">
											<div class="col-md-3">
												<label class="mg-b-0 tx-semibold">Roles</label>
											</div>
											<div class="col-md-9 mg-t-5 mg-md-t-0">
												<label class="mb-0 text-muted">
													@if(!empty($user->getRoleNames()))
													@foreach($user->getRoleNames() as $v)
													<label class="label label-success">{{ $v }}</label>
													@endforeach
													@endif
												</label>
											</div>
										
											<div class="form-content">
												<div class="row row-xs align-items-center mb-4">
													<div class="col-md-3">
														<label class="mg-b-0 tx-semibold">Email</label>
													</div>
													<div class="col-md-9 mg-t-5 mg-md-t-0">
														<p class="mb-0 text-muted">{{ $user->email }}</p>
													</div>
													<div class="col-md-3">
														<label class="mg-b-0 tx-semibold">Username</label>
													</div>
													<div class="col-md-9 mg-t-5 mg-md-t-0">
														<p class="mb-0 text-muted">{{ $user->username }}</p>
													</div>
												</div>
											</div>
									<div class="card-body">
										<a class="btn ripple btn-secondary btn-sm" href="{{ route('users.index') }}">Kembali</a>
									</div>
								</div>
							</div>
						</div>
			<!-- Row-2 CLOSED-->

		</div>
		<!-- CONTAINER CLOSED -->

	</div>
</div>
<!--app-content closed-->

@endsection
@section('js')

@endsection