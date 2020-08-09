<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1> -->

    <div class="card bg-light mb-3" style="max-width: 100%;">
        <div class="card-header"><strong>Data Peliharaan</strong></div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahPeliharaan">Tambah Peliharaan</a>
            <table id="dataDokter" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peliharaan</th>
                        <th>Ras Peliharaan</th>
                        <th>Jenis Peliharaan</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Ditambah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pet as $p) : ?>
                        <?php
                        if ($p['jenis_pet'] == 1) {
                            $p['x_pet'] = 'Kucing';
                        } else {
                            $p['x_pet'] = 'Anjing';
                        }
                        ?>
                        <?php
                        if ($p['jk'] == 0) {
                            $p['jk_pet'] = 'Perempuan';
                        } elseif ($p['jk'] == 1) {
                            $p['jk_pet'] = 'Laki-Laki';
                        } elseif ($p['jk'] == 2) {
                            $p['jk_pet'] = 'Betina';
                        } else {
                            $p['jk_pet'] = 'Jantan';
                        }
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $p['nama_pet']; ?></td>
                            <td><?= $p['ras_pet']; ?></td>
                            <td><?= $p['x_pet']; ?></td>
                            <td><?= $p['jk_pet']; ?></td>
                            <td><?= $p['date_created']; ?></td>
                            <td><a href="#" class="fas fa-fw fa-edit" data-toggle="modal" data-target="#editPeliharaan<?= $p['id']; ?>"></a> | <a href="<?= base_url() . "member/hapus_data_pet/" . $p['id']; ?>" class="fas fa-fw fa-trash"></a></td>
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
            <form class="user" method="POST" action="<?= base_url('member/data_pet'); ?>">
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
<?php foreach ($pet as $p) : ?>
    <div class="modal fade" id="editPeliharaan<?= $p['id']; ?>" tabindex="-1" aria-labelledby="editPeliharaanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPeliharaanLabel">Edit Peliharaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="POST" action="<?= base_url('member/edit_data_pet'); ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $p['id']; ?>" readonly>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="namapet" class="col-sm-4 col-form-label">Nama Peliharaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="namapet" name="namapet" placeholder="Nama Pet" value="<?= $p['nama_pet']; ?>">
                                <?= form_error('namapet', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ras" class="col-sm-4 col-form-label">Ras Peliharaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ras" name="ras" placeholder="Ras Pet" value="<?= $p['ras_pet']; ?>">
                                <?= form_error('ras', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?php
                            if ($p['jenis_pet'] == 1) {
                                $p['x_pet'] = 'Kucing';
                            } else {
                                $p['x_pet'] = 'Anjing';
                            }
                            ?>
                            <label for="jp" class="col-sm-4 col-form-label">Jenis Peliharaan</label>
                            <div class="col-sm-8">
                                <select name="jp" id="jp" class="form-control">
                                    <option value="<?= $p['jenis_pet']; ?>"><?= $p['x_pet']; ?></option>
                                    <option value="1">Kucing</option>
                                    <option value="0">Anjing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?php
                            if ($p['jk'] == 0) {
                                $p['jk_pet'] = 'Perempuan';
                            } elseif ($p['jk'] == 1) {
                                $p['jk_pet'] = 'Laki-Laki';
                            } elseif ($p['jk'] == 2) {
                                $p['jk_pet'] = 'Betina';
                            } else {
                                $p['jk_pet'] = 'Jantan';
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