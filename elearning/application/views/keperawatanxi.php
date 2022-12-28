<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1;
        foreach ($keperawatanxi as $ssw) : ?>
            <tbody>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?php echo $ssw['nama_course'] ?></td>
                    <td>
                        <!-- button edit bermasalah sebelum mencoba memakai alert -->
                        <button data-toggle="modal" data-target="#edit<?php echo $ssw['id_course'] ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-book"></i></button>
                            <a href="<?= base_url('keperawatanxi/delete/' . $ssw['id_course']) ?>" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach ?>
                    <div class="card-header">
                        <button data-toggle="modal" data-target="#tambah<?php echo $ssw['id_course'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"> Tambah Mapel</i></button>
                    </div>
                </table>
            </div>
        </div>
<!-- tambah -->
<?php foreach ($keperawatanxi as $ssw) : ?>
    <div class="modal fade" id="tambah<?php echo $ssw['id_course'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('keperawatanxi/tambah_aksi') ?>" method="POST">
                        <div class="form-group">
                            <label>Mapel</label>
                            <input type="text" name="nama_course" class="form-control">
                            <?= form_error('nama_course', '<div class="text-small text-danger', '</div>'); ?>
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

<!-- edit -->
<?php foreach ($keperawatanxi as $ssw) : ?>
    <div class="modal fade" id="edit<?php echo $ssw['id_course'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('keperawatanxi/edit/' . $ssw['id_course']) ?>" method="POST">
                    <div class="form-group">
                            <label>id</label>
                            <input type="text" name="id_course" class="form-control" value="<?php echo $ssw['id_course'] ?>">
                            <?= form_error('Nama_course', '<div class="text-small text-danger', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Mapel</label>
                            <input type="text" name="nama_course" class="form-control" value="<?php echo $ssw['nama_course'] ?>">
                            <?= form_error('nama_course', '<div class="text-small text-danger', '</div>'); ?>
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