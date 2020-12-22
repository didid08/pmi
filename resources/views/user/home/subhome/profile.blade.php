@extends('user.home.home')
@section('header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item active">{{ $subTitle }}</li>
	</ol>
@endsection

@section('custom-css')
    <style>
        #profile-menu a {
            display: block;
            text-align: left;
            margin-bottom: 0.2em;
        }
    </style>
@endsection

@section('custom-script')
    <script>
        // Editor Function
        var activePanel = 'data-diri';
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

        function editDataAnggota (option) {
            if (option == 'show') {
                $("#data-anggota input").removeAttr("readonly");
                $("#data-anggota select").removeAttr("disabled");
                $("#data-anggota input").each(function () {
                    $(this).attr("placeholder", "Masukkan "+this.id.replace("-", " ").replace("-", " ").toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    }));
                    $(this).attr("oldvalue", $(this).val());
                });
                $("#data-anggota select").each(function () {
                    $(this).attr("oldvalue", $(this).val());
                });
                $("#edit-data-anggota").css("display", "none");
                $("#batal-edit-data-anggota").fadeIn();
                $("#simpan-data-anggota").fadeIn();
            } else if (option == 'cancel') {
                $("#data-anggota input").each(function () {
                    $(this).attr("placeholder", "-");
                    $(this).attr("readonly", "readonly");
                    $(this).val($(this).attr("oldvalue"));
                    $(this).removeAttr("oldvalue");
                    $(this).removeClass('is-invalid');
                });
                $("#data-anggota select").each(function () {
                    $(this).attr("disabled", "disabled");
                    $(this).val($(this).attr("oldvalue"));
                    $(this).removeAttr("oldvalue");
                    $(this).removeClass('is-invalid');
                });
                $("#edit-data-anggota").fadeIn();
                $("#batal-edit-data-anggota").css("display", "none");
                $("#simpan-data-anggota").css("display", "none");
            }
        }
        @if ($errors->data_anggota->all())
            if (activePanel == 'data-diri') {
                editDataAnggota('show');
                var oldValue = {
                    'kode-anggota': '{{ old('kode-anggota') }}',
                    'kode-anggota-lama': '{{ old('kode-anggota-lama') }}',
                    'nama': '{{ old('nama') }}',
                    'kelamin': '{{ old('kelamin') }}',
                    'no-hp': '{{ old('no-hp') }}',
                    'email': '{{ old('email') }}',
                    'tempat-lahir': '{{ old('tempat-lahir') }}',
                    'tanggal-lahir': '{{ old('tanggal-lahir') }}',
                    'jenis-identitas': '{{ old('jenis-identitas') }}',
                    'nomor-induk-kependudukan': '{{ old('nomor-induk-kependudukan') }}',
                    'agama': '{{ old('agama') }}',
                    'golongan-darah': '{{ old('golongan-darah') }}'
                };
                $("#data-anggota input").each(function () {
                    $(this).val(oldValue[$(this).attr("id")]);
                });
                $("#data-anggota select").each(function () {
                    $(this).val(oldValue[$(this).attr("id")]);
                });
            }

            iziToast.error({
                message: 'Terdapat kesalahan dalam memperbarui data anda'
            });
        @endif

        function editDataInstansi (option) {
            if (option == 'show') {
                $("#data-instansi input").removeAttr("readonly");
                $("#data-instansi select").removeAttr("disabled");
                $("#data-instansi input").each(function () {
                    $(this).attr("placeholder", "Masukkan "+this.id.replace("-", " ").replace("-", " ").toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    }));
                    $(this).attr("oldvalue", $(this).val());
                });

                $("#nomor-kelompok-pmr").attr("readonly", "readonly");
                $("#jumlah-calon-anggota-pmr").attr("readonly", "readonly");
                $("#jumlah-siswa").attr("readonly", "readonly");

                $("#edit-data-instansi").css("display", "none");
                $("#batal-edit-data-instansi").fadeIn();
                $("#simpan-data-instansi").fadeIn();
            } else if (option == 'cancel') {
                $("#data-instansi input").each(function () {
                    $(this).attr("placeholder", "-");
                    $(this).attr("readonly", "readonly");
                    $(this).val($(this).attr("oldvalue"));
                    $(this).removeAttr("oldvalue");
                    $(this).removeClass('is-invalid');
                });
                $("#edit-data-instansi").fadeIn();
                $("#batal-edit-data-instansi").css("display", "none");
                $("#simpan-data-instansi").css("display", "none");
            }
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
                            @if (Auth::user()->role == 1)
                                <h5 class="user-name">{{ Auth::user()->dataAnggota->nama ?? explode('@', Auth::user()->email)[0] }}</h5>
                            @elseif (Auth::user()->role == 2)
                                <h5 class="user-name">{{ Auth::user()->dataInstansi->nama_instansi ?? explode('@', Auth::user()->email)[0] }}</h5>
                            @else
                                <h5 class="user-name">{{ explode('@', Auth::user()->email)[0] }}</h5>    
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
                            <h6 class="mb-2">( <i class="mr-2 fa {{ $roleIcon[Auth::user()->role] }}"></i>{{ $roleName[Auth::user()->role] }} )</h6>
                            <h6 class="user-email">{{ Auth::user()->email }}</h6>
                        </div>
                        <div id="profile-menu">
                            @if (in_array(Auth::user()->role, [1,2]))
                                <a href="javascript:void(0)" class="btn btn-primary" id="data-diri" onclick="showHideElement('data-diri', ['data-anggota', 'data-domisili-identitas', 'data-instansi'], ['ubah-password', 'ubah-email'])">{{ Auth::user()->role == 1 ? 'Data Diri' : (Auth::user()->role == 2 ? 'Data Sekolah/Instansi' : '') }}</a>
                            @endif
                            <a href="javascript:void(0)" class="btn {{ in_array(Auth::user()->role, [1,2]) ? 'btn-white' : 'btn-primary' }}" id="pengaturan-akun" onclick="showHideElement('pengaturan-akun', ['ubah-password', 'ubah-email'], ['data-anggota', 'data-domisili-identitas', 'data-instansi'])">Pengaturan Akun</a>
                            {{--<a href="javascript:void(0)" class="btn btn-white">Kontak Darurat</a>
                            <a href="javascript:void(0)" class="btn btn-white">Riwayat Keanggotaan</a>
                            <a href="javascript:void(0)" class="btn btn-white">Pendidikan Formal</a>
                            <a href="javascript:void(0)" class="btn btn-white">Diklat PMI</a>
                            <a href="javascript:void(0)" class="btn btn-white">Sertifikasi</a>
                            <a href="javascript:void(0)" class="btn btn-white">Keahlian/Keterampilan</a>
                            <a href="javascript:void(0)" class="btn btn-white">Riwayat Organisasi</a>
                            <a href="javascript:void(0)" class="btn btn-white">Riwayat Penghargaan</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role == 1)
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="data-anggota">
                <div class="card h-100">
                    <form action="{{ route('user.home.profile.data-anggota.update') }}" method="POST">
                        <div class="card-header">
                            <div class="card-title">
                                Profil
                                <div id="data-anggota-editor" style="display: inline; position: absolute; right: 1em">
                                    <button type="button" id="edit-data-anggota" class="btn btn-primary" onclick="editDataAnggota('show')"><i class="fa fa-pencil-alt mr-2"></i>Edit</button>
                                    <button id="batal-edit-data-anggota" type="button" class="btn btn-white" style="display: none" onclick="editDataAnggota('cancel')">Batal</button>
                                    <button id="simpan-data-anggota" type="submit" class="btn btn-primary" style="display: none">Simpan</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="kode-anggota">Kode Anggota</label>
                                        @csrf
                                        <input type="text" class="form-control @if ($errors->data_anggota->first('kode-anggota')) is-invalid @endif" id="kode-anggota" name="kode-anggota" value="{{ Auth::user()->dataAnggota->kode_anggota ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_anggota->first('kode-anggota'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('kode-anggota') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="kode-anggota-lama">Kode Anggota Lama</label>
                                        <input type="text" class="form-control @if ($errors->data_anggota->first('kode-anggota-lama')) is-invalid @endif" id="kode-anggota-lama" name="kode-anggota-lama" value="{{ Auth::user()->dataAnggota->kode_anggota_lama ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_anggota->first('kode-anggota-lama'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('kode-anggota-lama') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @if ($errors->data_anggota->first('nama')) is-invalid @endif" id="nama" name="nama" value="{{ Auth::user()->dataAnggota->nama ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_anggota->first('nama'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('nama') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="kelamin">Kelamin</label>
                                        <select name="kelamin" id="kelamin" class="form-control @if ($errors->data_anggota->first('kelamin')) is-invalid @endif" disabled>
                                            <option value="" disabled {{ isset(Auth::user()->dataAnggota->kelamin) ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" {{ isset(Auth::user()->dataAnggota->kelamin) ? (Auth::user()->dataAnggota->kelamin == 'Laki-laki' ? 'selected' : '') : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ isset(Auth::user()->dataAnggota->kelamin) ? (Auth::user()->dataAnggota->kelamin == 'Perempuan' ? 'selected' : '') : '' }}>Perempuan</option>
                                        </select>
                                        @if ($errors->data_anggota->first('kelamin'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('kelamin') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="no-hp">No. HP</label>
                                        <input type="text" class="form-control @if ($errors->data_anggota->first('no-hp')) is-invalid @endif" id="no-hp" name="no-hp" value="{{ Auth::user()->dataAnggota->no_hp ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_anggota->first('no-hp'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('no-hp') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @if ($errors->data_anggota->first('email')) is-invalid @endif" id="email" name="email" value="{{ Auth::user()->email ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_anggota->first('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="tempat-lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control @if ($errors->data_anggota->first('tempat-lahir')) is-invalid @endif" id="tempat-lahir" name="tempat-lahir" value="{{ Auth::user()->dataAnggota->tempat_lahir ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_anggota->first('tempat-lahir'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('tempat-lahir') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal-lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control @if ($errors->data_anggota->first('tanggal-lahir')) is-invalid @endif" id="tanggal-lahir" name="tanggal-lahir" value="{{ Auth::user()->dataAnggota->tanggal_lahir ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_anggota->first('tanggal-lahir'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('tanggal-lahir') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis-identitas">Jenis Identitas</label>
                                        <input type="text" class="form-control @if ($errors->data_anggota->first('jenis-identitas')) is-invalid @endif" id="jenis-identitas" name="jenis-identitas" value="{{ Auth::user()->dataAnggota->jenis_identitas ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_anggota->first('jenis-identitas'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('jenis-identitas') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor-induk-kependudukan">Nomor Induk Kependudukan</label>
                                        <input type="text" class="form-control @if ($errors->data_anggota->first('nomor-induk-kependudukan')) is-invalid @endif" id="nomor-induk-kependudukan" name="nomor-induk-kependudukan" value="{{ Auth::user()->dataAnggota->nik ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_anggota->first('nomor-induk-kependudukan'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('nomor-induk-kependudukan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select name="agama" id="agama" class="form-control @if ($errors->data_anggota->first('agama')) is-invalid @endif" disabled>
                                            <option value="" disabled {{ isset(Auth::user()->dataAnggota->agama) ? '' : 'selected' }}>Pilih Agama</option>
                                            <option value="Islam" {{ isset(Auth::user()->dataAnggota->agama) ? (Auth::user()->dataAnggota->agama == 'Islam' ? 'selected' : '') : '' }}>Islam</option>
                                            <option value="Kristen" {{ isset(Auth::user()->dataAnggota->agama) ? (Auth::user()->dataAnggota->agama == 'Kristen' ? 'selected' : '') : '' }}>Kristen</option>
                                            <option value="Katolik" {{ isset(Auth::user()->dataAnggota->agama) ? (Auth::user()->dataAnggota->agama == 'Katolik' ? 'selected' : '') : '' }}>Katolik</option>
                                            <option value="Hindu" {{ isset(Auth::user()->dataAnggota->agama) ? (Auth::user()->dataAnggota->agama == 'Hindu' ? 'selected' : '') : '' }}>Hindu</option>
                                            <option value="Budha" {{ isset(Auth::user()->dataAnggota->agama) ? (Auth::user()->dataAnggota->agama == 'Budha' ? 'selected' : '') : '' }}>Budha</option>
                                            <option value="Konghucu" {{ isset(Auth::user()->dataAnggota->agama) ? (Auth::user()->dataAnggota->agama == 'Konghucu' ? 'selected' : '') : '' }}>Konghucu</option>
                                        </select>
                                        @if ($errors->data_anggota->first('agama'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('agama') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="golongan-darah">Golongan Darah</label>
                                        <select name="golongan-darah" id="golongan-darah" class="form-control @if ($errors->data_anggota->first('golongan-darah')) is-invalid @endif" disabled>
                                            <option value="" disabled {{ isset(Auth::user()->dataAnggota->golongan_darah) ? '' : 'selected' }}>Pilih Golongan Darah</option>
                                            <option value="A+" {{ isset(Auth::user()->dataAnggota->golongan_darah) ? (Auth::user()->dataAnggota->golongan_darah == 'A+' ? 'selected' : '') : '' }}>A+</option>
                                            <option value="A-" {{ isset(Auth::user()->dataAnggota->golongan_darah) ? (Auth::user()->dataAnggota->golongan_darah == 'A-' ? 'selected' : '') : '' }}>A-</option>
                                            <option value="B+" {{ isset(Auth::user()->dataAnggota->golongan_darah) ? (Auth::user()->dataAnggota->golongan_darah == 'B+' ? 'selected' : '') : '' }}>B+</option>
                                            <option value="B-" {{ isset(Auth::user()->dataAnggota->golongan_darah) ? (Auth::user()->dataAnggota->golongan_darah == 'B-' ? 'selected' : '') : '' }}>B-</option>
                                            <option value="AB+" {{ isset(Auth::user()->dataAnggota->golongan_darah) ? (Auth::user()->dataAnggota->golongan_darah == 'AB+' ? 'selected' : '') : '' }}>AB+</option>
                                            <option value="AB-" {{ isset(Auth::user()->dataAnggota->golongan_darah) ? (Auth::user()->dataAnggota->golongan_darah == 'AB-' ? 'selected' : '') : '' }}>AB-</option>
                                            <option value="O+" {{ isset(Auth::user()->dataAnggota->golongan_darah) ? (Auth::user()->dataAnggota->golongan_darah == 'O+' ? 'selected' : '') : '' }}>O+</option>
                                            <option value="O-" {{ isset(Auth::user()->dataAnggota->golongan_darah) ? (Auth::user()->dataAnggota->golongan_darah == 'O-' ? 'selected' : '') : '' }}>O-</option>
                                        </select>
                                        @if ($errors->data_anggota->first('golongan-darah'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_anggota->first('golongan-darah') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        @if (Auth::user()->role == 2)
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="data-instansi">
                <div class="card h-100">
                    <form action="{{ route('user.home.profile.data-instansi.update') }}" method="POST">
                        <div class="card-header">
                            <div class="card-title">
                                Profil
                                <div id="data-anggota-editor" style="display: inline; position: absolute; right: 1em">
                                    <button type="button" id="edit-data-instansi" class="btn btn-primary" onclick="editDataInstansi('show')"><i class="fa fa-pencil-alt mr-2"></i>Edit</button>
                                    <button id="batal-edit-data-instansi" type="button" class="btn btn-white" style="display: none" onclick="editDataInstansi('cancel')">Batal</button>
                                    <button id="simpan-data-instansi" type="submit" class="btn btn-primary" style="display: none">Simpan</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="nama-instansi">Nama Sekolah/Instansi</label>
                                        @csrf
                                        <input type="text" class="form-control @if ($errors->data_instansi->first('nama-instansi')) is-invalid @endif" id="nama-instansi" name="nama-instansi" value="{{ Auth::user()->dataInstansi->nama_instansi ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_instansi->first('nama-instansi'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_instansi->first('nama-instansi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor-kelompok-pmr">Nomor Kelompok PMR</label>
                                        <input type="text" class="form-control" id="nomor-kelompok-pmr" value="-" required placeholder="-" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat-instansi">Alamat Sekolah/Instansi</label>
                                        <input type="text" class="form-control @if ($errors->data_instansi->first('alamat-instansi')) is-invalid @endif" id="alamat-instansi" name="alamat-instansi" value="{{ Auth::user()->dataInstansi->alamat_instansi ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_instansi->first('alamat-instansi'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_instansi->first('alamat-instansi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="penanggung-jawab-pmr">Penanggung Jawab PMR</label>
                                        <input type="text" class="form-control @if ($errors->data_instansi->first('penanggung-jawab-pmr')) is-invalid @endif" id="penanggung-jawab-pmr" name="penanggung-jawab-pmr" value="{{ Auth::user()->dataInstansi->penanggung_jawab_pmr ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_instansi->first('penanggung-jawab-pmr'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_instansi->first('penanggung-jawab-pmr') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="pembina-pmr">Pembina PMR</label>
                                        <input type="text" class="form-control @if ($errors->data_instansi->first('pembina-pmr')) is-invalid @endif" id="pembina-pmr" name="pembina-pmr" value="{{ Auth::user()->dataInstansi->pembina_pmr ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_instansi->first('pembina-pmr'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_instansi->first('pembina-pmr') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah-calon-anggota-pmr">Jumlah Calon Anggota PMR</label>
                                        <input type="text" class="form-control" id="jumlah-calon-anggota-pmr" value="-" required placeholder="-" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah-siswa">Jumlah Siswa</label>
                                        <input type="text" class="form-control" id="jumlah-siswa" value="-" required placeholder="-" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="kepala-instansi">Kepala Sekolah/Instansi</label>
                                        <input type="text" class="form-control @if ($errors->data_instansi->first('kepala-instansi')) is-invalid @endif" id="kepala-instansi" name="kepala-instansi" value="{{ Auth::user()->dataInstansi->kepala_instansi ?? '' }}" required placeholder="-" readonly>
                                        @if ($errors->data_instansi->first('kepala-instansi'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->data_instansi->first('kepala-instansi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        @if (!in_array(Auth::user()->role, [1]))
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" id="ubah-email" style="{{ in_array(Auth::user()->role, [2]) ? 'display:none' : 'display:block' }}">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">
                            Ubah Email
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right">
                                <button type="submit" class="btn btn-block btn-primary">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="{{ in_array(Auth::user()->role, [1]) ? 'col-xl-9 col-lg-9' : 'col-xl-5 col-lg-5' }} col-md-12 col-sm-12 col-12" id="ubah-password" style="{{ in_array(Auth::user()->role, [1,2]) ? 'display:none' : 'display:block' }}">
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

    @if (Auth::user()->role == 1)
        <div class="row gutters mt-4" id="data-domisili-identitas">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">Domisili</div>
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
                        <div class="card-title">Identitas</div>
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
    @endif
@endsection