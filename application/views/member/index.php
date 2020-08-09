<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Informasi Akun</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header"><strong><?= $member['nama']; ?></strong></div>
        <div class="card-body">
            <h5 class="card-title"><?= $member['email']; ?></h5>
            <?php
            if ($member['jenis_kelamin'] == 0) {
                $member['x'] = 'Belum Diatur';
            } elseif ($member['jenis_kelamin'] == 1) {
                $member['x'] = 'Laki-Laki';
            } else {
                $member['x'] = 'Perempuan';
            }
            ?>
            <p class="card-text"><small class="text-muted">Tanggal Lahir : <?= (new DateTime($member['tgl_lahir']))->format('d F Y'); ?><br>Alamat : <?= $member['alamat']; ?><br>Kota : <?= $member['kota']; ?></small></p>
            <p class="card-text"><small class="text-muted">Jenis Kelamin : <?= $member['x']; ?></small></p>
            <p class="card-text"><small class="text-muted">Bergabung sejak <?= (new DateTime($member['date_created']))->format('F d, Y'); ?></p>
        </div>
    </div>

</div>
<!-- /.container-fluid -->