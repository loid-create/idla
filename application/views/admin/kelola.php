<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1> -->

    <div class="card bg-light mb-3" style="max-width: 100%;">
        <div class="card-header"><strong>Data Klinik</strong></div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <table id="dataKlinik" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alamat Klinik</th>
                        <th>Nomor Telephone</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($infoclinic as $ic) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $ic['alamat']; ?></td>
                            <td><?= $ic['notelp']; ?></td>
                            <td><?= $ic['email']; ?></td>
                            <td><a href="#" class="fas fa-fw fa-edit" data-toggle="modal" data-target="#editKlinik<?= $ic['id_info']; ?>"></a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card bg-light mb-3" style="max-width: 100%;">
            <div class="card-body">
                <table id="dataTentang" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Klinik</th>
                            <th>Tentang Klinik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tentang as $t) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $t['nama_klinik']; ?></td>
                                <td><?= $t['isi_tentang']; ?></td>
                                <td><a href="#" class="fas fa-fw fa-edit" data-toggle="modal" data-target="#editTentang<?= $t['id_tentang']; ?>"></a></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card bg-light mb-3" style="max-width: 100%;">
            <div class="card-body">
                <table id="dataDr" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokter</th>
                            <th>Profesi Dokter</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($klinik as $k) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $k['nama_dokter']; ?></td>
                                <td><?= $k['profesi']; ?></td>
                                <td><a href="#" class="fas fa-fw fa-edit" data-toggle="modal" data-target="#editDokter<?= $k['id_klinik']; ?>"></a></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Edit Klinik -->
<?php foreach ($infoclinic as $ic) : ?>
    <div class="modal fade" id="editKlinik<?= $ic['id_info']; ?>" tabindex="-1" aria-labelledby="editInfoKlinikLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInfoKlinikLabel">Edit Info Klinik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="POST" action="<?= base_url('admin/kelola_info'); ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $ic['id_info']; ?>" readonly>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat Klinik</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?= $ic['alamat']; ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="notelp" class="col-sm-4 col-form-label">No Telephone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $ic['notelp']; ?>">
                                <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $ic['email']; ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Edit Tentang -->
<?php foreach ($tentang as $t) : ?>
    <div class="modal fade" id="editTentang<?= $t['id_tentang']; ?>" tabindex="-1" aria-labelledby="editTentangLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTentangLabel">Edit Tentang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="POST" action="<?= base_url('admin/kelola_info'); ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $t['id_tentang']; ?>" readonly>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="namaklinik" class="col-sm-4 col-form-label">Nama Klinik</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="namaklinik" name="namaklinik" value="<?= $t['nama_klinik']; ?>">
                                <?= form_error('namaklinik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tentang" class="col-sm-4 col-form-label">Tentang Klinik</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="tentang" id="tentang" cols="30" rows="10"><?= $t['isi_tentang']; ?></textarea>
                                <?= form_error('tentang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Edit Dokter -->
<?php foreach ($klinik as $k) : ?>
    <div class="modal fade" id="editDokter<?= $k['id_klinik']; ?>" tabindex="-1" aria-labelledby="editInfoDokterLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInfoDokterLabel">Edit Info Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="POST" action="<?= base_url('admin/kelola_info'); ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $k['id_klinik']; ?>" readonly>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Nama Dokter</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $k['nama_dokter']; ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="notelp" class="col-sm-4 col-form-label">Profesi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $k['profesi']; ?>">
                                <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>