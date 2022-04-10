<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $title; ?></h4>
                <!-- <p class="card-category"></p> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <?php if(is_stts('admin')) {?>
                            <th>No.</th>
                            <?php } ?>
                            <th>Nama</th>
                            <th>Kehadiran</th>
                            <th>Kerjasama</th>
                            <th>Komunikasi</th>
                            <th>Sikap/Etika</th>
                            <th>Prestasi Kerja</th>
                            <th>Kreatifitas</th>
                            <th>Total</th>
                            <?php if(is_stts('admin')) {?>
                            <th>Aksi</th>
                            <?php } ?>
                        </thead>
                        <tbody id="tbody-nilai">
                            <?php foreach($nilai as $i => $n): ?>
                                <tr id="<?= 'nilai-' . $n->id_user ?>">
                                    <?php if(is_stts('admin')) {?>
                                    <td><?= ($i+1) ?></td>
                                    <?php } ?>
                                    <td><?= $n->id_user ?></td>
                                    <td class="kehadiran"><?= $n->kehadiran ?></td>
                                    <td class="kerjasama"><?= $n->kerjasama ?></td>
                                    <td class="komunikasi"><?= $n->komunikasi ?></td>
                                    <td class="sikap"><?= $n->sikap ?></td>
                                    <td class="prestasi_kerja"><?= $n->prestasi_kerja ?></td>
                                    <td class="kreatifitas"><?= $n->kreatifitas ?></td>
                                    <td class="Total"><?php echo $total = ($n->kehadiran*0.2)+($n->kerjasama*0.2)+($n->komunikasi*0.1)+($n->sikap*0.2)
                                              +($n->prestasi_kerja*0.2)+($n->kreatifitas*0.1);?></td>
                                    <?php if(is_stts('admin')) {?>
                                    <td>
                                        <a href="<?= base_url('nilai/edit/'.$n->id_user)?>"><i class="fa fa-edit"></i> Edit</a> 
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body border-top py-3 my-3">
                <h4 class="my-2">Keterangan :</h4>
                <table>
                    <tr><td>Kehadiran</td><td>&nbsp;:&nbsp;</td><td>20%</td></tr>
                    <tr><td>Kerjasama</td><td>&nbsp;:&nbsp;</td><td>20%</td></tr>
                    <tr><td>Komunikasi</td><td>&nbsp;:&nbsp;</td><td>10%</td></tr>
                    <tr><td>Sikap,Etika</td><td>&nbsp;:&nbsp;</td><td>20%</td></tr>
                    <tr><td>Prestasi Kerja</td><td>&nbsp;:&nbsp;</td><td>20%</td></tr>
                    <tr><td>Kreatifitas</td><td>&nbsp;:&nbsp;</td><td>10%</td></tr>
                </table> 
            </div>
        </div>
    </div>
</div>

