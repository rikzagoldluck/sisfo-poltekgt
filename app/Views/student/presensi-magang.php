<?= $this->extend('templates/index'); ?>

<?= $this->section('page-css'); ?>
<!-- leaflet -->
<link rel="stylesheet" href="<?= base_url(); ?>/css/leaflet.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/css/leaflet-routing-machine.css" />

<?= $this->endSection(); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="overlay"></div>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Presensi Magang</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="swal" data-swal="<?= session()->getFlashdata('msg'); ?>"></div>

    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->

            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pemetaan Lokasi</h6>
                </div>


                <div id="mapid" class="card-img-top rounded p-3 px-5 border-bottom-secondary" style="height: 320px;">
                    <div class="d-flex justify-content-center align-items-center" style="display: none;" id="spinner">
                        <div class="spinner-grow text-primary " role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="card-body justify-content-center text-center">
                    <form action="<?= base_url('student/insert_absen'); ?>" method="POST" id="formabsen">
                        <div class="row g-y g-2">
                            <!-- https://script.google.com/macros/s/AKfycbwbOeDP22Us9LJydg0JrVKQCPqKmpm9bFfxIo29VFvecVT-iAWlfkWXpGLv_lMKxa1O/exec -->
                            <div class="col-12">
                                <input type="hidden" name="NIM" value="<?= $student['nim'] ?>">
                                <input type="hidden" name="NAMA" value="<?= $student['nama'] ?>">
                                <input type="hidden" name="GROUP" value="<?= $student['kelompok'] ?>">
                                <input type="hidden" name="PENEMPATAN" value="<?= $student['area'] ?>">
                                <input type="hidden" name="GEOCODE" id="geocode">
                                <input type="hidden" name="JARAK" id="jarak">
                                <input type="hidden" name="TANGGAL" id="tanggal">
                                <!-- <input type="hidden" name="MASUK" id="masuk">
                                <input type="hidden" name="KELUAR" id="keluar"> -->
                                <h5 class="card-title"><?= session()->get('user_name') ?> - <?= session()->get('user_nim') ?></h5>


                            </div>
                            <div class="col-sm-12 col-md-12 text-center justify-content-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check form-check-inline radio-cont">
                                            <input class="form-check-input bg-success" type="radio" name="KET" id="inlineRadio1" value="H" required checked>
                                            <label class="form-check-label text-dark" for="inlineRadio1">Hadir</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check form-check-inline radio-cont">
                                            <input class="form-check-input" type="radio" name="KET" id="inlineRadio2" value="I" required>
                                            <label class="form-check-label text-dark" for="inlineRadio2">Izin</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check form-check-inline radio-cont">
                                            <input class="form-check-input" type="radio" name="KET" id="inlineRadio3" value="S" required>
                                            <label class="form-check-label text-dark" for="inlineRadio3">Sakit</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2 justify-content-between">
                                <button type="submit" <?= (session()->getFlashdata('msg') === 'Presensi masuk berhasil' || session()->getFlashdata('msg') === 'Anda sudah melakukan presensi hari ini' ? 'disabled' : ''); ?> name="func" value="Simpan" class="btn btn-primary w-100 mb-2" id="btn-masuk">Masuk</button>
                                <button type="submit" <?= (session()->getFlashdata('msg') === 'Presensi pulang berhasil' ? 'disabled' : ''); ?> name="func" value="PULANG" class="btn btn-danger w-100" id="btn-pulang">Pulang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>
<?= $this->section('page-js'); ?>

<script src="<?= base_url(); ?>/js/leaflet/leaflet.js"></script>
<script src="<?= base_url(); ?>/js/leaflet/leaflet-routing-machine.js"></script>
<script src="<?= base_url(); ?>/js/leaflet/script.js"></script>

<script>
    let swal = $('.swal').data('swal');
    console.log(swal)
    if (swal) {
        Swal.fire(
            'Haloo!',
            swal,
            'info'
        )
    }
</script>
<?= $this->endSection(); ?>