@extends('user.home.home')

@section('header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Dashboard</li>
	</ol>
@endsection

@section('custom-script')
	<!-- JVectorMap -->
	<script src="{{ asset('vendor/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
	<!-- Map Indonesia -->
	<script src="{{ asset('vendor/jvectormap/indonesia-modified.js') }}"></script>
	<!-- Map Aceh -->
	<script src="{{ asset('vendor/jvectormap/indonesia-adm2-1.js') }}"></script>
	<!-- COVID Configuration Indonesia -->
	<script src="{{ asset('vendor/jvectormap/custom/covid-indonesia.js') }}"></script>
	<!-- COVID Configuration Aceh -->
	<script src="{{ asset('vendor/jvectormap/custom/covid-aceh.js') }}"></script>

	<!-- Data Tables -->
    <script src="{{ asset('vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
    
    <!-- Custom Data tables -->
    <script>
		$('#kasus-covid-prov-id').DataTable({
			"language": {
				"lengthMenu": "Tampilkan _MENU_ Baris Per Halaman",
				"info": "Menampilkan Halaman _PAGE_ dari _PAGES_",
			}
		});
	</script>
@endsection

@section('main')
	<!--<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 mt-4">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Peta Persebaran COVID-19 di Aceh</div>
			</div>
			<div class="card-body">
				<div id="peta-covid-aceh" class="chart-height"></div>
			</div>
		</div>
	</div>-->
	<div class="row gutters">
		<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Bagan Kasus COVID-19 di Indonesia (2 Maret - 28 Mei)</div>
				</div>
				<div class="card-body">
					<div id="bagan-covid-indonesia"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Peta Positif COVID-19 di Indonesia</div>
				</div>
				<div class="card-body">
					<div id="peta-covid-indonesia" class="chart-height"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="table-container p-4">
				<div class="t-header">Tabel Kasus COVID-19 Setiap Provinsi di Indonesia</div>
				<div class="table-responsive">
					<table id="kasus-covid-prov-id" class="table custom-table">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Provinsi</th>
								<th class="text-center">Positif</th>
								<th class="text-center">Sembuh</th>
								<th class="text-center">Meninggal</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($kasusCovidProvId as $index => $item)
								<tr>
									<td class="text-center">{{ $index+1 }}</td>
									<td>{{ $item['Provinsi'] }}</td>
									<td class="text-center">{{ $item['Kasus_Posi'] }}</td>
									<td class="text-center">{{ $item['Kasus_Semb'] }}</td>
									<td class="text-center">{{ $item['Kasus_Meni'] }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection