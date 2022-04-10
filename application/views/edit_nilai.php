<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <form action="<?= base_url('nilai/update') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title">Edit Nilai Mahasiswa / <?= $nilai->id_user?></h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <div class="row">
                        <div class="col-xs-12 col-sm-2">
                            <div class="form-group">
                                <label for="kehadiran">Kehadiran</label>
                                <input type="hidden" name="username" id="edit-username" value="<?= $nilai->id_user?>" class="form-control"/>
                                <input type="number" name="kehadiran" id="edit-kehadiran" value="<?= $nilai->kehadiran?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <div class="form-group">
                                <label for="kerjasama">Kerjasama</label>
                                <input type="number" name="kerjasama" id="edit-kerjasama" value="<?= $nilai->kerjasama ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <div class="form-group">
                                <label for="komunikasi">komunikasi</label>
                                <input type="number" name="komunikasi" id="edit-komunikasi" value="<?= $nilai->komunikasi ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <div class="form-group">
                                <label for="sikap">Sikap/Etika</label>
                                <input type="number" name="sikap" id="edit-sikap" value="<?= $nilai->sikap ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                                <div class="form-group">
                                    <label for="start">Prestasi Kerja</label>
                                    <input type="number" name="prestasi_kerja" id="edit-prestasi_kerja" value="<?= $nilai->prestasi_kerja ?>" class="form-control" />
                                </div>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                                <div class="form-group">
                                    <label for="kreatifitas">Kreatifitas</label>
                                    <input type="number" name="kreatifitas" id="edit-kreatifitas" value="<?= $nilai->kreatifitas ?>" class="form-control" />
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

