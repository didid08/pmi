<div class="modal fade" id="tambah-anggota" tabindex="-1" role="dialog" aria-labelledby="tambahAnggotaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAnggotaLabel">Tambah Anggota</h5>
            </div>
            <div class="modal-body">

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div id="tambah-anggota-form">
                            <h3>Pilih Sekolah/Instansi</h3>
                            <section>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <select name="instansi" id="instansi" class="form-control @if ($errors->data_anggota->first('instansi')) is-invalid @endif">
                                                <option value="" disabled selected>Pilih Sekolah/Instansi</option>
                                                @foreach ($semuaInstansi as $instansi)
                                                    <option value="{{ $instansi->id }}">{{ $instansi->dataInstansi->nama_instansi }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->data_anggota->first('instansi'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('instansi') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>Profil</h3>
                            <section>
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="kode-anggota">Kode Anggota</label>
                                            @csrf
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('kode-anggota')) is-invalid @endif" id="kode-anggota" name="kode-anggota" required placeholder="Masukkan Kode Anggota" value="{{ old('kode-anggota') }}">
                                            @if ($errors->data_anggota->first('kode-anggota'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('kode-anggota') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="kode-anggota-lama">Kode Anggota Lama</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('kode-anggota-lama')) is-invalid @endif" id="kode-anggota-lama" name="kode-anggota-lama" required placeholder="Masukkan Kode Anggota Lama" value="{{ old('kode-anggota-lama') }}">
                                            @if ($errors->data_anggota->first('kode-anggota-lama'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('kode-anggota-lama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('nama')) is-invalid @endif" id="nama" name="nama" required placeholder="Masukkan Nama" value="{{ old('nama') }}">
                                            @if ($errors->data_anggota->first('nama'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('nama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="kelamin">Kelamin</label>
                                            <select name="kelamin" id="kelamin" class="form-control @if ($errors->data_anggota->first('kelamin')) is-invalid @endif">
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @if ($errors->data_anggota->first('kelamin'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('kelamin') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="no-hp">No. HP</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('no-hp')) is-invalid @endif" id="no-hp" name="no-hp" required placeholder="Masukkan Nomor HP" value="{{ old('no-hp') }}">
                                            @if ($errors->data_anggota->first('no-hp'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('no-hp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @if ($errors->data_anggota->first('email')) is-invalid @endif" id="email" name="email" required placeholder="Masukkan Email" value="{{ old('email') }}">
                                            @if ($errors->data_anggota->first('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="tempat-lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('tempat-lahir')) is-invalid @endif" id="tempat-lahir" name="tempat-lahir" required placeholder="Masukkan Tempat Lahir" value="{{ old('tempat-lahir') }}">
                                            @if ($errors->data_anggota->first('tempat-lahir'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('tempat-lahir') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="tanggal-lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control @if ($errors->data_anggota->first('tanggal-lahir')) is-invalid @endif" id="tanggal-lahir" name="tanggal-lahir" required placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal-lahir') }}">
                                            @if ($errors->data_anggota->first('tanggal-lahir'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('tanggal-lahir') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="jenis-identitas">Jenis Identitas</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('jenis-identitas')) is-invalid @endif" id="jenis-identitas" name="jenis-identitas" required placeholder="Masukkan Jenis Identitas" value="{{ old('jenis-identitas') }}">
                                            @if ($errors->data_anggota->first('jenis-identitas'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('jenis-identitas') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="nomor-induk-kependudukan">Nomor Induk Kependudukan</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('nomor-induk-kependudukan')) is-invalid @endif" id="nomor-induk-kependudukan" name="nomor-induk-kependudukan" required placeholder="Masukkan NIK" value="{{ old('nomor-induk-kependudukan') }}">
                                            @if ($errors->data_anggota->first('nomor-induk-kependudukan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('nomor-induk-kependudukan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select name="agama" id="agama" class="form-control @if ($errors->data_anggota->first('agama')) is-invalid @endif">
                                                <option value="" disabled selected>Pilih Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                            @if ($errors->data_anggota->first('agama'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('agama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="golongan-darah">Golongan Darah</label>
                                            <select name="golongan-darah" id="golongan-darah" class="form-control @if ($errors->data_anggota->first('golongan-darah')) is-invalid @endif">
                                                <option value="" disabled selected>Pilih Golongan Darah</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                            @if ($errors->data_anggota->first('golongan-darah'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('golongan-darah') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>Domisili</h3>
                            <section>
                                <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="addrEss">Address</label>
                                            <input type="text" class="form-control" id="addrEss" placeholder="Flat No">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="ciTy">City</label>
                                            <input type="text" class="form-control" id="ciTy" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="sTate">State</label>
                                            <input type="text" class="form-control" id="sTate" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="counTry">Country</label>
                                            <input type="text" class="form-control" id="counTry" placeholder="Country">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>Identitas</h3>
                            <section>
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="cardNum">Card Number</label>
                                            <input type="text" class="form-control" id="cardNum" placeholder="Enter Card Number">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="nameOnCard">Name On Card</label>
                                            <input type="text" class="form-control" id="nameOnCard" placeholder="Name On Card">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="expDate">Expiry Date</label>
                                            <input type="text" class="form-control" id="expDate" placeholder="Card Expiry Date">
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-12">
                                        <div class="form-group">
                                            <label for="cvv">CVV</label>
                                            <input type="number" class="form-control" id="cvv" placeholder="CVV">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                {{-- <spanclass="mr-2"><i>(Jikatidakdapatdisubmit,cobacekkembalidatayangsudahandamasukkan)</i></span> --}}
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal"><i class="fa fa-minus mr-2"></i>Minimalkan</button>
            </div>
        </div>
    </div>
</div>