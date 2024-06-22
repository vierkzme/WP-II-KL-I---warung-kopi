<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th nowrap>Photo</th>
                    <th nowrap>Nama</th>
                    <th nowrap>Email</th>
                    <th nowrap>Bergabung</th>
                    <th nowrap>Status</th>
                    <th nowrap>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($anggota as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><img src="<?= base_url('assets/img/profile/') . $a->image; ?>" class="rounded" alt="..." width="100" height="100"></td>
                        <td><?= $a->nama; ?></td>
                        <td><?= $a->email; ?></td>
                        <td><?= date('d F Y', $a->tanggal_input); ?></td>
                        <?php
                        $status = ($a->is_active == 1) ? "Aktif" : "Tidak Aktif";
                        ?>
                        <td><?= $status; ?></td>
                        <td>
                            <a href="<?= base_url('user/hapusAnggota/' . $a->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">
                                <i class="fas fa-fw fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->