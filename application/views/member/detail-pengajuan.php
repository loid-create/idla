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
                    <?php foreach ($jadwal_hari as $jh) : ?>
                        <li class="list-group-item d-flex">
                            <div class="col"><?= date("l", strtotime($jh['date'])); ?></div>
                            <div class="col text-center">09 : 00 - 17 : 00</div>
                            <div class="col text-right">
                                <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAjukan">Buat Jadwal</button>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col text-right mt-3">
            <a class="btn btn-outline-danger btn-sm" style="width: 146px" href="<?= base_url('member/ajukan'); ?>">Batal</a>
        </div>
    </div>
    
    <div class="modal fade" id="modalAjukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Silahkan pilih peliharaan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <ul class="list-dokter">
                        <?php foreach ($jadwal_jam as $j) : ?>
                            <li>
                                <input type="radio" id="<?= $j['id'] ?>" name="jam" value="<?= $j['id'] ?>" />
                                <label for="<?= $j['id'] ?>" style="font-size: 13px!important;"><?= $j['startAt'] ?> - <?= $j['endAt'] ?></label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-info" href="#">Ajukan</a>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->