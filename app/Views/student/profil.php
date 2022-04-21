<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Ku</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="row">
        <div class="col-md-7 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 <?php

                                                if (strtolower($student['programstudi']) === 'teknik elektronika') {
                                                    echo 'border-bottom-danger';
                                                } else if ($student['programstudi'] === 'Teknik Mesin') {
                                                    echo 'border-bottom-primary';
                                                } else if ($student['programstudi'] === 'Teknik Industri') {
                                                    echo 'border-bottom-info';
                                                } else {
                                                    echo 'border-bottom-info';
                                                } ?>
                                                        ">
                    <h6 class="m-0 font-weight-bold text-dark"><?= $student['nama']; ?></h6>
                </div>
                <div class="row no-gutters align-items-center">
                    <div class="col-md-4 p-2">
                        <img src="<?= base_url(); ?>/img/<?php if (session()->get('user_jk') === "laki-laki") {
                                                                echo 'default.svg';
                                                            } else {
                                                                echo 'undraw_profile_1.svg';
                                                            } ?>" alt="foto profil" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- <h5 class="card-title"></h5> -->
                            <p class="card-text"><?= $student['kelas']; ?></p>
                            <!-- <p class="card-text text-<?php if ($student['programstudi'] === 'Teknik Elektronika') {
                                                                echo 'danger';
                                                            } elseif ($student['programstudi'] === 'Teknik Mesin') {
                                                                echo 'primary';
                                                            } elseif ($student['programstudi'] === 'Teknik Industri') {
                                                                echo 'success';
                                                            } else {
                                                                echo 'warning';
                                                            } ?>"><?= $student['programstudi']; ?></p> -->
                            <p class="card-text"><?= $student['tempatlahir']; ?>, <?= $student['tanggallahir']; ?></p>
                            <p class="card-text text-muted">Tahun masuk - <?= $student['tahunmasuk']; ?></p>
                            <p class="card-text text-muted">PA - <?= $student['pembimbing']; ?></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>