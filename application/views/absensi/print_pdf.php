<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen <?= $mahasiswa->nama ?> bulan <?= bulan($bulan) . ', ' . $tahun ?></title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <div class="row mt-2">
        <div class="mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th class="border-0 py-0">Nama</th>
                                    <th class="border-0 py-0">:</th>
                                    <th class="border-0 py-0"><?= $mahasiswa->nama ?></th>
                                </tr>
                                <tr>
                                    <th class="border-0 py-0">Divisi</th>
                                    <th class="border-0 py-0">:</th>
                                    <th class="border-0 py-0"><?= $mahasiswa->nama_divisi ?></th>
                                </tr>
                                <tr>
                                    <th class="border-0 py-0">Absen Bulan</th>
                                    <th class="border-0 py-0">:</th>
                                    <th class="border-0 py-0"><?= bulan($bulan) . ' ' . $tahun ?></th>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($hari as $i => $h): ?>
                                    <?php
                                        $absen_harian = array_search($h['tgl'], array_column($absen, 'tgl')) !== false ? $absen[array_search($h['tgl'], array_column($absen, 'tgl'))] : '';
                                    ?>
                                    <tr <?= (in_array($h['hari'], ['Sabtu', 'Minggu'])) ? 'class="bg-dark text-white"' : '' ?> <?= ($absen_harian == '') ? 'class="bg-danger text-white"' : '' ?>>
                                        <td><?= ($i+1) ?></td>
                                        <td><?= $h['hari'] . ', ' . $h['tgl'] ?></td>
                                        <td><?= (in_array($h['hari'], ['Sabtu', 'Minggu'])) ? 'Libur Akhir Pekan' : check_jam(@$absen_harian['jam_masuk'], 'masuk') ?></td>
                                        <td><?= (in_array($h['hari'], ['Sabtu', 'Minggu'])) ? 'Libur Akhir Pekan' : check_jam(@$absen_harian['jam_pulang'], 'pulang') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>