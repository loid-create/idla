<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Jadwal Janji</h1>

    <?= $this->session->flashdata('message'); ?>
    
    <?php if (!empty($jadwal)) {
        foreach ($jadwal as $v) :
    ?>
        <?php
            if ($v['jenis_kelamin'] == 0) {
                $v['jk'] = 'Belum Diatur';
            } elseif ($v['jenis_kelamin'] == 1) {
                $v['jk'] = 'Laki-Laki';
            } else {
                $v['jk'] = 'Perempuan';
            }
        ?>
        <?php
            if ($v['konfirmasi'] == 0) {
                $v['confirm'] = 'Belum Dikonfirmasi';
            } else {
                $v['confirm'] = 'Sudah Dikonfirmasi';
            }
        ?>
        <div class="card bg-light mb-3 shadow-sm" id="<?= $v['id']; ?>">
            <div class=" card-body">
                <div class="row border-bottom pb-4">
                    <div class="col mr-4" style="max-width:80px;">
                        <img class="rounded-circle" src="<?= base_url('assets/') . $v['gambar']; ?>" width="80" height="80">
                    </div>
                    <div class="col border-right">
                        <p class="card-text mb-0 font-weight-bold"><?= $v['nama']; ?></p>
                        <p class="card-text mb-1"><small class="text-muted"><?= $v['jk']; ?></small></p>
                        <p class="card-text"><?= $v['alamat']; ?> <?= $v['kota']; ?></p>
                    </div>
                    <div class="col">
                        <p class="card-text mb-0 font-weight-bold d-flex justify-content-between"><?= $dokter['nama']; ?></p>
                        <p class="card-text mb-1"><small class="text-muted">Dokter Umum</small></p>
                        <p class="card-text d-flex justify-content-between"><?= date_format(date_create($v['date']),"l, d F Y") ?> <span class="font-weight-bold"><?= $v['startAt']; ?> - <?= $v['endAt']; ?> WIB</span></p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col align-self-center">
                        <p class="font-italic"><?= $v['confirm']; ?></p>
                    </div>
                    <div class="col text-right align-self-center">
                        <?php if ($v['konfirmasi'] == 0) : ?>
                            <form action="<?= base_url('dokter/konfirmasi'); ?>" method="post">
                                <input type="text" value="<?= $v['id']; ?>" name="id" hidden>
                                <button type="submit" class="btn btn-info">Konfirmasi</button>
                            </form>
                        <?php elseif ($v['konfirmasi'] == 1) : ?>
                            <button class="btn btn-white" disabled>Sudah Dikonfirmasi</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php } else { ?>
        <div class="card bg-light mb-3">
            <div class="card-body text-center py-5">
                <h5 class="card-title">Jadwal Masih Kosong</h5>
                <p class="card-text"><small class="text-muted">Semua jadwal janji temu akan ditampilkan disini</small></p>
            </div>
        </div>
    <?php } ?>

</div>
<!-- /.container-fluid -->