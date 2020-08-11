<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1> -->

    <div class="card bg-light mb-3" style="max-width: 100%;">
        <div class="card-header"><strong>Data Dokter</strong></div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <table id="dataDokter" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
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
                    <?php foreach ($dtDokter as $dd) : ?>
                        <?php
                        if ($dd['jenis_kelamin'] == 0) {
                            $dd['jk'] = 'Belum Diatur';
                        } elseif ($dd['jenis_kelamin'] == 1) {
                            $dd['jk'] = 'Laki-Laki';
                        } else {
                            $dd['jk'] = 'Perempuan';
                        }
                        ?>
                        <?php
                        if ($dd['alamat'] == '') {
                            $dd['alamat'] = 'Belum Diatur';
                        }
                        ?>
                        <?php
                        if ($dd['kota'] == '') {
                            $dd['kota'] = 'Belum Diatur';
                        }
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $dd['nama']; ?></td>
                            <td><?= $dd['email']; ?></td>
                            <td><?= $dd['tgl_lahir']; ?></td>
                            <td><?= $dd['jk']; ?></td>
                            <td><?= $dd['alamat']; ?></td>
                            <td><?= $dd['kota']; ?></td>
                            <td><?= $dd['date_created']; ?></td>
                            <td><a href="<?= base_url() . "admin/hapus_data_dokter/" . $dd['id']; ?>" class="fas fa-fw fa-trash"></a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->