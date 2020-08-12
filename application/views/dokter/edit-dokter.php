<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <H1 CLASS="H3 MB-4 TEXT-GRAY-800">EDIT PROFILE</H1> -->

    <div class="card bg-light mb-3" style="max-width: 75%;">
        <div class="card-header"><strong>Ubah Informasi Akun</strong></div>
        <div class="card-body">
            <?= form_open_multipart('dokter/edit_profile'); ?>
            <input type="hidden" name="id" value="<?= $dokter['id']; ?>">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $dokter['nama']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $dokter['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="biaya" class="col-sm-3 col-form-label">Biaya Jasa</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="biaya" name="biaya" value="" placeholder="0">
                </div>
            </div>
            <div class="form-group row">
                <label for="praktek-hari" class="col-sm-3 col-form-label">Jadwal Praktek</label>
                <div class="col-sm-4">
                    <select name="hari-mulai" id="praktek-hari" class="form-control">
                        <option value="">Belum Diatur</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
                <div class="col align-self-center text-center">-</div>
                <div class="col-sm-4">
                    <select name="hari-akhir" class="form-control">
                        <option value="">Belum Diatur</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="praktek-jam" class="col-sm-3 col-form-label">Jam Praktek</label>
                <div class="col-sm-4">
                    <select name="jam-mulai" id="praktek-jam" class="form-control">
                        <option value="">Belum Diatur</option>
                        <option value="0">00 : 00</option>
                        <option value="1">01 : 00</option>
                        <option value="2">02 : 00</option>
                        <option value="3">03 : 00</option>
                        <option value="4">04 : 00</option>
                        <option value="5">05 : 00</option>
                        <option value="6">06 : 00</option>
                        <option value="7">07 : 00</option>
                        <option value="8">08 : 00</option>
                        <option value="9">09 : 00</option>
                        <option value="10">10 : 00</option>
                        <option value="11">11 : 00</option>
                        <option value="12">12 : 00</option>
                        <option value="13">13 : 00</option>
                        <option value="14">14 : 00</option>
                        <option value="15">15 : 00</option>
                        <option value="16">16 : 00</option>
                        <option value="17">17 : 00</option>
                        <option value="18">18 : 00</option>
                        <option value="19">19 : 00</option>
                        <option value="20">20 : 00</option>
                        <option value="21">21 : 00</option>
                        <option value="22">22 : 00</option>
                        <option value="23">23 : 00</option>
                    </select>
                </div>
                <div class="col align-self-center text-center">-</div>
                <div class="col-sm-4">
                    <select name="jam-akhir" class="form-control">
                        <option value="">Belum Diatur</option>
                        <option value="0">00 : 00</option>
                        <option value="1">01 : 00</option>
                        <option value="2">02 : 00</option>
                        <option value="3">03 : 00</option>
                        <option value="4">04 : 00</option>
                        <option value="5">05 : 00</option>
                        <option value="6">06 : 00</option>
                        <option value="7">07 : 00</option>
                        <option value="8">08 : 00</option>
                        <option value="9">09 : 00</option>
                        <option value="10">10 : 00</option>
                        <option value="11">11 : 00</option>
                        <option value="12">12 : 00</option>
                        <option value="13">13 : 00</option>
                        <option value="14">14 : 00</option>
                        <option value="15">15 : 00</option>
                        <option value="16">16 : 00</option>
                        <option value="17">17 : 00</option>
                        <option value="18">18 : 00</option>
                        <option value="19">19 : 00</option>
                        <option value="20">20 : 00</option>
                        <option value="21">21 : 00</option>
                        <option value="22">22 : 00</option>
                        <option value="23">23 : 00</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="konsultasi-hari" class="col-sm-3 col-form-label">Jadwal Konsultasi</label>
                <div class="col-sm-4">
                    <select name="hari-mulai-k" id="konsultasi-hari" class="form-control">
                        <option value="">Belum Diatur</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
                <div class="col align-self-center text-center">-</div>
                <div class="col-sm-4">
                    <select name="hari-akhir-k" class="form-control">
                        <option value="">Belum Diatur</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="konsultasi-jam" class="col-sm-3 col-form-label">Jam Konsultasi</label>
                <div class="col-sm-4">
                    <select name="jam-mulai-k" id="konsultasi-jam" class="form-control">
                        <option value="">Belum Diatur</option>
                        <option value="0">00 : 00</option>
                        <option value="1">01 : 00</option>
                        <option value="2">02 : 00</option>
                        <option value="3">03 : 00</option>
                        <option value="4">04 : 00</option>
                        <option value="5">05 : 00</option>
                        <option value="6">06 : 00</option>
                        <option value="7">07 : 00</option>
                        <option value="8">08 : 00</option>
                        <option value="9">09 : 00</option>
                        <option value="10">10 : 00</option>
                        <option value="11">11 : 00</option>
                        <option value="12">12 : 00</option>
                        <option value="13">13 : 00</option>
                        <option value="14">14 : 00</option>
                        <option value="15">15 : 00</option>
                        <option value="16">16 : 00</option>
                        <option value="17">17 : 00</option>
                        <option value="18">18 : 00</option>
                        <option value="19">19 : 00</option>
                        <option value="20">20 : 00</option>
                        <option value="21">21 : 00</option>
                        <option value="22">22 : 00</option>
                        <option value="23">23 : 00</option>
                    </select>
                </div>
                <div class="col align-self-center text-center">-</div>
                <div class="col-sm-4">
                    <select name="jam-akhir-k" class="form-control">
                        <option value="">Belum Diatur</option>
                        <option value="0">00 : 00</option>
                        <option value="1">01 : 00</option>
                        <option value="2">02 : 00</option>
                        <option value="3">03 : 00</option>
                        <option value="4">04 : 00</option>
                        <option value="5">05 : 00</option>
                        <option value="6">06 : 00</option>
                        <option value="7">07 : 00</option>
                        <option value="8">08 : 00</option>
                        <option value="9">09 : 00</option>
                        <option value="10">10 : 00</option>
                        <option value="11">11 : 00</option>
                        <option value="12">12 : 00</option>
                        <option value="13">13 : 00</option>
                        <option value="14">14 : 00</option>
                        <option value="15">15 : 00</option>
                        <option value="16">16 : 00</option>
                        <option value="17">17 : 00</option>
                        <option value="18">18 : 00</option>
                        <option value="19">19 : 00</option>
                        <option value="20">20 : 00</option>
                        <option value="21">21 : 00</option>
                        <option value="22">22 : 00</option>
                        <option value="23">23 : 00</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">Photo</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/') . $dokter['gambar']; ?>" class="img-thumbnail">
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
                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= (new DateTime($dokter['tgl_lahir']))->format('Y-m-d'); ?>">
                    contoh: 1993-12-25
                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telp" class="col-sm-3 col-form-label">No. Telp</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $dokter['no_telp']; ?>">
                    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select name="jk" id="jk" class="form-control">
                        <?php
                        if ($dokter['jenis_kelamin'] == 1) {
                            $dokter['x'] = 'Laki-Laki';
                        } else {
                            $dokter['x'] = 'Perempuan';
                        }
                        ?>
                        <option value="<?= $dokter['id']; ?>"><?= $dokter['x']; ?></option>
                        <option value="1">Laki-Laki</>
                        <option value="0">Perempuan</option>
                    </select>
                    <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $dokter['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kota" class="col-sm-3 col-form-label">Kota/Provinsi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="kota" name="kota" value="<?= $dokter['kota']; ?>" placeholder="Medan, Sumatera Utara">
                    <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
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