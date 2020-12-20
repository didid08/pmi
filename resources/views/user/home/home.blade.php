<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Situs Resmi PMI Lhokseumawe">
		<meta name="author" content="Technosaber">
		<link rel="shortcut icon" href="{{ asset('img/fav.png') }}" />

		<!-- Title -->
		<title>{{ $title }} - User Area | Home | {{ $subTitle }}</title>


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


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="{{ asset('vendor/daterange/daterange.css') }}" />

		<!-- iziToast -->
		<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">

		<style>
			body {
				
			}
		</style>

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
						<span class="text-white ml-2" style="font-size: 1.2em; font-weight: bold;">{{ $title }}</span>
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
								<a href="/">
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
											<a href="/">PMI Kota Lhokseumawe</a>
										</li>
										<li>
											<a href="/">Perguruan Tinggi</a>
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
											<a href="/">Mula</a>
										</li>
										<li>
											<a href="/">Madya</a>
										</li>
										<li>
											<a href="/">Wira</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="header-menu">Additional</li>
							<li class="{{ $activeMenu == 'profile' ? 'active' : '' }}">
								<a href="{{ route('user.home.profile') }}">
									<i class="fa fa-user-circle"></i>
									<span class="menu-text">Profil</span>
								</a>
							</li>
							@if (!in_array(Auth::user()->role, [1,3]))
								<li class="sidebar-dropdown">
									<a href="#">
										<i class="fa fa-users-cog"></i>
										<span class="menu-text">Manajemen User</span>
									</a>
									<div class="sidebar-submenu">
										<ul>
											@if (Auth::user()->role == 5)
												<li>
													<a href="/">Manajemen Admin</a>
												</li>
											@endif
											@if (!in_array(Auth::user()->role, [2]))
												<li>
													<a href="/">Manajemen Sekolah/Instansi</a>
												</li>
											@endif
											<li>
												<a href="/">Manajemen Anggota</a>
											</li>

										</ul>
									</div>
								</li>
							@endif
							@if (!in_array(Auth::user()->role, [1,2]))
								<li class="{{ $activeMenu == 'manajemen-data' ? 'active' : '' }}">
									<a href="">
										<i class="fa fa-chart-pie"></i>
										<span class="menu-text">Manajemen Data/Statistik</span>
									</a>
								</li>
							@endif
							@if (Auth::user()->role == 5)
								<li class="{{ $activeMenu == 'pengaturan-website' ? 'active' : '' }}">
									<a href="">
										<i class="fa fa-cog"></i>
										<span class="menu-text">Pengaturan Website</span>
									</a>
								</li>
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
								<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
									<i class="icon-bell"></i>
									<span class="count-label">8</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
									<div class="dropdown-menu-header">
										Notifications (40)
									</div>
									<ul class="header-notifications">
										<li>
											<a href="#">
												<div class="user-img away">
													<img src="img/user.png" alt="User">
												</div>
												<div class="details">
													<div class="user-title">Abbott</div>
													<div class="noti-details">Membership has been ended.</div>
													<div class="noti-date">Oct 20, 07:30 pm</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user-img busy">
													<img src="img/user.png" alt="User">
												</div>
												<div class="details">
													<div class="user-title">Braxten</div>
													<div class="noti-details">Approved new design.</div>
													<div class="noti-date">Oct 10, 12:00 am</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user-img online">
													<img src="img/user.png" alt="User">
												</div>
												<div class="details">
													<div class="user-title">Larkyn</div>
													<div class="noti-details">Check out every table in detail.</div>
													<div class="noti-date">Oct 15, 04:00 pm</div>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									<span class="user-name">{{ Auth::user()->userProfile->nama ?? explode('@', Auth::user()->email)[0] }}</span>
									<span class="avatar">
										<img src="{{ asset('img/user.png') }}" alt="avatar">
										<span class="status busy"></span>
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="{{ asset('img/user.png') }}" alt="">
											</div>
											<h5>{{ Auth::user()->userProfile->nama ?? explode('@', Auth::user()->email)[0] }}</h5>
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
		<script src="{{ asset('vendor/apex/admin/visitors.js') }}"></script>
		<script src="{{ asset('vendor/apex/admin/deals.js') }}"></script>
		<script src="{{ asset('vendor/apex/admin/income.js') }}"></script>
		<script src="{{ asset('vendor/apex/admin/customers.js') }}"></script>

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