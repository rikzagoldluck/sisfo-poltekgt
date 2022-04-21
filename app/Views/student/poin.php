<?= $this->extend('templates/index'); ?>

<?= $this->section('page-css'); ?>
<link href="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/vendor/datatables/responsive.dataTables.min.css" rel="stylesheet">
<?= $this->endSection(); ?>
<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Catatan Poin Ku</h1>
    </div>

    <!-- Card IPK -->
    <div class="row mb-4">

        <!-- Plus -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                PLUS</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $plus; ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-plus fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Minus -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">MINUS
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $minus; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">

                            <i class="fas fa-minus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total -->
        <div class="col-xl-4 mb-4">
            <div class="card border-left-<?= ($plus + $minus < 0) ? 'danger' : 'success'  ?> shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-<?= ($plus + $minus < 0) ? 'danger' : 'success'  ?> text-uppercase mb-1">
                                Total</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $plus + $minus; ?></div>
                                </div>
                                <div class="col text-dark">
                                    <?= ($plus + $minus < 0) ? '<div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: calc(10% + <?= $plus + $minus; ?>%) " aria-valuenow="<?= $plus + $minus; ?>" aria-valuemin="0" aria-valuemax="90"></div>
                                    </div>' : 'Bagus, tingkatkan terus'  ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-<?= ($plus + $minus < 0) ? 'angles-up' : 'thumbs-up'  ?> fa-2x text-dark-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>




    </div>

    <!-- Statistik -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Linimasa</h1> -->
    <div class="row">

        <div class="col">
            <div class="row">

                <div class="col-lg">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Perincian Poin</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="tabel-poin" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Poin</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Poin</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($poins as $poin) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>

                                                <td><?= $poin['poin']; ?></td>
                                                <td><?= $poin['keterangan']; ?></td>
                                                <td><?= $poin['tanggal']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <?= $this->endSection(); ?>

        <?= $this->section('page-js'); ?>
        <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>/vendor/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>/js/datatables/poin-datatable.js"></script>
        <?= $this->endSection(); ?>