@extends('user.home.home')

@section('header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item active">Profil Saya</li>
	</ol>
@endsection

@section('custom-css')
    <style>
        #profile-menu a {
            display: block;
            text-align: left;
            margin-bottom: 0.2em;
        }

        #pengaturan-akun {
            display: none;
        }
    </style>
@endsection

@section('custom-script')
    <script>
        // Editor Function
        ["data-anggota", "password"].forEach(element => {
            $("#edit-"+element).click(function () {
                $("#"+element+" input").removeAttr("readonly");
                $("#"+element+" input").each(function () {
                    $(this).attr("placeholder", "Masukkan "+this.id.replace("-", " ").replace("-", " ").toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    }));
                    $(this).attr("oldvalue", $(this).val());
                });
                $("#edit-"+element).css("display", "none");
                $("#batal-edit-"+element).fadeIn();
                $("#simpan-"+element).fadeIn();
            })

            $("#batal-edit-"+element).click(function () {
                $("#"+element+" input").attr("readonly");
                $("#"+element+" input").each(function () {
                    $(this).attr("placeholder", "-");
                    $(this).attr("readonly", "readonly");
                    $(this).val($(this).attr("oldvalue"));
                    $(this).removeAttr("oldvalue");
                });
                $("#edit-"+element).fadeIn();
                $("#batal-edit-"+element).css("display", "none");
                $("#simpan-"+element).css("display", "none");
            });
        });

        function showHideElement (buttonId, toShow, toHide) {
            $("#profile-menu a").removeClass("btn-primary");
            $("#profile-menu a").addClass("btn-white");
            $("#"+buttonId).removeClass("btn-white");
            $("#"+buttonId).addClass("btn-primary");
            toShow.forEach(element => {
                $("#"+element).fadeIn();
            });
            toHide.forEach(element => {
                $("#"+element).css("display", "none");
            });
        }

        function resetUbahPasswordInput() {
            $("#ubah-password input").val("");
        }
    </script>
@endsection

@section('main')
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="{{ asset('img/user.png') }}" alt="Le Rouge Admin" />
                            </div>
                            <h5 class="user-name">User</h5>
                            <h6 class="user-email">{{ Auth::user()->email }}</h6>
                        </div>
                        <div id="profile-menu">
                            <a href="javascript:void(0)" class="btn btn-primary" id="data-diri" onclick="showHideElement('data-diri', ['data-anggota', 'data-domisili-identitas'], ['ubah-password'])">Data diri</a>
                            <a href="javascript:void(0)" class="btn btn-white" id="pengaturan-akun" onclick="showHideElement('pengaturan-akun', ['ubah-password'], ['data-anggota', 'data-domisili-identitas'])">Pengaturan Akun</a>
                            <a href="javascript:void(0)" class="btn btn-white">Kontak Darurat</a>
                            <a href="javascript:void(0)" class="btn btn-white">Riwayat Keanggotaan</a>
                            <a href="javascript:void(0)" class="btn btn-white">Pendidikan Formal</a>
                            <a href="javascript:void(0)" class="btn btn-white">Diklat PMI</a>
                            <a href="javascript:void(0)" class="btn btn-white">Sertifikasi</a>
                            <a href="javascript:void(0)" class="btn btn-white">Keahlian/Keterampilan</a>
                            <a href="javascript:void(0)" class="btn btn-white">Riwayat Organisasi</a>
                            <a href="javascript:void(0)" class="btn btn-white">Riwayat Penghargaan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="data-anggota">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title">
                        Data Anggota
                        <div id="data-anggota-editor" style="display: inline; position: absolute; right: 1em">
                            <button type="button" id="edit-data-anggota" class="btn btn-primary"><i class="fa fa-pencil-alt mr-2"></i>Edit</button>
                            <button id="batal-edit-data-anggota" type="button" class="btn btn-white" style="display: none">Batal</button>
                            <button id="simpan-data-anggota" type="submit" class="btn btn-primary" style="display: none">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="kode-anggota">Kode Anggota</label>
                                <input type="text" class="form-control" id="kode-anggota" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kode-anggota-lama">Kode Anggota Lama</label>
                                <input type="text" class="form-control" id="kode-anggota-lama" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kelamin">Kelamin</label>
                                <input type="text" class="form-control" id="kelamin" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no-hp">No. HP</label>
                                <input type="text" class="form-control" id="no-hp" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" placeholder="-" readonly>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="tempat-lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat-lahir" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggal-lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal-lahir" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jenis-identitas">Jenis Identitas</label>
                                <input type="text" class="form-control" id="jenis-identitas" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nomor-induk-kependudukan">Nomor Induk Kependudukan</label>
                                <input type="text" class="form-control" id="nomor-induk-kependudukan" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" class="form-control" id="agama" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label for="golongan-darah">Golongan Darah</label>
                                <input type="text" class="form-control" id="golongan-darah" placeholder="-" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="ubah-password">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title">
                        Ubah Password
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="password-sekarang">Password Sekarang</label>
                                <input type="password-sekarang" class="form-control" id="password-sekarang" placeholder="Masukkan Password Sekarang">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="password-baru">Password Baru</label>
                                <input type="password-baru" class="form-control" id="password-baru" placeholder="Masukkan Password Baru">
                            </div>
                            <div class="form-group">
                                <label for="password-baru-ulang">Ulangi Password Baru</label>
                                <input type="password-baru-ulang" class="form-control" id="password-baru-ulang" placeholder="Ulangi Password Baru">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right">
                            <button type="button" class="btn btn-white" onclick="resetUbahPasswordInput()">Reset Input</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gutters mt-4" id="data-domisili-identitas">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title">Data Domisili</div>
                </div>
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Desa/Kelurahan</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>RT</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>RW</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>No. Telp</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Domisili Status Kepemilikan</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status Tinggal</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status Aktif</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title">Data Identitas</div>
                </div>
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Desa/Kelurahan</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>RT</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>RW</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                            <div class="form-group">
                                <label>Identitas Status Kepemilikan</label>
                                <input type="text" class="form-control" placeholder="-" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection