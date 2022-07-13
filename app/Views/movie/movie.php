<section class="movie-bg">
    <div class="container">
        <div class="align-items-center py-4">
            <div class="col">
                <?= $breadcrumbs ?>
                <div class="shadow-sm bg-light py-3 px-4">
                    <div class="d-flex">
                        <h4 class="fw-bold">NOW PLAYING</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-grid">
                                <img class="movie-cover" src="<?= base_url("uploads/movies/{$movie['id']}.jpg") ?>" alt="<?= $movie['title'] ?>">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between">
                                <h1 class="fw-bold" style="color: #4C3575;"><?= $movie['title'] ?></h1>
                                <p class="text-muted float-end p-2"><i class="fa-solid fa-clock fa-sm"></i> <?= $movie['duration'] ?> Minutes</p>
                            </div>
                            <div class="d-flex">
                                <table class="table table-borderless table-responsive movie-description-table">
                                    <tbody>
                                        <tr>
                                            <td class="attribute">Genre</td>
                                            <td class="colon">:</td>
                                            <td class="value"><?= $movie['genre'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="attribute">Age Rating</td>
                                            <td class="colon">:</td>
                                            <td class="value"><?= $movie['age_rating'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="attribute">Director</td>
                                            <td class="colon">:</td>
                                            <td class="value"><?= $movie['director'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="attribute">Writer</td>
                                            <td class="colon">:</td>
                                            <td class="value"><?= $movie['writer'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="attribute">Stars</td>
                                            <td class="colon">:</td>
                                            <td class="value"><?= $movie['stars'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td class="attribute" colspan="3">
                                                <h5 style="color:#4C3575;">SINOPSIS</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="attribute" colspan="3"><?= $movie['description'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mt-4 overflow">
                        <?php
                        setlocale(LC_ALL, 'id-ID', 'id_ID');
                        $hari = array(
                            1 =>    'Senin',
                            'Selasa',
                            'Rabu',
                            'Kamis',
                            'Jumat',
                            'Sabtu',
                            'Minggu'
                        );
                        $bulan = array(
                            1 =>   'Januari',
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
                        foreach ($screenings as $row) {
                            $date = date_create($row['start_time']);
                        ?>
                            <a href="#" class="hari border border-dark rounded px-4 text-center text-black" data-hari="<?= date_format($date, 'd') ?>" data-bulan="<?= date_format($date, 'm') ?>">
                                <p class="p-0 m-0 fw-bold"><?= $hari[date_format($date, 'N')] ?></p>
                                <small><?= date_format($date, 'd') . " " . $bulan[date_format($date, 'n')] ?></small>
                            </a>&nbsp;
                        <?php
                        }
                        ?>
                    </div>
                    <div class="d-flex mt-3 overflow">
                        <h5 class="fw-bold text-muted">Jam Tayang</h5>
                        <div id="#jadwal"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $(".hari").click(function() {
            var hari = $(this).data("hari"),
                bulan = $(this).data("bulan");

            $.ajax({
                url: "<?= site_url('movies/get_start_time/') ?>",
                type: "post",
                data: {
                    id: <?= $movie['id'] ?>,
                    hari: hari,
                    bulan: bulan
                },
                success: function($data) {
                    var parse = JSON.parse($data, null, 2);

                    console.log(JSON.stringify($parse));
                    $.each($data, function() {

                    })
                }
            })
        })
    });
</script>