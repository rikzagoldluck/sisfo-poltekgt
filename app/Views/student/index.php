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
        <h1 class="h3 mb-0 text-gray-800">Indeks Prestasi</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Card IPK -->
    <div class="row mb-4">

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                KELULUSAN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ip['nilaitotal']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Earnings (Monthly) Card Example -->
        <div class="col mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                KUMULATIF</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ip['akademik']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-medal fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">MAGANG
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $ip['magang']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-industry fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->

        <!-- Pending Requests Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                KEDISIPLINAN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ip['poin']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-heart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Statistik -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Linimasa</h1> -->
    <div class="row">

        <div class="col">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Linimasa IP per semester</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Table -->

            <div class="row">

                <div class="col-lg">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Perincian Nilai</h6>
                        </div>
                        <div class="card-body">
                            <div class="btn-group-sm mb-4" role="group" aria-label="Basic example">
                                Switch Kolom: <button class="btn btn-info toggle-vis" type="button" data-column="0">1</button> - <button class="btn btn-info toggle-vis" type="button" data-column="1">2</button> - <button class="btn btn-info toggle-vis" type="button" data-column="2">3</button> - <button class="btn btn-info toggle-vis" type="button" data-column="3">4</button> - <button class="btn btn-info toggle-vis" type="button" data-column="4">5</button> - <button class="btn btn-info toggle-vis" type="button" data-column="5">6</button>
                            </div>
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>TA</th>
                                            <th>Mata Kuliah</th>
                                            <th>Nilai Akhir</th>
                                            <th>Indeks</th>
                                            <th>SKS</th>
                                            <th>Dosen</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>TA</th>
                                            <th>Mata Kuliah</th>
                                            <th>Nilai Akhir</th>
                                            <th>Indeks</th>
                                            <th>SKS</th>
                                            <th>Dosen</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($nilai as $n) : ?>
                                            <tr>
                                                <td><?= $n['tahunakademik'] ?></td>
                                                <td><?= $n['namamk'] ?></td>
                                                <td><?= $n['akhir'] ?></td>
                                                <td><?= $n['huruf'] ?></td>
                                                <td><?= $n['sks'] ?></td>
                                                <td><?= $n['dosen'] ?></td>
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
        <script src="<?= base_url(); ?>/vendor/chart.js/Chart.min.js"></script>
        <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>/vendor/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>/js/datatables/ipk-datatable.js"></script>

        <script type="text/javascript">
            let php = "<?php echo json_encode($linimasa); ?>"
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }


            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5', 'Semester 6'],
                    datasets: [{
                        label: "IP",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: JSON.parse(php)
                    }],
                },
                options: {
                    onclick: (e) => {
                        console.log(Chart);
                        const canvasPos = Chart.helpers.getRelativePosition(e, chart);

                        const dataX = chart.scales.x.getValueForPixel(canvasPos.x)
                        const datay = chart.scales.y.getValueForPixel(canvasPos.y)
                        console.log(dataX);
                        console.log(dataY);
                    },
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 4,
                                padding: 1,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value, 2, ',');
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel, 2, ',');
                            }
                        }
                    },
                    // plugins: [{
                    //     id: 'myAreaChart',
                    //     beforeEvent(chart, args, pluginOptions) {
                    //         const event = args.event;
                    //         if (event.type === 'click') {
                    //             alert('mouseout')
                    //         }
                    //     }
                    // }]
                }
            });
        </script>
        <?= $this->endSection(); ?>