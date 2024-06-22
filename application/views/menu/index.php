<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#menuBaruModal">
                <i class="fas fa-file-alt"></i> Menu Baru
            </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Terjual</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($menu as $m) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $m['nama_menu']; ?></td>
                            <td><?= $m['terjual']; ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('assets/img/upload/') . $m['image']; ?>" class="img-fluid img-thumbnail" alt="..." height="100" width="100">
                                </picture>
                            </td>
                            <td>
                                <a href="<?= base_url('menu/ubahMenu/') . $m['id']; ?>" class="badge badge-info">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="<?= base_url('menu/hapusMenu/') . $m['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $m['nama_menu']; ?> ?');" class="badge badge-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal Tambah menu baru-->
<div class="modal fade" id="menuBaruModal" tabindex="-1" role="dialog" aria-labelledby="menuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuBaruModalLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_menu" name="nama_menu" placeholder="Masukkan Nama Menu">
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user">
                            <?php
                            foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id']; ?>" <?php if ($m['id_kategori'] == $k['id']) {
                                                                        echo "selected";
                                                                    } ?>><?= $k['kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="terjual" name="terjual" placeholder="Masukkan jumlah terjual">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-ban"></i> Close
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Menu -->
