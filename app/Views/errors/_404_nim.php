<?= $this->extend('templates/index'); ?>
<?= $this->section('page-css'); ?>

<style>

</style>
<?= $this->endSection(); ?>
<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <p class="text-gray-500 mb-0">Anda tidak mempunyai akses ke halaman presensi magang</p>
        <a href="<?= base_url('/student'); ?>">&larr; Back to Dashboard</a>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>