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
		<title>PMI Lhokseumawe - User Area</title>


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

	</head>

	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
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
					<a href="{{ route('user.dashboard') }}" class="logo">
						<img src="{{ asset('img/pmi.png') }}" alt="PMI Lhokseumawe" />
						<span class="text-white ml-2" style="font-size: 1.2em; font-weight: bold;">PMI Lhokseumawe</span>
					</a>
				</div>
				<!-- Sidebar brand end  -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

					<!-- sidebar menu start -->
					<div class="sidebar-menu">
						<ul>
							<li class="active">
								<a href="{{ route('user.dashboard') }}">
									<i class="fa fa-dashboard"></i>
									<span class="menu-text">Dashboard</span>
								</a>
							</li>
							<li>
								<a href="/">
									<i class="fa fa-sitemap"></i>
									<span class="menu-text">PMI-Struktural</span>
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
							<li>
								<a href="/">
									<i class="fa fa-building-o"></i>
									<span class="menu-text">TSR</span>
								</a>
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
							<input type="text" class="search-query" placeholder="Search here ...">
							<i class="icon-search1"></i>
						</div>
						<!-- Custom search end -->

						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown">
								<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
									<i class="icon-box"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
									<div class="dropdown-menu-header">
										Tasks (05)
									</div>	
									<ul class="header-tasks">
										<li>
											<p>#20 - Dashboard UI<span>90%</span></p>
											<div class="progress">
												<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
													<span class="sr-only">90% Complete (success)</span>
												</div>
											</div>
										</li>
										<li>
											<p>#35 - Alignment Fix<span>60%</span></p>
											<div class="progress">
												<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
													<span class="sr-only">60% Complete (success)</span>
												</div>
											</div>
										</li>
										<li>
											<p>#50 - Broken Button<span>40%</span></p>
											<div class="progress">
												<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
													<span class="sr-only">40% Complete (success)</span>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</li>
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
									<span class="user-name">User</span>
									<span class="avatar">
										<img src="{{ asset('img/user.png') }}" alt="avatar">
										<span class="status busy"></span>
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="img/user.png" alt="Admin Template">
											</div>
											<h5>User</h5>
											<p>User</p>
										</div>
										<a href="user-profile.html"><i class="icon-user1"></i> Profil Saya</a>
										<a href="user-profile.html"><i class="icon-lock1"></i> Ubah Password</a>
										<a href="{{ route('user.logout') }}"><i class="icon-log-out1"></i> Keluar</a>
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

	</body>
</html>