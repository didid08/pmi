@extends('user.home.home')

@section('header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item active"><i class="fa fa-users-cog ml-2 mr-2"></i>{{ $subTitle }}</li>
	</ol>
@endsection

@section('custom-css')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link href="{{ asset('vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />

    <!-- Steps Wizard CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/wizard/jquery.steps.css') }}" />

    <!-- Bootstrap Select CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">-->
@endsection

@section('custom-script')
    <!-- Data Tables -->
    <script src="{{ asset('vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
    
    <!-- Custom Data tables -->
    <script src="{{ asset('vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/custom/fixedHeader.js') }}"></script>

    <!-- Steps wizard JS -->
    <script src="{{ asset('vendor/wizard/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('vendor/wizard/jquery.steps.custom.js') }}"></script>

    <!-- Bootstrap Select JS -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>-->

    <script>
        var backToListUser = () => {
            $("#tambah-user-header-title").html("");
            $("#tambah-user-header").css("display", "none");
            $(".tambah-user").css("display", "none");

            $("#list-user-menu").fadeIn();
            $("#list-user").fadeIn();
        };
    </script>
@endsection

@section('main')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="table-container mb-2" id="container-top">
                <ul class="nav nav-pills ml-2" id="list-user-menu" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="anggota-tab" data-toggle="pill" href="#anggota-tabel" role="tab" aria-controls="anggota-tabel" aria-selected="true">Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="instansi-tab" data-toggle="pill" href="#instansi-tabel" role="tab" aria-controls="instansi-tabel" aria-selected="false">Sekolah/Instansi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="moderator-tab" data-toggle="pill" href="#moderator-tabel" role="tab" aria-controls="moderator-tabel" aria-selected="false">Moderator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="admin-tab" data-toggle="pill" href="#admin-tabel" role="tab" aria-controls="admin-tabel" aria-selected="false">Admin</a>
                    </li>
                </ul>

                <!-- Tambah User Header -->
                <div id="tambah-user-header" style="display: none">
                    <button class="btn btn-primary ml-2 mr-2" onclick="backToListUser()"><i class="fa fa-arrow-left mr-2"></i>Balik</button>
                    <span id="tambah-user-header-title" style="font-size: 1.1em"></span>
                </div>
                
            </div>
            <div class="table-container" id="container-bottom">
                <div class="tab-content" id="list-user">
                    <!-- Anggota -->
                    <div class="tab-pane fade show active" id="anggota-tabel" role="tabpanel" aria-labelledby="anggota-tab">
                        <button class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#tambah-anggota"><i class="fa fa-plus mr-2"></i>Tambah Anggota</button>
                        @include('user.home.subhome.user-management.anggota.tambah-anggota')
                        <div class="table-responsive">
                            <table class="table custom-table" id="tabel-anggota">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>Kode Anggota</th>
                                        <th>Sekolah/Instansi</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semuaAnggota as $index => $anggota)
                                        <tr>
                                            <td class="text-center">{{ $index+1 }}.</td>
                                            <td>{{ $anggota->dataAnggota->nama ?? '-' }}</td>
                                            <td>{{ $anggota->dataAnggota->kelamin ?? '-' }}</td>
                                            <td>{{ $anggota->email ?? '-' }}</td>
                                            <td>{{ $anggota->dataAnggota->kode_anggota ?? '-' }}</td>
                                            <td>{{ $anggota->dataAnggota->instansi ?? '-' }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-primary" id="edit-anggota">Edit</button>
                                                <button class="btn btn-white" id="hapus-anggota">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Instansi -->
                    <div class="tab-pane fade" id="instansi-tabel" role="tabpanel" aria-labelledby="instansi-tab">
                        <button class="btn btn-outline-primary mb-4"><i class="fa fa-plus mr-2"></i>Tambah Sekolah/Instansi</button>
                        <div class="table-responsive">
                            <table class="table custom-table" id="tabel-instansi">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Sekolah/Instansi</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Nomor Anggota PMR</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semuaInstansi as $index => $instansi)
                                        <tr>
                                            <td class="text-center">{{ $index+1 }}.</td>
                                            <td>{{ $instansi->dataInstansi->nama ?? '-' }}</td>
                                            <td>{{ $instansi->email ?? '-' }}</td>
                                            <td>{{ $instansi->dataInstansi->alamat_instansi ?? '-' }}</td>
                                            <td>{{ $instansi->dataInstansi->nomor_anggota_pmr ?? '-' }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-primary" id="edit-instansi">Edit</button>
                                                <button class="btn btn-white" id="hapus-instansi">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Moderator -->
                    <div class="tab-pane fade" id="moderator-tabel" role="tabpanel" aria-labelledby="moderator-tab">
                        <button class="btn btn-outline-primary mb-4"><i class="fa fa-plus mr-2"></i>Tambah Moderator</button>
                        <div class="table-responsive">
                            <table class="table custom-table" id="tabel-moderator">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Email</th>
                                        <th>Nickname</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semuaModerator as $index => $moderator)
                                        <tr>
                                            <td class="text-center">{{ $index+1 }}.</td>
                                            <td>{{ $moderator->email ?? '-' }}</td>
                                            <td>{{ $moderator->nickname ?? '-' }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-primary" id="edit-moderator">Edit</button>
                                                <button class="btn btn-secondary" id="ubah-role-moderator">Ubah Role</button>
                                                <button class="btn btn-white" id="hapus-moderator">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Admin -->
                    <div class="tab-pane fade" id="admin-tabel" role="tabpanel" aria-labelledby="admin-tab">
                        <button class="btn btn-outline-primary mb-4"><i class="fa fa-plus mr-2"></i>Tambah Admin</button>
                        <div class="table-responsive">
                            <table class="table custom-table" id="tabel-admin">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Email</th>
                                        <th>Nickname</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semuaAdmin as $index => $admin)
                                        <tr>
                                            <td class="text-center">{{ $index+1 }}.</td>
                                            <td>{{ $admin->email ?? '-' }}</td>
                                            <td>{{ $admin->nickname ?? '-' }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-primary" id="edit-admin">Edit</button>
                                                <button class="btn btn-secondary" id="ubah-role-admin">Ubah Role</button>
                                                <button class="btn btn-white" id="hapus-admin">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection