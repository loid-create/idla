<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1> -->

    <div class="card bg-light mb-3" style="max-width: 100%;">
        <div class="card-header"><strong>Data Peliharaan</strong></div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahPeliharaan">Tambah Peliharaan</a>
            <table id="dataKlinik" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alamat Klinik</th>
                        <th>Nomor Telephone</th>
                        <th>Jenis Peliharaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($infoclinic as $ic) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $ic['nama_pet']; ?></td>
                            <td><?= $ic['ras_pet']; ?></td>
                            <td><?= $ic['x_pet']; ?></td>
                            <td><a href="#" class="fas fa-fw fa-edit" data-toggle="modal" data-target="#editPeliharaan<?= $ic['id']; ?>"></a> | <a href="<?= base_url() . "admin/hapus_data_pet/" . $ic['id']; ?>" class="fas fa-fw fa-trash"></a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Tambah Peliharaan -->

<!-- Modal -->
<div class="modal fade" id="tambahPeliharaan" tabindex="-1" aria-labelledby="tambahPeliharaanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPeliharaanLabel">Tambah Peliharaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" method="POST" action="<?= base_url('admin/data_pet'); ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="namapet" class="col-sm-4 col-form-label">Nama Peliharaan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="namapet" name="namapet" placeholder="Nama Pet" value="<?= set_value('namapet'); ?>">
                            <?= form_error('namapet', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ras" class="col-sm-4 col-form-label">Ras Peliharaan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ras" name="ras" placeholder="Ras Pet" value="<?= set_value('ras'); ?>">
                            <?= form_error('ras', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jp" class="col-sm-4 col-form-label">Jenis Peliharaan</label>
                        <div class="col-sm-8">
                            <select name="jp" id="jp" class="form-control">
                                <option value="1">Kucing</option>
                                <option value="0">Anjing</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select name="jk" id="jk" class="form-control">
                                <option value="0">Perempuan</option>
                                <option value="1">Laki-Laki</option>
                                <option value="2">Betina</option>
                                <option value="3">Jantan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($infoclinic as $ic) : ?>
    <div class="modal fade" id="editPeliharaan<?= $ic['id']; ?>" tabindex="-1" aria-labelledby="editPeliharaanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPeliharaanLabel">Edit Peliharaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="POST" action="<?= base_url('admin/edit_data_pet'); ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $ic['id']; ?>" readonly>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="namapet" class="col-sm-4 col-form-label">Nama Peliharaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="namapet" name="namapet" placeholder="Nama Pet" value="<?= $ic['nama_pet']; ?>">
                                <?= form_error('namapet', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ras" class="col-sm-4 col-form-label">Ras Peliharaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ras" name="ras" placeholder="Ras Pet" value="<?= $ic['ras_pet']; ?>">
                                <?= form_error('ras', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?php
                            if ($ic['jenis_pet'] == 1) {
                                $ic['x_pet'] = 'Kucing';
                            } else {
                                $ic['x_pet'] = 'Anjing';
                            }
                            ?>
                            <label for="jp" class="col-sm-4 col-form-label">Jenis Peliharaan</label>
                            <div class="col-sm-8">
                                <select name="jp" id="jp" class="form-control">
                                    <option value="<?= $ic['jenis_pet']; ?>"><?= $ic['x_pet']; ?></option>
                                    <option value="1">Kucing</option>
                                    <option value="0">Anjing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?php
                            if ($ic['jk'] == 0) {
                                $ic['jk_pet'] = 'Perempuan';
                            } elseif ($ic['jk'] == 1) {
                                $ic['jk_pet'] = 'Laki-Laki';
                            } elseif ($ic['jk'] == 2) {
                                $ic['jk_pet'] = 'Betina';
                            } else {
                                $ic['jk_pet'] = 'Jantan';
                            }
                            ?>
                            <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <select name="jk" id="jk" class="form-control">
                                    <option value="0">Perempuan</option>
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Betina</option>
                                    <option value="3">Jantan</option>
                                </select>
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