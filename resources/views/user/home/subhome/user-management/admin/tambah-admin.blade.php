<div class="modal fade" id="tambah-admin" tabindex="-1" role="dialog" aria-labelledby="tambahAdminLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAdminLabel">Tambah Admin</h5>
                <div style="display: inline-block">
                    <button type="button" id="tutup-tambah-admin" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" title="Tutup">
                        <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <form id="tambah-instansi-form" action="{{ route('user.home.user-management.admin.add') }}" method="POST">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @if ($errors->tambah_admin->first('email')) is-invalid @endif" id="email" name="email" required placeholder="Masukkan Email" value="{{ old('email') }}">
                                        @if ($errors->tambah_admin->first('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_admin->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <button type="submit" class="btn btn-lg btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>