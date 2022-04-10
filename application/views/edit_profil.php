<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <form action="<?= base_url('user/update_foto') ?>" method="post" enctype="multipart/form-data">
                <div class="card-header">
                    <h4 class="card-title">Foto Profil</h4>
                </div>
                <div class="card-body text-center">
                    <img src="<?= base_url('assets/img/profil/' .  $user->foto)?>" alt="Foto Profil" class="d-fluid w-75">
                </div>
                <div class="card-footer">
                    <div class="custom-file mb-3">
                        <input type="file" name="foto" class="custom-file-input" id="input-foto" aria-describedby="input-foto" accept="image/*">
                        <label class="custom-file-label" for="input-foto">Pilih Gambar</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-2">Simpan <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="card">
            <form action="<?= base_url('user/edit_profil') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title">Edit Profil</h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Profil</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <!-- $user (user & admin sama)-->
                                <?php if(is_stts('user')) : ?>
                                <label for="nim">NIM : </label>
                                <input type="hidden" name="id_user" value="<?= $this->uri->segment(3) ?>">
                                <input type="text" name="nim" id="nim" value="<?= $user->nim ?>" class="form-control" placeholder="Masukan NIM" required="reuqired" />
                                <?php else : ?>
                                <label for="nik">NIK : </label>
                                <input type="hidden" name="id_admin" value="<?= $this->uri->segment(3) ?>">
                                <input type="text" name="nik" id="nik" value="<?= $user->nik ?>" class="form-control" placeholder="Masukan NIK" required="reuqired" />
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap : </label>
                                <input type="text" name="nama" id="nama" value="<?= $user->nama ?>" class="form-control" placeholder="Masukan Nama Lengkap" required="reuqired" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="telp">No. Telp : </label>
                                <input type="tel" name="telp" id="telp" value="<?= $user->telp ?>" class="form-control" placeholder="Masukan No. Telp" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5">
                            <div class="form-group">
                                <label for="email">E-mail : </label>
                                <input type="email" name="email" id="email" value="<?= $user->email ?>" class="form-control" placeholder="Masukan Email" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="telegram">Telegram : </label>
                                <input type="tel" name="telegram" id="telegram" value="<?= $user->telegram?>" class="form-control" placeholder="Masukan No Telegram" required="reuqired" />
                            </div>
                        </div>
                    </div>

                    <?php if (is_stts('user')) : ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="asal_sekolah">Asal Sekolah : </label>
                                <input type="text" name="asal_sekolah" id="asal_sekolah" value="<?= $user->asal_sekolah ?>" class="form-control" placeholder="Masukan Asal Sekolah" />
                            </div>
                        </div>
                        
                         <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="program_studi">Program Studi : </label>
                                <input type="text" name="program_studi" id="program_studi" value="<?= $user->program_studi ?>" class="form-control" placeholder="Masukan Program Studi" />
                            </div>
                        </div>
                    </div>
                    <?php endif; ?> 
                     
                    <?php if(is_stts('user')) :?>
                    <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="divisi">Divisi : </label>
                                    <select name="divisi" id="divisi" value="<?= $user->divisi ?>" class="form-control">
                                        <option value="" disabled selected>-- Pilih Divisi --</option>
                                        <?php foreach($divisi as $d): ?>
                                            <option value="<?= $d->id_divisi ?>" <?= ($d->id_divisi == $user->divisi) ? 'selected' : '' ?>><?= $d->nama_divisi ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="tempat_kp">Tempat KP : </label>
                                <input type="text" name="tempat_kp" id="tempat_kp" value="<?= $user->tempat_kp?>" class="form-control" placeholder="Masukan Tempat KP" />
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="dosen_pembimbing">Dosen Pembimbing : </label>
                                <input type="text" name="dosen_pembimbing" id="dosen_pembimbing" value="<?= $user->dosen_pembimbing?>" class="form-control" placeholder="Masukan Nama Dosbing" />
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xs-12 <?= ($this->session->stts == 'user') ? 'col-sm-6 col-md-4' : 'col-sm-6' ?>">
                            <!--<div class="input-group date" data-provide="datepicker">-->
                                <div class="form-group">
                                    <label for="waktu_mulai">Waktu Mulai KP : </label>
                                    <input type="date" name="waktu_mulai" id="waktu_mulai" value="<?= $user->waktu_mulai ?>" class="form-control" />
                                    <!--<div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>-->
                                </div>
                            <!--</div>-->
                        </div>
                        <div class="col-xs-12 <?= ($this->session->stts == 'user') ? 'col-sm-6 col-md-4' : 'col-sm-6' ?>">
                            <div class="form-group">
                                <label for="waktu_selesai">Waktu Selesai KP : </label>
                                <input type="date" name="waktu_selesai" id="waktu_selesai" value="<?= $user->waktu_selesai?>" class="form-control"  />
                            </div>
                        </div>
                        <div class="col-xs-12 <?= ($this->session->stts == 'user') ? 'col-sm-6 col-md-4' : 'col-sm-6' ?>">
                            <div class="form-group">
                                <label for="pembimbing_lapangan">Pembimbing Lapangan : </label>
                                <input type="text" name="pembimbing_lapangan" id="pembimbing_lapangan" value="<?= $user->id_admin ?>" disabled class="form-control"  />
                            </div>
                        </div>
                    </div>
                    <?php endif; ?> 
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Akun</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <?php if(is_stts("user")) : ?>
                                    <input type="text" name="username" id="username" value="<?= $user->id_user ?>" class="form-control" placeholder="Masukan Username" required="reuqired" />
                                <?php else : ?>
                                    <input type="text" name="username" id="username" value="<?= $user->id_admin ?>" class="form-control" placeholder="Masukan Username" required="reuqired" />
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="********" />
                                <span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row w-100">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <button type="submit" class="btn btn-primary btn-block">Simpan <i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>