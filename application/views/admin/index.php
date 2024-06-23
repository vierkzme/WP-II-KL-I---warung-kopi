<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 mt-3">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Anggota</div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?=
                                $this->ModelUser->getUserWhere(['role_id' => 1])->num_rows();
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-3x text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Makanan Yang Terjual
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ['id_kategori' => 1];
                                $mkterjual = $this->ModelMenu->total('terjual', $where);
                                echo $mkterjual;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('menu'); ?>"><i class="fas fa-hamburger fa-3x text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Minuman Yang Terjual
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ['id_kategori' => 2];
                                $mnterjual = $this->ModelMenu->total('terjual', $where);
                                echo $mnterjual;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('menu'); ?>"><i class="fas fa-coffee fa-3x text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 mt-3">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Snack Yang Terjual
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ['id_kategori' => 3];
                                $sterjual = $this->ModelMenu->total('terjual', $where);
                                echo $sterjual;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('menu'); ?>"><i class="fas fa-cookie fa-3x text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row ux-->
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- row table-->
        <div class="row col-lg-10">
            <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
                <div class="page-header">
                    <span class="fas fa-users text-dark mt-2 "> Data
                        User</span>
                    <a class="text-dark" href="<?php echo
                                                base_url('user/data_user'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>Nama Anggota</th>
                            <th>Email</th>
                            <th>Role ID</th>
                            <th>Aktif</th>
                            <th>Member Sejak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($anggota as $a) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $a['nama']; ?></td>
                                <td><?= $a['email']; ?></td>
                                <td><?= $a['role_id']; ?></td>
                                <td><?= $a['is_active']; ?></td>
                                <td><?= date('Y', $a['tanggal_input']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
                <div class="page-header">
                    <span class="fas fa-table text-dark mt-2"> Data
                        Menu</span>
                    <a href="<?= base_url('menu'); ?>"><i class="fas fa-search text-dark mt-2 float-right"> Tampilkan</i></a>
                </div>
                <div class="table-responsive">
                    <table class="table mt-3" id="table-datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($menu as $m) { ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $m['nama_menu']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end of row table-->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->