
			<!-- App-Header -->
			<div class="app-header header sticky">
				<div class="container-fluid main-container">
					<div class="d-flex">
						<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /></svg>
						</a>
						<a class="logo-horizontal " href="index.html">
							<img src="../assets/images/brand/unperba.png" class="header-brand-img desktop-logo" alt="logo">
							<img src="../assets/images/brand/unperba.png" class="header-brand-img light-logo1" alt="logo">
						</a>
						<!-- sidebar-toggle-->
						
						<div class="d-flex order-lg-2 ms-auto header-right-icons header-search-icon">
							<button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
								data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
								aria-controls="navbarSupportedContent-4" aria-expanded="false"
								aria-label="Toggle navigation">
								<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
									class="navbar-toggler-icon">
									<path d="M0 0h24v24H0V0z" fill="none" />
									<path
										d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
								</svg>
							</button>
							<div class="navbar navbar-collapse responsive-navbar p-0">
								<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
									<div class="d-flex">
										<div class="dropdown profile-1 d-flex">
											<a href="javascript:void(0);" data-bs-toggle="dropdown"
												class="nav-link icon leading-none d-flex">
												<img src="../assets/images/users/user.png" alt="profile-user"
													class="avatar profile-user brround cover-image">
											</a>
											<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
												<a class="dropdown-item" href="profile.html">
													<i class="dropdown-icon mdi mdi-account-outline"></i> Profil
												</a>
												<a class="dropdown-item" href="{{ url('logout')}}">
													<i class="dropdown-icon mdi mdi-logout-variant"></i> Keluar
												</a>
											</div>
										</div>
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- App-Header -->