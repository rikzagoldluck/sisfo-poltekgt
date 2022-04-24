<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no , maximum-scale=1.0, user-scalable=no">

    <meta name="description" content="SISFO POLTEK GT">
    <meta name="author" content="Rikza">
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon" />   -->
    <link rel="manifest" href="<?= base_url(); ?>/manifest.json">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>/images/icon-152x152.png">
    <meta name="theme-color" content="white" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="SISFO POLTEK-GT">
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>/images/icon-144x144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <style>
        .overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            cursor: progress;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/homepage.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/utilities.css">

    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        async function m() {
            const {
                value: password
            } = await Swal.fire({
                title: 'Massukkan password',
                input: 'password',
                inputLabel: 'Password',
                inputPlaceholder: 'Enter your password',
                inputAttributes: {
                    maxlength: 5,
                    autocapitalize: 'off',
                    autocorrect: 'off'
                }
            })

            if (password === "sisfo") {
                $.getJSON('<?= base_url('student/migrate'); ?>', function(data) {
                    console.log(data);
                    if (data.status === "ok") {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Data absen berhasil di migrasi',
                            icon: 'success',
                        });
                    }
                })

            } else {

                Swal.fire(`Wrong!!!, Entered password: ${password}`)
            }
        }
    </script>


    <title>SISFO PGT - <?= $title; ?></title>
</head>

