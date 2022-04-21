<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="text-center">
        <div class="error mx-auto" data-text="Coming soon!" style="font-size: 4rem !important;">Coming soon!</div>
        <!-- <p class="lead text-gray-800 mb-5">Coming soon!</p> -->
        <p class="text-gray-500 mb-0">Silahkan compose email ke <a href="mailto:rikzasimdigei@gmail.com">rikzasimdigei@gmail.com</a> untuk kontribusi dalam proyek ini</p>
        <a href="<?= base_url('student'); ?>">&larr; Back to Dashboard</a>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>