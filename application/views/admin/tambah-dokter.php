<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="card bg-light mb-3" style="max-width: 50%;">
        <div class="card-header"><strong>Tambah Dokter</strong></div>
        <div class="card-body">
            <?= form_open_multipart('admin/tambah_dokter'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-8">
                    <select name="jk" id="jk" class="form-control">
                        <option value="1">Laki-Laki</>
                        <option value="0">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="password1" name="password1">
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-primary">Tambah Akun</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->