<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang <?= session()->get('name') ?>!</h1>
    </div>


    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Movie</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if (!$movie_total) {
                                    echo '0';
                                } else {
                                    echo $movie_total;
                                } ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-film fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Screening</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if (!$screening_total) {
                                    echo '0';
                                } else {
                                    echo $screening_total;
                                } ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah total reservasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if (!$reservation_total) {
                                    echo '0';
                                } else {
                                    echo $reservation_total;
                                } ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-couch fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->