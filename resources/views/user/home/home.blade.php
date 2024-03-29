<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Situs Resmi PMI Lhokseumawe">
		<meta name="author" content="Technosaber">
		<link rel="shortcut icon" href="{{ asset('img/fav.ico') }}" />

		<!-- Title -->
		<title>{{ $title }} | User Area - Home - {{ $subTitle }}</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
		<!-- FontAwesome -->
		<script src="https://kit.fontawesome.com/c5f8c2ba34.js" crossorigin="anonymous"></script>
		<!-- Main css -->
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">
		<!-- iziToast -->
		<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">

		<!-- Custom CSS -->
		@yield('custom-css')
	</head>

	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper" style="display: none">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->


		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			<nav id="sidebar" class="sidebar-wrapper">
				
				<!-- Sidebar brand start  -->
				<div class="sidebar-brand">
					<a href="{{ route('user.home.dashboard') }}" class="logo">
						<img src="{{ asset('img/pmi.png') }}" alt="PMI Lhokseumawe" />
						<div class="ml-2" style="display: inline-block">
							<span class="text-white" style="font-family: 'nowBold';font-size: 1.5em;">PMI</span><br>
							<span class="text-white" style="font-family: 'nowRegular'; font-size: 1.1em;">Lhokseumawe</span>
						</div>
					</a>
				</div>
				<!-- Sidebar brand end  -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

					<!-- sidebar menu start -->
					<div class="sidebar-menu">
						<ul>
							<li class="header-menu">General</li>
							<li class="{{ $activeMenu == 'dashboard' ? 'active' : '' }}">
								<a href="{{ route('user.home.dashboard') }}">
									<i class="fa fa-home"></i>
									<span class="menu-text">Dashboard</span>
								</a>
							</li>
							<li class="{{ $activeMenu == 'pmi-struktural' ? 'active' : '' }}">
								<a href="/">
									<i class="fa fa-sitemap"></i>
									<span class="menu-text">PMI-Struktural</span>
								</a>
							</li>
							<li>
								<a href="{{ route('user.home.tsr') }}">
									<i class="fa fa-flag"></i>
									<span class="menu-text">TSR</span>
								</a>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="fa fa-building-o"></i>
									<span class="menu-text">KSR</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="{{ route('user.home.ksr.pmi-kota-lhokseumawe') }}">PMI Kota Lhokseumawe</a>
										</li>
										<li>
											<a href="{{ route('user.home.ksr.perguruan-tinggi') }}">Perguruan Tinggi</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="fa fa-plus-circle"></i>
									<span class="menu-text">PMR</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="{{ route('user.home.pmr.mula') }}">Mula</a>
										</li>
										<li>
											<a href="{{ route('user.home.pmr.madya') }}">Madya</a>
										</li>
										<li>
											<a href="{{ route('user.home.pmr.wira') }}">Wira</a>
										</li>
									</ul>
								</div>
							</li>
							@if (Auth::user()->role != 0)
								<li class="header-menu">Additional</li>
								<li class="{{ $activeMenu == 'profile' ? 'active' : '' }}">
									<a href="{{ route('user.home.profile') }}">
										<i class="fa fa-user-circle"></i>
										<span class="menu-text">Profil</span>
									</a>
								</li>
								@if (!in_array(Auth::user()->role, [0,1,2,3]))
									<li class="{{ $activeMenu == 'manajemen-user' ? 'active' : '' }}">
										<a href="{{ route('user.home.user-management') }}">
											<i class="fa fa-users-cog"></i>
											<span class="menu-text">Manajemen User</span>
										</a>
									</li>
								@endif
								<!--@if (!in_array(Auth::user()->role, [1,2]))
									<li class="{{ $activeMenu == 'manajemen-data' ? 'active' : '' }}">
										<a href="">
											<i class="fa fa-chart-pie"></i>
											<span class="menu-text">Manajemen Data/Statistik</span>
										</a>
									</li>
								@endif-->
								@if (Auth::user()->role == 5)
									<li class="{{ $activeMenu == 'pengaturan-website' ? 'active' : '' }}">
										<a href="">
											<i class="fa fa-cog"></i>
											<span class="menu-text">Pengaturan Website</span>
										</a>
									</li>
								@endif
							@endif
						</ul>
					</div>
					<!-- sidebar menu end -->

				</div>
				<!-- Sidebar content end -->
				
			</nav>
			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Header start -->
				<header class="header">
					<div class="toggle-btns">
						<a id="toggle-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
						<a id="pin-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
					</div>
					<div class="header-items">
						<!-- Custom search start -->
						<div class="custom-search">
							<input type="text" class="search-query" placeholder="Cari">
							<i class="icon-search1"></i>
						</div>
						<!-- Custom search end -->

						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									@if (Auth::user()->role == 1)
										<span class="user-name">{{ Auth::user()->dataAnggota->nama ?? Auth::user()->email }}</span>
									@elseif (Auth::user()->role == 2)
										<span class="user-name">{{ Auth::user()->dataInstansi->nama ?? Auth::user()->email }}</span>
									@else
										<span class="user-name">{{ Auth::user()->email }}</span>
									@endif
									<span class="avatar">
										<img src="{{ asset('img/user.png') }}" alt="avatar">
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="{{ asset('img/user.png') }}" alt="">
											</div>
											@if (Auth::user()->role == 1)
												<h5>{{ Auth::user()->dataAnggota->nama ?? Auth::user()->email }}</h5>
											@elseif (Auth::user()->role == 2)
												<h5>{{ Auth::user()->dataInstansi->nama ?? Auth::user()->email }}</h5>
											@else
												<h5>{{ Auth::user()->email }}</h5>
											@endif
											@php
												$roleName = [
													'Tamu',
													'Anggota',
													'Sekolah/Instansi',
													'Moderator',
													'Admin',
													'Master'
												];
												$roleIcon = [
													'a',
													'fa-user',
													'fa-school',
													'fa-user-tie',
													'fa-user-shield',
													'fa-user-secret'
												];
											@endphp
											<p>{{-- <iclass="mr-2fa$roleIcon[Auth::user()->role]"></i>--}}{{ $roleName[Auth::user()->role] }}</p>
											{{-- <p>{{ substr(Auth::user()->email, 0, 15) }}{{ strlen(Auth::user()->email) > 15 ? '...' : '' }}</p> --}}
										</div>
										<a href="{{ route('user.home.profile') }}"><i class="icon-user1"></i> Profil</a>
										<a href="{{ route('user.auth.logout') }}"><i class="icon-log-out1"></i> Keluar</a>
									</div>
								</div>
							</li>
						</ul>						
						<!-- Header actions end -->
					</div>
				</header>
				<!-- Header end -->

				<!-- Page header start -->
				<div class="page-header">
					@yield('header')
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">
					@yield('main')
				</div>
				<!-- Main container end -->

			</div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->

		<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('js/moment.js') }}"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="{{ asset('vendor/slimscroll/slimscroll.min.js') }}"></script>
		<script src="{{ asset('vendor/slimscroll/custom-scrollbar.js') }}"></script>

		<!-- Daterange -->
		<script src="{{ asset('vendor/daterange/daterange.js') }}"></script>
		<script src="{{ asset('vendor/daterange/custom-daterange.js') }}"></script>

		<!-- Polyfill JS -->
		<script src="{{ asset('vendor/polyfill/polyfill.min.js') }}"></script>

		<!-- Apex Charts -->
		<script src="{{ asset('vendor/apex/apexcharts.min.js') }}"></script>

		<!-- Main JS -->
		<script src="{{ asset('js/main.js') }}"></script>

		<!-- iziToast -->
		<script src="{{ asset('js/iziToast.min.js') }}"></script>

		<!-- Global Custom Script -->
		<script>
			$('[data-toggle="tooltip"]').tooltip();

			@if (session('success'))
				iziToast.success({
					message: '{{ session('success') }}'
				});
			@endif

			@if ($errors->all())
				@foreach ($errors->all() as $message)
					iziToast.error({
						title: 'Error',
						message: '{{ $message }}'
					});
				@endforeach
			@endif
		</script>

		<!-- Custom Script -->
		@yield('custom-script')

	</body>
</html>