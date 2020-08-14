<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pengajuan Jadwal Konsultasi</h1>

    <?php if (!empty($vendorslist)) {
        foreach ($vendorslist as $v) :
    ?>
    <div class="w-100" style="text-align: -webkit-center;">
        <div class="card bg-light mb-3 shadow-sm col-md-8" id="<?= $v['id']; ?>">
            <div class="card-body">
                <div class="row border-bottom pb-4">
                    <div class="col mr-4" style="max-width:80px;">
                        <img class="rounded-circle" src="<?= $v['gambar']; ?>" width="80" height="80">
                    </div>
                    <div class="col border-right">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <p class="card-text mb-0 font-weight-bold"><?= $v['nama']; ?></p>
                                <p class="card-text"><small class="text-muted">Dokter Umum</small></p>
                            </div>
                            <div class="col-md-6 mt-4 text-left">
                                <p class="card-text mb-0">Jadwal Praktek</p>
                                <p class="card-text"><small class="text-muted">Senin - Jumat</small></p>
                            </div>
                            <div class="col-md-6 mt-4 text-right">
                                <p class="card-text mb-0"><small class="text-muted">Setiap Hari</small></p>
                                <p class="card-text">09 : 00 - 17 : 00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <p class="card-text mb-0 font-weight-bold">Profil Dokter</p>
                        <p class="card-text text-justify">
                            <small class="text-muted">
                                <?= $v['email']; ?>
                            </small>
                        </p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col"></div>
                    <div class="col text-right align-self-center">
                        <a class="btn btn-info" href="<?= base_url(). "member/detail_pengajuan/". $v['id']; ?>">Buat Janji</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php endforeach; ?>

    <?php } else { ?>
        <div class="card bg-light mb-3">
            <div class="card-body text-center py-5">
                <h5 class="card-title">Layanan Jadwal Dokter Kosong</h5>
                <p class="card-text"><small class="text-muted">Semua layanan jadwal janji temu akan ditampilkan disini</small></p>
            </div>
        </div>
    <?php } ?>
</div>
<!-- /.container-fluid -->