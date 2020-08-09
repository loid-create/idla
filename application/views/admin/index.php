<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Informasi Akun</h1>

    <div class="card bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header"><strong><?= $admin['nama']; ?></strong></div>
        <div class="card-body">
            <h5 class="card-title"><?= $admin['email']; ?></h5>
            <p class="card-text"><small class="text-muted">Bergabung sejak <?= (new DateTime($admin['date_created']))->format('F d, Y'); ?></p>
        </div>
    </div>

</div>
<!-- /.container-fluid -->