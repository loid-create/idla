<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container" style="max-width: 800px;" id="<?= $dokter['id']; ?>">
        <div class="row pt-4">
            <div class="col mr-3" style="max-width:80px;">
                <img class="rounded-circle" src="<?= $gambar; ?>" width="80" height="80">
            </div>
            <div class="col">
                <p class="card-text mb-0 font-weight-bold"><?= $dokter['nama']; ?></p>
                <p class="card-text border-bottom pb-2 mb-1"><small class="text-muted">Dokter Umum</small></p>
                <p class="card-text d-flex justify-content-between"><small class="text-info"><?= $total_pasien - 1; ?> pasien</small></p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <p class="mb-0 font-weight-bold">Profil Dokter</p>
                <p class="text-justify mt-2">
                    <small class="text-muted">
                    <?= $dokter['email']; ?>
                    </small>
                </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <p class="font-weight-bold">Jadwal Praktek</p>
                <ul class="list-group">
                    <?php $i = 1; ?>
                    <?php foreach ($jadwal_hari as $jh) : ?>
                        <li class="list-group-item d-flex">
                            <div class="col"><?= date("l", strtotime($jh['date'])); ?></div>
                            <div class="col text-center">09 : 00 - 17 : 00</div>
                            <div class="col text-right">
                                <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAjukanJam<?= $i; ?>">Buat Jadwal</button>
                            </div>
                        </li>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col text-right mt-3">
            <a class="btn btn-outline-danger btn-sm" style="width: 146px" href="<?= base_url('member/ajukan'); ?>">Batal</a>
        </div>
    </div>
    
    <div class="modal fade" id="modalAjukanJam1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Silahkan pilih jadwal</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('member/tambah_jadwal'); ?>">
                    <div class="modal-body">
                        <ul class="list-dokter">
                            <?php foreach ($jadwal_jam_1 as $jj_1) : ?>
                                <?php if($jj_1['isBooked'] == 0) : ?>
                                    <li>
                                        <input type="radio" id="<?= $jj_1['id'] ?>" id="jadwalId" name="jadwalId" value="<?= $jj_1['id'] ?>" />
                                        <label class="list-aktif" for="<?= $jj_1['id'] ?>" style="font-size: 13px!important;"><?= $jj_1['startAt'] ?> - <?= $jj_1['endAt'] ?></label>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAjukanJam2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Silahkan pilih jadwal</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('member/tambah_jadwal'); ?>">
                    <div class="modal-body">
                        <ul class="list-dokter">
                            <?php foreach ($jadwal_jam_2 as $jj_2) : ?>
                                <li>
                                    <input type="radio" id="<?= $jj_2['id'] ?>" id="jadwalId" name="jadwalId" value="<?= $jj_2['id'] ?>" />
                                    <label for="<?= $jj_2['id'] ?>" style="font-size: 13px!important;"><?= $jj_2['startAt'] ?> - <?= $jj_2['endAt'] ?></label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAjukanJam3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Silahkan pilih jadwal</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('member/tambah_jadwal'); ?>">
                        <ul class="list-dokter">
                            <?php foreach ($jadwal_jam_3 as $jj_3) : ?>
                                <li>
                                    <input type="radio" id="<?= $jj_3['id'] ?>" id="jadwalId" name="jadwalId" value="<?= $jj_3['id'] ?>" />
                                    <label for="<?= $jj_3['id'] ?>" style="font-size: 13px!important;"><?= $jj_3['startAt'] ?> - <?= $jj_3['endAt'] ?></label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Ajukan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->