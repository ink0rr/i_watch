<section class="movie-bg">
    <div class="container container-payment">
        <div class="align-items-center py-4">
            <div class="shadow-sm bg-light p-4">
                <div class="col">
                    <div class="d-flex justify-content-center border-bottom border-muted border-2">
                        <h4 class="fw-bold" color>Konfirmasi Pembelian</h4>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <table class="table table-borderless table-responsive">
                                <tbody class="mt-0">
                                    <tr>
                                        <td class="attribute pr-2" rowspan="5">
                                            <img class="img" style="width:auto; height:250px" src="<?= base_url("uploads/movies/{$reservation[0]['movie_id']}.jpg") ?>" alt="<?= $reservation[0]['title'] ?>">
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="value pb-0">
                                            <h5 class="fw-bold mx-2 my-0" style="color: #4C3575;"><?= $reservation[0]['title'] ?></h5>
                                            <p class="mx-2 my-0 fw-bold"><?= $reservation[0]['name'] ?></p>
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="value pb-0" colspan="4">
                                            <p class="fw-bold mx-2 my-0 text-muted" style="color: #4C3575;">Tanggal</p>
                                        </td>
                                        <td class="value text-end fw-bold  pb-0">
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
                                            $date = date_create($reservation[0]['start_time']);
                                            ?>
                                            <p class="mb-0"><?= $hari[date_format($date, 'N')] . ", " . date_format($date, 'd') . " " . $bulan[date_format($date, 'n')] . " " . date_format($date, 'Y') ?></p>
                                            <p class="mt-0"><?= date_format($date, 'h:m') ?></p>
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="value pb-0" colspan="4">
                                            <p class="fw-bold mx-2 my-0 text-muted" style="color: #4C3575;">Tempat duduk</p>
                                        </td>
                                        <td class="value text-end fw-bold">
                                            <?php
                                            foreach ($seats as $row) {
                                                echo $row['name'] . "&nbsp;";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="value pb-0" colspan="4">
                                            <p class="fw-bold mx-2 my-0 text-muted" style="color: #4C3575;">Total harga</p>
                                        </td>
                                        <td class="value text-end fw-bold">
                                            Rp<?= $total_price ?>,-
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="p-0">
                                            <a class="btn btn-success w-100 fw-bold mb-2" href="<?= base_url('/reservasi/pembayaran/bayar/' . $reservation[0]['screening_id']) ?>">Bayar</a>
                                            <a class="btn btn-danger w-100 fw-bold" href="<?= base_url('/reservasi/pembayaran/batal/' . $reservation[0]['screening_id']) ?>">Batal</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>