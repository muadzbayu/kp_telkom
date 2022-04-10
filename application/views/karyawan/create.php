<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="<?= base_url('Mahasiswa/store') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title">Tambah Mahasiswa</h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Akun</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="********" required="reuqired" />
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <input type="hidden" name="id_admin" id="id_admin" class="form-control" value="<?php echo $admin; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>