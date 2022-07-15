<section class="movie-bg">
    <div class="container container-payment">
        <div class="align-items-center py-4">
            <?= $breadcrumbs ?>
            <div class="shadow-sm bg-light p-4">
                <div class="col">
                    <div class="d-flex justify-content-center border-bottom border-muted border-2">
                        <h4 class="fw-bold" color>Riwayat Pemesanan Anda</h4>
                    </div>
                    <?php
                    if (!empty($history)) {
                        foreach ($history as $row) {
                    ?>
                            <div class="row mt-2 border-top border-2 border-muted pt-2">
                                <div class="col-md-3">
                                    <img class="img-fluid" src="<?= base_url("uploads/movies/{$row['movie_id']}.jpg") ?>" alt="<?= $row['title'] ?>">
                                </div>
                                <div class="col-md-9">
                                    <h5 class="fw-bold my-0" style="color: #4C3575;"><?= $row['title'] ?></h5>
                                    <p class="my-0 fw-bold"><?= $row['name'] ?></p>
                                    <div class="row border-top">
                                        <div class="col-md-6">
                                            <p class="fw-bold my-0 text-muted" style="color: #4C3575;">Tanggal</p>
                                        </div>
                                        <?php
                                        setlocale(LC_ALL, 'id-ID', 'id_ID');
                                        $hari = array(
                                            1 => 'Senin',
                                            'Selasa',
                                            'Rabu',
                                            'Kamis',
                                            'Jumat',
                                            'Sabtu',
                                            'Minggu'
                                        );
                                        $bulan = array(
                                            1 => 'Januari',
                                            'Februari',
                                            'Maret',
                                            'April',
                                            'Mei',
                                            'Juni',
                                            'Juli',
                                            'Agustus',
                                            'September',
                                            'Oktober',
                                            'November',
                                            'Desember'
                                        );
                                        $date = date_create($row['start_time']);
                                        ?>
                                        <div class="col-md-6 text-end">
                                            <p class="mb-0"><?= $hari[date_format($date, 'N')] . ", " . date_format($date, 'd') . " " . $bulan[date_format($date, 'n')] . " " . date_format($date, 'Y') ?></p>
                                            <p class="mt-0"><?= date_format($date, 'h:m') ?></p>
                                        </div>
                                    </div>
                                    <div class="row border-top">
                                        <div class="col-md-6">
                                            <p class="fw-bold my-0 text-muted" style="color: #4C3575;">Tempat duduk</p>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <?php

                                            $db = db_connect();
                                            $seats = $db->query("SELECT seats.name FROM reservations JOIN seats ON reservations.seat_id = seats.id WHERE reservations.screening_id = " . $row['screening_id'] . " AND reservations.paid = 1 AND reservations.user_id = " . session()->get('id'))->getResultArray();
                                            foreach ($seats as $row) {
                                            ?>
                                                <?= $row['name'] ?>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-info text-center">
                            Kamu belum punya riwayat pemesanan tiket.
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>