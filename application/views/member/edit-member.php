<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <H1 CLASS="H3 MB-4 TEXT-GRAY-800">EDIT PROFILE</H1> -->

    <div class="card bg-light mb-4" style="max-width: 75%;">
        <div class="card-header"><strong>Ubah Informasi Akun</strong></div>
        <div class="card-body">
            <?= form_open_multipart('member/edit_profile'); ?>
            <input type="hidden" name="id" value="<?= $member['id']; ?>">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $member['nama']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $member['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">Photo</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/') . $member['gambar']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label for="image" class="custom-file-label">Pilih file..</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= (new DateTime($member['tgl_lahir']))->format('Y-m-d'); ?>">
                    contoh: 1993-12-25
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telp" class="col-sm-3 col-form-label">No. Telp</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $member['no_telp']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select name="jk" id="jk" class="form-control">
                        <?php
                        if ($member['jenis_kelamin'] == 0) {
                            $member['x'] = 'Belum Diatur';
                        } elseif ($member['jenis_kelamin'] == 1) {
                            $member['x'] = 'Laki-Laki';
                        } else {
                            $member['x'] = 'Perempuan';
                        }
                        ?>
                        <option value="<?= $member['id']; ?>"><?= $member['x']; ?></option>
                        <option value="1">Laki-Laki</>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $member['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kota" class="col-sm-3 col-form-label">Kota/Provinsi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="kota" name="kota" value="<?= $member['kota']; ?>" placeholder="Medan, Sumatera Utara">
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->