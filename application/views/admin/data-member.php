<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1> -->

    <div class="card bg-light mb-3" style="max-width: 100%;">
        <div class="card-header"><strong>Data Member</strong></div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <table id="dataMember" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Akun Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dtMember as $dm) : ?>
                        <?php
                        if ($dm['jenis_kelamin'] == 0) {
                            $dm['jk'] = 'Belum Diatur';
                        } elseif ($dm['jenis_kelamin'] == 1) {
                            $dm['jk'] = 'Laki-Laki';
                        } else {
                            $dm['jk'] = 'Perempuan';
                        }
                        ?>
                        <?php
                        if ($dm['alamat'] == '') {
                            $dm['alamat'] = 'Belum Diatur';
                        }
                        ?>
                        <?php
                        if ($dm['kota'] == '') {
                            $dm['kota'] = 'Belum Diatur';
                        }
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $dm['nama']; ?></td>
                            <td><?= $dm['email']; ?></td>
                            <td><?= $dm['tgl_lahir']; ?></td>
                            <td><?= $dm['jk']; ?></td>
                            <td><?= $dm['alamat']; ?></td>
                            <td><?= $dm['kota']; ?></td>
                            <td><?= $dm['date_created']; ?></td>
                            <td><a href="<?= base_url() . "member/hapus_data_pet/" . $dm['id']; ?>" class="fas fa-fw fa-trash"></a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->