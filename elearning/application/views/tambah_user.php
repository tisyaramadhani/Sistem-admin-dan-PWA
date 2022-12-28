<form action="<?= base_url('user/tambah_aksi') ?>" method="POST">
    <div class="form-group">
        <label>Nomor Induk Siswa</label>
        <input type="text" name="id_user" class="form-control">
        <?= form_error('id_user', '<div class="text-small text-danger', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control">
        <?= form_error('username', '<div class="text-small text-danger', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <?= form_error('password', '<div class="text-small text-danger', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Jabatan</label>
        <select id="nama_jabatan" name="nama_jabatan" class="form-control">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Reset</button>
</form>