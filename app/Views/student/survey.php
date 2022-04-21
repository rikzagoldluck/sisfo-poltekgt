<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-info"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Dosen</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <form action="<?= base_url('student/insert_survey'); ?>" method="post">
        <!-- <input type="hidden" name="id" value="37261"> -->

        <div class="row ">
            <div class="col-sm-4 col-md-8 mb-2">
                <select class="custom-select" id="matkul" name="mk" required>
                    <?php foreach ($mk as $m) : ?>
                        <option value="<?= $m['namamk']; ?>"><?= $m['namamk']; ?> - <?= $m['dosen']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-auto mb-2">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>

        </div>
        <div class="row" id="penilaian-container"></div>
    </form>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>

<?= $this->section('page-js'); ?>
<script src="<?= base_url(); ?>/js/penilaian-dosen.js"></script>
<?= $this->endSection(); ?>