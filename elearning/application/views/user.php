<?=$this->session->flashdata('pesan'); ?>
<div class="card" style="overflow-x: auto;">
    <div class="card-header">
        <a href="<?= base_url('user/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"> Tambah User</i></a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Username</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($user as $ssw) : ?>
                <tbody>
                    <tr style="overflow-x: auto;">
                        <td><?= $no++ ?></td>
                        <td><?php echo $ssw['id_user'] ?></td>
                        <td><?php echo $ssw['username'] ?></td>
                        <td><?php echo $ssw['nama_jabatan'] ?></td>
                        <td>
                            <!-- button edit bermasalah sebelum mencoba memakai alert -->
                            <button data-toggle="modal" data-target="#edit<?php echo $ssw['id_user'] ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('user/delete/' . $ssw['id_user'] ) ?>" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>
<!-- Button trigger modal -->

<!-- Modal edit -->
<?php foreach ($user as $ssw) : ?>
    <div class="modal fade" id="edit<?php echo $ssw['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/edit/' .  $ssw['id_user']) ?>" method="POST">
                        <div class="form-group">
                            <label>Nomor Induk Siswa</label>
                            <input type="text" name="id_user" class="form-control" value="<?php echo $ssw['id_user'] ?>">
                            <?= form_error('ID user', '<div class="text-small text-danger', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $ssw['username'] ?>">
                            <?= form_error('Nama User', '<div class="text-small text-danger', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $ssw['password'] ?>">
                            <?= form_error('Password', '<div class="text-small text-danger', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control" id="nama_jabatan" name="nama_jabatan">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Save Change</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>