<body>
    <div class="overlay"></div>
    <!-- Navbar -->
    <div>
        <p>Tolong aktifkan PWA dengan menekan tombol dibawah ini, untuk performa web lebih baik</p>
        <button id="enable">Aktifkan PWA</button>
    </div>
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white pt-lg-40 pb-lg-40 pt-30 pb-50">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url(); ?>/img/logo/poltek.png" alt="logo_poltekgt" width="60px">
                    <!-- <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="60" height="60">
                            <circle cx="30" cy="30" r="30" fill="#3546AB" />
                        </mask>
                        <g mask="url(#mask0)">
                            <circle cx="30" cy="30" r="30" fill="#00BAFF" />
                            <path d="M41.5001 35.0001C52.3001 38.2001 49.6668 48.0001 47.0001 52.5001L71.0001 60.5001L79.5001 -12.9999C63.6667 -13.8333 29.5001 -14.9999 19.5001 -12.9999C7.00007 -10.4999 13.5001 4.00006 12.0001 14.0001C10.5001 24.0001 28.0001 31.0001 41.5001 35.0001Z" fill="#4D17E2" />
                            <path d="M54.495 47.785C54.495 51.285 53.655 54.54 51.975 57.55C50.295 60.56 47.74 63.01 44.31 64.9C40.88 66.79 36.645 67.735 31.605 67.735C26.705 67.735 22.33 66.86 18.48 65.11C14.7 63.29 11.655 60.84 9.345 57.76C7.105 54.61 5.81 51.04 5.46 47.05H15.645C15.855 49.15 16.555 51.215 17.745 53.245C19.005 55.205 20.755 56.85 22.995 58.18C25.305 59.44 28.07 60.07 31.29 60.07C35.49 60.07 38.71 58.95 40.95 56.71C43.19 54.47 44.31 51.6 44.31 48.1C44.31 45.09 43.505 42.64 41.895 40.75C40.355 38.86 38.43 37.39 36.12 36.34C33.81 35.22 30.66 34.03 26.67 32.77C21.98 31.23 18.2 29.795 15.33 28.465C12.53 27.065 10.115 25 8.085 22.27C6.125 19.54 5.145 15.935 5.145 11.455C5.145 7.60499 6.055 4.20999 7.875 1.27C9.765 -1.67 12.425 -3.945 15.855 -5.555C19.355 -7.165 23.45 -7.97 28.14 -7.97C35.42 -7.97 41.195 -6.185 45.465 -2.615C49.735 0.884996 52.22 5.365 52.92 10.825H42.63C42.07 7.885 40.565 5.295 38.115 3.055C35.665 0.814997 32.34 -0.305003 28.14 -0.305003C24.29 -0.305003 21.21 0.709996 18.9 2.73999C16.59 4.69999 15.435 7.5 15.435 11.14C15.435 14.01 16.17 16.355 17.64 18.175C19.18 19.925 21.07 21.325 23.31 22.375C25.55 23.355 28.63 24.475 32.55 25.735C37.31 27.275 41.125 28.745 43.995 30.145C46.935 31.545 49.42 33.68 51.45 36.55C53.48 39.35 54.495 43.095 54.495 47.785Z" fill="white" />
                        </g>
                    </svg> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto text-lg gap-lg-0 gap-2">
                        <li class="nav-item my-auto">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="#fitur">Fitur</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="#cari-jurnal">Cari Jurnal</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="#ip-tertinggi">IP Tertinggi</a>
                        </li>
                        <li class="nav-item my-auto me-lg-20">
                            <a class="nav-link" href="<?= base_url('login'); ?>">Absen Magang</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="btn btn-sign-in d-flex justify-content-center ms-lg-2 rounded-pill" href="<?= base_url('login'); ?>" role="button">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <!-- Header -->
    <section class="header pt-lg-60 pb-50">
        <div class="container-xxl container-fluid">
            <div class="row gap-lg-0 gap-5">
                <div class="col-lg-6 col-12 my-auto">
                    <p class="text-support text-lg color-palette-2">
                        Halo mahasiswa,
                    </p>
                    <h1 class="header-title color-palette-1 fw-bold">
                        <a onclick="m()" class="text-decoration-none" style="color: inherit; cursor: inherit;">S</a>elamat datang, <span class="d-sm-inline d-none">anda</span><span class="d-sm-none d-inline">anda
                        </span><span class="underline-blue"> sedang mengakses</span> <br class="d-sm-block d-none"> <span class="underline-blue">WEB SISFO POLTEK GT</span>
                    </h1>
                    <p class="mt-30 mb-40 text-lg color-palette-1">
                        Silakan masuk untuk melihat capaian IPK atau<br class="d-md-block d-none"> gulir kebawah untuk melihat fitur lain
                    </p>
                    <div class="d-flex flex-lg-row flex-column gap-4">
                        <a class="btn btn-get text-lg text-white rounded-pill" href="<?= base_url('login'); ?>" role="button">Masuk</a>
                        <a class="btn-learn text-lg color-palette-1 my-auto text-center" href="#fitur" role="button">Lihat fitur</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 d-lg-block d-none">
                    <div class="d-flex justify-content-lg-end justify-content-center me-lg-5">
                        <div class="position-relative" data-aos="zoom-in">
                            <img src="<?= base_url() ?>/img/gedung1.jpg" class="img-fluid rounded" alt="Gedung 1">
                            <div class="card left-card position-absolute border-0">
                                <div class="d-flex align-items-center mb-16 gap-3">
                                    <img src="<?= base_url(); ?>/img/logo/poltek.jpg" width="40" height="40" class="rounded-pill" alt="#">
                                    <div>
                                        <p class="text-xs fw-medium color-palette-1 m-0">Politeknik <br>Gajah Tunggal</p>
                                        <p class="text-xs fw-light color-palette-2 m-0">Tangerang</p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z" fill="#FEBD57" />
                                    </svg>
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z" fill="#FEBD57" />
                                    </svg>
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z" fill="#FEBD57" />
                                    </svg>
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z" fill="#FEBD57" />
                                    </svg>
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z" fill="#FEBD57" />
                                    </svg>
                                </div>
                            </div>
                            <div class="card right-card position-absolute border-0">
                                <div class="position-relative d-flex flex-row justify-content-center mb-1 ">
                                    <img src="<?= base_url(); ?>/img/logo/banpt.png" class="rounded-pill" alt="ban-pt" width="100" height="100">
                                    <!-- <p class="right-card-support text-white text-xxs text-center position-absolute m-0">
                                        New</p> -->
                                </div>
                                <div>
                                    <p class="text-xs text-center m-0 fw-medium color-palette-1">Terakreditasi</p>
                                    <p class="fw-light text-center m-0 color-palette-2 text-xs">BAN-PT</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur-fitur -->
    <section class="featured-game pt-50 pb-50" id="fitur">
        <div class="container-fluid">
            <h2 class="text-4xl fw-bold color-palette-1 mb-30">Fitur-Fitur <br> Aplikasi
            </h2>
            <div class="d-flex flex-row flex-lg-wrap overflow-setting justify-content-lg-between gap-lg-3 gap-4" data-aos="fade-up">
                <div class="featured-game-card position-relative">
                    <a href="<?= base_url('login'); ?>">
                        <div class="blur-sharp">
                            <img src="<?= base_url(); ?>/img/illustration/lihat-ipk.svg" width="205" height="270" alt="">
                        </div>
                        <div class="cover position-absolute bottom-0 m-32">
                            <div class="d-flex flex-column h-100 justify-content-between text-decoration-none">
                                <div class="game-icon mx-auto">
                                    <svg width="54" height="36" viewBox="0 0 54 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M48.8309 6.33404C41.7479 -5.30296 31.0779 2.79304 31.0779 2.79304C30.3859 3.31604 29.1099 3.74604 28.2429 3.74804L25.3849 3.75004C24.5179 3.75104 23.2419 3.32104 22.5509 2.79804C22.5509 2.79804 11.8799 -5.29996 4.79595 6.33704C-2.28605 17.97 0.567947 30.639 0.567947 30.639C1.06795 33.741 2.71595 35.811 5.82595 35.551C8.92695 35.292 15.6579 27.197 15.6579 27.197C16.2139 26.53 17.3789 25.985 18.2439 25.985L35.3779 25.982C36.2439 25.982 37.4079 26.527 37.9629 27.194C37.9629 27.194 44.6949 35.289 47.8009 35.548C50.9069 35.808 52.5589 33.736 53.0559 30.636C53.0549 30.636 55.9139 17.969 48.8309 6.33404ZM20.3739 15.806H16.6999V19.347C16.6999 19.347 15.9219 19.941 14.7179 19.926C13.5159 19.908 12.9719 19.278 12.9719 19.278V15.807H9.50195C9.50195 15.807 9.06895 15.363 8.95295 14.194C8.83895 13.025 9.43195 12.08 9.43195 12.08H13.1069V8.40604C13.1069 8.40604 13.8629 8.00104 14.9499 8.03204C16.0379 8.06604 16.8349 8.47504 16.8349 8.47504L16.8199 12.079H20.2899C20.2899 12.079 20.8959 12.857 20.9459 13.797C20.9959 14.738 20.3739 15.806 20.3739 15.806ZM37.2259 19.842C35.6169 19.842 34.3199 18.541 34.3199 16.934C34.3199 15.324 35.6169 14.026 37.2259 14.026C38.8279 14.026 40.1349 15.324 40.1349 16.934C40.1349 18.542 38.8279 19.842 37.2259 19.842ZM37.2259 11.841C35.6169 11.841 34.3199 10.541 34.3199 8.93404C34.3199 7.32404 35.6169 6.02604 37.2259 6.02604C38.8279 6.02604 40.1349 7.32404 40.1349 8.93404C40.1349 10.542 38.8279 11.841 37.2259 11.841ZM44.4679 16.136C42.8589 16.136 41.5619 14.836 41.5619 13.228C41.5619 11.619 42.8589 10.32 44.4679 10.32C46.0699 10.32 47.3769 11.619 47.3769 13.228C47.3769 14.836 46.0699 16.136 44.4679 16.136Z" fill="white" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="fw-semibold text-dark text-xl m-0">Lihat IPK</p>
                                    <p class="fw-light text-dark m-0">Existing</p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="featured-game-card position-relative">
                    <a href="#">
                        <div class="blur-sharp">
                            <img src="<?= base_url(); ?>/img/illustration/cari-jurnal.svg" width="205" height="270" alt="">
                        </div>
                        <div class="cover position-absolute bottom-0 m-32">
                            <div class="d-flex flex-column h-100 justify-content-between text-decoration-none">
                                <div class="game-icon mx-auto">
                                    <svg width="54" height="36" viewBox="0 0 54 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M48.8309 6.33404C41.7479 -5.30296 31.0779 2.79304 31.0779 2.79304C30.3859 3.31604 29.1099 3.74604 28.2429 3.74804L25.3849 3.75004C24.5179 3.75104 23.2419 3.32104 22.5509 2.79804C22.5509 2.79804 11.8799 -5.29996 4.79595 6.33704C-2.28605 17.97 0.567947 30.639 0.567947 30.639C1.06795 33.741 2.71595 35.811 5.82595 35.551C8.92695 35.292 15.6579 27.197 15.6579 27.197C16.2139 26.53 17.3789 25.985 18.2439 25.985L35.3779 25.982C36.2439 25.982 37.4079 26.527 37.9629 27.194C37.9629 27.194 44.6949 35.289 47.8009 35.548C50.9069 35.808 52.5589 33.736 53.0559 30.636C53.0549 30.636 55.9139 17.969 48.8309 6.33404ZM20.3739 15.806H16.6999V19.347C16.6999 19.347 15.9219 19.941 14.7179 19.926C13.5159 19.908 12.9719 19.278 12.9719 19.278V15.807H9.50195C9.50195 15.807 9.06895 15.363 8.95295 14.194C8.83895 13.025 9.43195 12.08 9.43195 12.08H13.1069V8.40604C13.1069 8.40604 13.8629 8.00104 14.9499 8.03204C16.0379 8.06604 16.8349 8.47504 16.8349 8.47504L16.8199 12.079H20.2899C20.2899 12.079 20.8959 12.857 20.9459 13.797C20.9959 14.738 20.3739 15.806 20.3739 15.806ZM37.2259 19.842C35.6169 19.842 34.3199 18.541 34.3199 16.934C34.3199 15.324 35.6169 14.026 37.2259 14.026C38.8279 14.026 40.1349 15.324 40.1349 16.934C40.1349 18.542 38.8279 19.842 37.2259 19.842ZM37.2259 11.841C35.6169 11.841 34.3199 10.541 34.3199 8.93404C34.3199 7.32404 35.6169 6.02604 37.2259 6.02604C38.8279 6.02604 40.1349 7.32404 40.1349 8.93404C40.1349 10.542 38.8279 11.841 37.2259 11.841ZM44.4679 16.136C42.8589 16.136 41.5619 14.836 41.5619 13.228C41.5619 11.619 42.8589 10.32 44.4679 10.32C46.0699 10.32 47.3769 11.619 47.3769 13.228C47.3769 14.836 46.0699 16.136 44.4679 16.136Z" fill="white" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="fw-semibold text-dark text-xl m-0">Cari Jurnal</p>
                                    <p class="fw-light text-dark m-0">Existing</p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="featured-game-card position-relative">
                    <a href="<?= base_url('login'); ?>">
                        <div class="blur-sharp">
                            <img src="<?= base_url(); ?>/img/illustration/lihat-poin.svg" width="205" height="270" alt="">
                        </div>
                        <div class="cover position-absolute bottom-0 m-32">
                            <div class="d-flex flex-column h-100 justify-content-between text-decoration-none">
                                <div class="game-icon mx-auto">
                                    <svg width="54" height="36" viewBox="0 0 54 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M48.8309 6.33404C41.7479 -5.30296 31.0779 2.79304 31.0779 2.79304C30.3859 3.31604 29.1099 3.74604 28.2429 3.74804L25.3849 3.75004C24.5179 3.75104 23.2419 3.32104 22.5509 2.79804C22.5509 2.79804 11.8799 -5.29996 4.79595 6.33704C-2.28605 17.97 0.567947 30.639 0.567947 30.639C1.06795 33.741 2.71595 35.811 5.82595 35.551C8.92695 35.292 15.6579 27.197 15.6579 27.197C16.2139 26.53 17.3789 25.985 18.2439 25.985L35.3779 25.982C36.2439 25.982 37.4079 26.527 37.9629 27.194C37.9629 27.194 44.6949 35.289 47.8009 35.548C50.9069 35.808 52.5589 33.736 53.0559 30.636C53.0549 30.636 55.9139 17.969 48.8309 6.33404ZM20.3739 15.806H16.6999V19.347C16.6999 19.347 15.9219 19.941 14.7179 19.926C13.5159 19.908 12.9719 19.278 12.9719 19.278V15.807H9.50195C9.50195 15.807 9.06895 15.363 8.95295 14.194C8.83895 13.025 9.43195 12.08 9.43195 12.08H13.1069V8.40604C13.1069 8.40604 13.8629 8.00104 14.9499 8.03204C16.0379 8.06604 16.8349 8.47504 16.8349 8.47504L16.8199 12.079H20.2899C20.2899 12.079 20.8959 12.857 20.9459 13.797C20.9959 14.738 20.3739 15.806 20.3739 15.806ZM37.2259 19.842C35.6169 19.842 34.3199 18.541 34.3199 16.934C34.3199 15.324 35.6169 14.026 37.2259 14.026C38.8279 14.026 40.1349 15.324 40.1349 16.934C40.1349 18.542 38.8279 19.842 37.2259 19.842ZM37.2259 11.841C35.6169 11.841 34.3199 10.541 34.3199 8.93404C34.3199 7.32404 35.6169 6.02604 37.2259 6.02604C38.8279 6.02604 40.1349 7.32404 40.1349 8.93404C40.1349 10.542 38.8279 11.841 37.2259 11.841ZM44.4679 16.136C42.8589 16.136 41.5619 14.836 41.5619 13.228C41.5619 11.619 42.8589 10.32 44.4679 10.32C46.0699 10.32 47.3769 11.619 47.3769 13.228C47.3769 14.836 46.0699 16.136 44.4679 16.136Z" fill="white" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="fw-semibold text-dark text-xl m-0">Lihat Poin / Kondite</p>
                                    <p class="fw-light text-dark m-0">Existing</p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="featured-game-card position-relative">
                    <a href="<?= base_url('login'); ?>">
                        <div class="blur-sharp">
                            <img src="<?= base_url(); ?>/img/illustration/penilaian-dosen.svg" width="205" height="270" alt="">
                        </div>
                        <div class="cover position-absolute bottom-0 m-32">
                            <div class="d-flex flex-column h-100 justify-content-between text-decoration-none">
                                <div class="game-icon mx-auto">
                                    <svg width="54" height="36" viewBox="0 0 54 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M48.8309 6.33404C41.7479 -5.30296 31.0779 2.79304 31.0779 2.79304C30.3859 3.31604 29.1099 3.74604 28.2429 3.74804L25.3849 3.75004C24.5179 3.75104 23.2419 3.32104 22.5509 2.79804C22.5509 2.79804 11.8799 -5.29996 4.79595 6.33704C-2.28605 17.97 0.567947 30.639 0.567947 30.639C1.06795 33.741 2.71595 35.811 5.82595 35.551C8.92695 35.292 15.6579 27.197 15.6579 27.197C16.2139 26.53 17.3789 25.985 18.2439 25.985L35.3779 25.982C36.2439 25.982 37.4079 26.527 37.9629 27.194C37.9629 27.194 44.6949 35.289 47.8009 35.548C50.9069 35.808 52.5589 33.736 53.0559 30.636C53.0549 30.636 55.9139 17.969 48.8309 6.33404ZM20.3739 15.806H16.6999V19.347C16.6999 19.347 15.9219 19.941 14.7179 19.926C13.5159 19.908 12.9719 19.278 12.9719 19.278V15.807H9.50195C9.50195 15.807 9.06895 15.363 8.95295 14.194C8.83895 13.025 9.43195 12.08 9.43195 12.08H13.1069V8.40604C13.1069 8.40604 13.8629 8.00104 14.9499 8.03204C16.0379 8.06604 16.8349 8.47504 16.8349 8.47504L16.8199 12.079H20.2899C20.2899 12.079 20.8959 12.857 20.9459 13.797C20.9959 14.738 20.3739 15.806 20.3739 15.806ZM37.2259 19.842C35.6169 19.842 34.3199 18.541 34.3199 16.934C34.3199 15.324 35.6169 14.026 37.2259 14.026C38.8279 14.026 40.1349 15.324 40.1349 16.934C40.1349 18.542 38.8279 19.842 37.2259 19.842ZM37.2259 11.841C35.6169 11.841 34.3199 10.541 34.3199 8.93404C34.3199 7.32404 35.6169 6.02604 37.2259 6.02604C38.8279 6.02604 40.1349 7.32404 40.1349 8.93404C40.1349 10.542 38.8279 11.841 37.2259 11.841ZM44.4679 16.136C42.8589 16.136 41.5619 14.836 41.5619 13.228C41.5619 11.619 42.8589 10.32 44.4679 10.32C46.0699 10.32 47.3769 11.619 47.3769 13.228C47.3769 14.836 46.0699 16.136 44.4679 16.136Z" fill="white" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="fw-semibold text-dark text-xl m-0">Penilaian Dosen</p>
                                    <p class="fw-light text-dark m-0">Existing</p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="featured-game-card position-relative">
                    <a href="<?= base_url('login'); ?>">
                        <div class="blur-sharp">
                            <img src="<?= base_url(); ?>/img/illustration/absen-magang.svg" width="205" height="270" alt="">
                        </div>
                        <div class="cover position-absolute bottom-0 m-32">
                            <div class="d-flex flex-column h-100 justify-content-between text-decoration-none">
                                <div class="game-icon mx-auto">
                                    <svg width="54" height="36" viewBox="0 0 54 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M48.8309 6.33404C41.7479 -5.30296 31.0779 2.79304 31.0779 2.79304C30.3859 3.31604 29.1099 3.74604 28.2429 3.74804L25.3849 3.75004C24.5179 3.75104 23.2419 3.32104 22.5509 2.79804C22.5509 2.79804 11.8799 -5.29996 4.79595 6.33704C-2.28605 17.97 0.567947 30.639 0.567947 30.639C1.06795 33.741 2.71595 35.811 5.82595 35.551C8.92695 35.292 15.6579 27.197 15.6579 27.197C16.2139 26.53 17.3789 25.985 18.2439 25.985L35.3779 25.982C36.2439 25.982 37.4079 26.527 37.9629 27.194C37.9629 27.194 44.6949 35.289 47.8009 35.548C50.9069 35.808 52.5589 33.736 53.0559 30.636C53.0549 30.636 55.9139 17.969 48.8309 6.33404ZM20.3739 15.806H16.6999V19.347C16.6999 19.347 15.9219 19.941 14.7179 19.926C13.5159 19.908 12.9719 19.278 12.9719 19.278V15.807H9.50195C9.50195 15.807 9.06895 15.363 8.95295 14.194C8.83895 13.025 9.43195 12.08 9.43195 12.08H13.1069V8.40604C13.1069 8.40604 13.8629 8.00104 14.9499 8.03204C16.0379 8.06604 16.8349 8.47504 16.8349 8.47504L16.8199 12.079H20.2899C20.2899 12.079 20.8959 12.857 20.9459 13.797C20.9959 14.738 20.3739 15.806 20.3739 15.806ZM37.2259 19.842C35.6169 19.842 34.3199 18.541 34.3199 16.934C34.3199 15.324 35.6169 14.026 37.2259 14.026C38.8279 14.026 40.1349 15.324 40.1349 16.934C40.1349 18.542 38.8279 19.842 37.2259 19.842ZM37.2259 11.841C35.6169 11.841 34.3199 10.541 34.3199 8.93404C34.3199 7.32404 35.6169 6.02604 37.2259 6.02604C38.8279 6.02604 40.1349 7.32404 40.1349 8.93404C40.1349 10.542 38.8279 11.841 37.2259 11.841ZM44.4679 16.136C42.8589 16.136 41.5619 14.836 41.5619 13.228C41.5619 11.619 42.8589 10.32 44.4679 10.32C46.0699 10.32 47.3769 11.619 47.3769 13.228C47.3769 14.836 46.0699 16.136 44.4679 16.136Z" fill="white" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="fw-semibold text-dark text-xl m-0">Absen Magang</p>
                                    <p class="fw-light text-dark m-0">Existing</p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <!-- IP Tertinggi - Feature -->
    <section id="ip-tertinggi" class="feature pt-50 pb-50">
        <div class="container-fluid" data-aos="zoom-in-right">
            <h2 class="text-4xl fw-bold color-palette-1 text-center mb-10">3 peraih IP semester terbesar
            </h2>
            <h5 class="info-ip color-palette-1 text-center mb-30"></h5>
            <div class="row g-3 justify-content-center mb-30">
                <div class="col-4 col-lg-3">
                    <select class="form-select form-select-sm select-prodi" id="selectip" aria-label=".form-select-sm example">
                        <option selected>Pilih Prodi</option>
                        <option value="Teknik Elektronika">Teknik Elektronika</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Industri">Teknologi Industri</option>
                    </select>
                </div>
                <div class="col-4 col-lg-3">
                    <select class="form-select form-select-sm select-tahun" id="selectip" aria-label=".form-select-sm example" disabled>
                        <option selected>Pilih Tahun Masuk</option>
                    </select>
                </div>
            </div>
            <div class="row gap-lg-0 gap-4" id="top3-card">
            </div>
        </div>
    </section>

    <!-- Cari Jurnal -->
    <section class="featured-game pt-50 pb-50" id="cari-jurnal">
        <div class="container-fluid" data-aos="zoom-in-left">
            <h2 class="text-4xl fw-bold color-palette-1 mb-10">Cari Jurnal
            </h2>
            <div class="row g-3">
                <div class="col-lg-8">
                    <form action="<?= base_url('home/cari_jurnal'); ?>" method="post">
                        <div class="input-group mb-3">
                            <input id="searchbar-jurnal" type="text" class="form-control" placeholder="Ketik topik jurnal" aria-label="Ketik topik jurnal" aria-describedby="button-search-jurnal">
                            <button class="btn btn-outline-primary" type="button" id="button-search-jurnal"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 g-3 justify-content-center jurnal-container" data-aos="fade-up">

            </div>
            <div class="row mt-3">
                <div class="col">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end halaman">

                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </section>

    <section class="featured-game pt-50 pb-50">
        <div class="container-fluid" data-aos="flip-up" data-aos-duration="1000">
            <h2 class="text-4xl fw-bold color-palette-1 mb-10">Kritik & Saran
            </h2>
            <div class="row">
                <form name="submit-to-google-sheet">
                    <div class="col mb-3">
                        <div class="form-group">
                            <label for="kritik">Kritik</label>
                            <textarea class="form-control" id="kritik" rows="3" name="kritik" placeholder="Tolong kritik kami"></textarea>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-group">
                            <label for="saran">Saran</label>
                            <textarea class="form-control" id="saran" rows="3" name="saran" placeholder="Berikan saran yang membangun"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>

            <p class="mt-2 text-xs color-palette-1 "><a href="https://docs.google.com/spreadsheets/d/1ffYIvG8cFcApY_ZnNc61Al1PlT14L3HBHtIoxapHlnw/edit?usp=sharing" target="_blank">Klik disini untuk melihat kritik dan saran</a></p>
        </div>
        </div>
    </section>

    <!-- Reached -->
    <!-- <section class="reached pt-50 pb-50">
        <div class="container-fluid">
            <div class="d-flex flex-lg-row flex-column align-items-center justify-content-center gap-lg-0 gap-4">
                <div class="me-lg-35">
                    <p class="text-4xl text-lg-start text-center color-palette-1 fw-bold m-0">290M+</p>
                    <p class="text-lg text-lg-start text-center color-palette-2 m-0">Players Top Up</p>
                </div>
                <div class="vertical-line me-lg-35 ms-lg-35 d-lg-block d-none"></div>
                <div class="horizontal-line mt-6 mb-6 me-lg-35 ms-lg-35 d-lg-none d-block"></div>
                <div class="me-lg-35 ms-lg-35">
                    <p class="text-4xl text-lg-start text-center color-palette-1 fw-bold m-0">12.500</p>
                    <p class="text-lg text-lg-start text-center color-palette-2 m-0">Games Available</p>
                </div>
                <div class="horizontal-line mt-6 mb-6 me-lg-35 ms-lg-35 d-lg-none d-block"></div>
                <div class="vertical-line me-lg-35 ms-lg-35 d-lg-block d-none"></div>
                <div class="me-lg-35 ms-lg-35">
                    <p class="text-4xl text-lg-start text-center color-palette-1 fw-bold m-0">99,9%</p>
                    <p class="text-lg text-lg-start text-center color-palette-2 m-0">Happy Players</p>
                </div>
                <div class="horizontal-line mt-6 mb-6 me-lg-35 ms-lg-35 d-lg-none d-block"></div>
                <div class="vertical-line me-lg-35 ms-lg-35 d-lg-block d-none"></div>
                <div class="me-lg-35 ms-lg-35">
                    <p class="text-4xl text-lg-start text-center color-palette-1 fw-bold m-0">4.7</p>
                    <p class="text-lg text-lg-start text-center color-palette-2 m-0">Rating Worldwide</p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Story -->
    <!-- <section class="story pt-50 pb-50">
        <div class="container-xxl container-fluid">
            <div class="row align-items-center px-lg-5 mx-auto gap-lg-0 gap-4">
                <div class="col-lg-7 col-12 d-lg-flex d-none justify-content-lg-end pe-lg-60" data-aos="zoom-in">
                    <img src="./assets/img/Header-9.png" width="612" height="452" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5 col-12 ps-lg-60">
                    <div class="">
                        <h2 class="text-4xl fw-bold color-palette-1 mb-30">Win the battle.<br> Be the Champion.
                        </h2>
                        <p class="text-lg color-palette-1 mb-30">Kami menyediakan jutaan cara untuk<br class="d-sm-block d-none">
                            membantu players menjadi<br class="d-sm-block d-none"> pemenang sejati</p>
                        <div class="d-md-block d-flex flex-column w-100">
                            <a class="btn btn-read text-lg rounded-pill" href="#" role="button">Read Story</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Footer -->
    <section class="footer pt-50">
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 text-lg-start text-center">
                        <a href="" class="mb-30">
                            <img src="<?= base_url(); ?>/img/logo/poltek.png" alt="logo poltek gt" width="60">
                        </a>
                        <p class="mt-30 text-lg color-palette-1 mb-30">Politeknik Gajah Tunggal</p>
                        <p class="mt-30 text-lg color-palette-1 mb-10">Copyright <?= date('Y'); ?>. All Rights Reserved.</p>

                        <p class="text-xs color-palette-1">This project now lives at <a href="https://github.com/rikzagoldluck/sisfo-poltekgt">https://github.com/rikzagoldluck/sisfo-poltekgt</a>. I turned it into a Github repo so you can, you know, contribute to it by making pull requests.</p>
                    </div>
                    <div class="col-lg-8 mt-lg-0 mt-20">
                        <div class="row gap-sm-0">
                            <!-- <div class="col-md-4 col-6 mb-lg-0 mb-25">
                                <p class="text-lg fw-semibold color-palette-1 mb-12">Company</p>
                                <ul class="list-unstyled">
                                    <li class="mb-6">
                                        <a href="https://poltek-gt.ac.id/v2/" target="_blank" class="text-lg color-palette-1 text-decoration-none">About Us</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="#" class="text-lg color-palette-1 text-decoration-none">Press
                                            Release</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="#" class="text-lg color-palette-1 text-decoration-none">Terms of Use</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="#" class="text-lg color-palette-1 text-decoration-none">Privacy &
                                            Policy</a>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="col-md-8 col-6 mb-lg-0 mb-25">
                                <p class="text-lg fw-semibold color-palette-1 mb-12">Location</p>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.534166735406!2d106.56689061410282!3d-6.1930235623965855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fe4fc675da0f%3A0x84a0e5fc6c009127!2sPoliteknik%20Gajah%20Tunggal!5e0!3m2!1sid!2sid!4v1650796642574!5m2!1sid!2sid" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <!-- <div class="col-md-4 col-6 mb-lg-0 mb-25">
                                <p class="text-lg fw-semibold color-palette-1 mb-12">Support</p>
                                <ul class="list-unstyled">
                                    <li class="mb-6">
                                        <a href="#" class="text-lg color-palette-1 text-decoration-none">Refund
                                            Policy</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="#" class="text-lg color-palette-1 text-decoration-none">Unlock
                                            Rewards</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="#" class="text-lg color-palette-1 text-decoration-none">Live
                                            Chatting</a>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="col-md-4 col-12 mt-lg-0 mt-md-0 mt-25">
                                <p class="text-lg fw-semibold color-palette-1 mb-12">Connect</p>
                                <ul class="list-unstyled">
                                    <li class="mb-6">
                                        <a href="https://poltek-gt.ac.id/v2" class="text-lg color-palette-1 text-decoration-none">official website</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="mailto: rikzasimdigei@gmail.com" class="text-lg color-palette-1 text-decoration-none">rikzasimdigei@gmail.com</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="mailto: administrasi@poltek-gt.ac.id" class="text-lg color-palette-1 text-decoration-none">administrasi@poltek-gt.ac.id</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="tel: 02150993665" class="text-lg color-palette-1 text-decoration-none">021 – 50993665 / 021 – 50993670</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>

    <div class="swal" data-swal="<?= session()->getFlashdata('msg'); ?>"></div>


    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap5.bundle.min.js">
    </script>
    <script src="<?= base_url(); ?>/sweetalert2@11.js"></script>
    <script src="<?= base_url(); ?>/script.js"></script>
    <!-- AOS Animation -->
    <script>
        $('button#button-search-jurnal').click(function() {
            let search = $('input#searchbar-jurnal').val();

            if (search === '') {
                Swal.fire({
                    title: "Maaf!",
                    text: "Tolong masukkan kata kunci",
                    icon: "warning"
                })
                return;
            }
            $('.overlay').css('display', 'block');
            fetch("<?= base_url('home/cari_jurnal'); ?>" + `/${search}`, {
                    method: "get",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.json())
                .then(result => {
                    $('.overlay').css('display', 'none');
                    $('.jurnal-container').html('');

                    let jurnals = result.organic_results
                    $.each(jurnals, function(i, jurnal) {
                        $('.jurnal-container').append(` <div class="col-md-6" data-aos="fade-right">
                        <div class="card">
                            <div class="card-body">${jurnal.title}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">${jurnal.publication_info.summary}></h6>
                                <p class="card-text">${jurnal.snippet}</p>
                                <a href=${jurnal.link}" class="card-link">Baca Jurnal</a>
                                <!-- <a href="#" class="card-link">Another link</a> -->
                            </div>
                        </div>
                        </div>`)
                    })

                    let page = result.pagination.other_pages;
                    // <li class="page-item disabled">
                    //             <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    //         </li>
                    //         <li class="page-item disabled"><a disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Cooming Soon" class="page-link" href="#">1</a></li>
                    $.each(page, function(key, value) {
                        $('.halaman').append(
                            `<li class="page-item"><a class="page-link" href="${value}">${key++}</a></li>`
                        )

                    })
                })
        })

        AOS.init();

        // isi combobox tahun masuk
        let d = new Date();
        let n = new Date().getFullYear();

        d.setFullYear(d.getFullYear() - 3);
        let last = d.getFullYear();


        let select_tahun = document.querySelector('.select-tahun')
        let select = document.querySelectorAll('#selectip')

        for (let i = last; i < n; i++) {
            let tahun = i.toString()
            let opt = new Option(tahun, tahun)
            select_tahun.add(opt, undefined)
            opt = '';
        }

        let prodi, tahun;

        $('.select-prodi').change(function() {
            prodi = this.value;
            $('.select-tahun').prop('disabled', false);
        })

        $('.select-tahun').change(function() {
            $('#overlay').css('display', 'block');
            tahun = this.value;

            $('.info-ip').html(`${prodi} - ${tahun}`);

            fetch("<?= base_url('home/get_nilai_top'); ?>" + `/${prodi}/${tahun}`, {
                    method: "get",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.json())
                .then(result => {
                    $('#overlay').css('display', 'none');
                    $('#top3-card').html("")
                    if (result.status === "ok") {
                        let student = result.data;

                        $.each(student, function(i, data) {
                            $('#top3-card').append(`<div class="col-lg-4" data-aos="fade-up">
                    <div class="card feature-card border-0">
                    <img src="<?= base_url(); ?>/img/icon/${i + 1}.svg" width="80" height="80" class="mb-30">
                        <p class="text-lg color-palette-1 mb-0">${i + 1}. ${data.nama} - ${data.NIM}</p>
                        <p class="fw-semibold text-2xl mt-2 color-palette-1">${data.akademik}</p>
                    </div>
                </div>`)
                        })
                    }
                }).catch(e => {
                    Swal.fire({
                        title: "Maaf",
                        text: "Data tidak ditemukan, karena" + e,
                        icon: "error"
                    })
                })

            $('.select-tahun').val("Pilih Tahun Masuk");
            $('.select-prodi').val("Pilih Prodi");
            $('.select-tahun').prop('disabled', true);

        })


        const scriptURL = 'https://script.google.com/macros/s/AKfycbzcUtWzo2LsXXatUSJjqnnhkSzI_F99c5emG_pTivJqfhYk7_0/exec'
        const form = document.forms['submit-to-google-sheet']

        form.addEventListener('submit', e => {
            $('.overlay').css('display', 'block');
            e.preventDefault()
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => {
                    $('.overlay').css('display', 'none');
                    if (response.ok) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Kritik dan Saran Berhasil disubmit',
                            icon: 'success',
                            // confirmButtonText: 'Cool',
                        })
                    } else if (!response.ok) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Data Gagal disubmit',
                            icon: 'error',
                            // confirmButtonText: 'Cool',
                        });
                    }
                })
                .catch(error => console.error('Error!', error.message))
        })
    </script>

</body>

</html>