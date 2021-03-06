<section class="movie-bg">
    <div class="container">
        <div class="align-items-center py-4">
            <div class="col">
                <?= $breadcrumbs ?>
                <div class="shadow-sm bg-light p-4">
                    <div class="d-flex">
                        <h4 class="fw-bold">NOW PLAYING</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-grid">
                                <img class="movie-cover" src="<?= base_url("uploads/movies/{$movie['image']}") ?>" alt="<?= $movie['title'] ?>">
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
                    <div class="col justify-content-center shadow py-3 px-3 mt-3" style="height:200px">
                        <h5 class="fw-bold pb-1" style="color:#4C3575">Jadwal Tayang</h5>
                        <div class=" d-flex mt-1 overflow border-bottom border-muted border-2 pb-3">
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
                            foreach ($screenings as $row) {
                                $date = date_create($row['start_time']);
                                $now = new DateTime();
                                if ($date < $now) {
                            ?><a class="btn rounded px-4 text-center text-white" style="width:100px; background-color:gray;" data-hari="<?= date_format($date, 'd') ?>" data-bulan="<?= date_format($date, 'm') ?>">
                                    <?php
                                } else {
                                    ?>
                                        <a class="hari btn border border-dark rounded px-4 text-center text-black" style="width:100px;" data-hari="<?= date_format($date, 'd') ?>" data-bulan="<?= date_format($date, 'm') ?>">
                                        <?php
                                    }
                                        ?>

                                        <p class="p-0 m-0 fw-bold"><?= $hari[date_format($date, 'N')] ?></p>
                                        <small><?= date_format($date, 'd') . " " . $bulan[date_format($date, 'n')] ?></small>
                                        </a>&nbsp;
                                    <?php
                                }
                                    ?>
                        </div>
                        <div class="d-flex mt-3 overflow jadwal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(function() {
        $(".hari").on('click', function() {
            const clickBtn = $(this);
            const hari = $(this).data("hari");
            const bulan = $(this).data("bulan");
            const jadwal = $(".jadwal");
            jadwal.html("");
            $.ajax({
                url: "<?= site_url('movies/get_start_time/') ?>",
                type: "post",
                data: {
                    id: <?= $movie['id'] ?>,
                    hari: hari,
                    bulan: bulan,
                },
                success: function($data) {
                    clickBtn.addClass('selected');
                    $('.hari').not(clickBtn).each(function() {
                        $(this).removeClass('selected');
                    });
                    const data = JSON.parse($data);
                    $.each(data, function(index, value) {
                        const date = new Date();
                        const start_time = new Date(value['start_time']);
                        const temp_hours = start_time.getHours();
                        const hours = ("0" + temp_hours).slice(-2);
                        const temp_minutes = start_time.getMinutes();
                        const minutes = ("0" + temp_minutes).slice(-2);
                        if (date > start_time) {
                            jadwal.append("<a class='btn border border-dark rounded text-center text-white fw-bold' style='margin-right:0.25rem;width:100px; background-color:gray;cursor:not-allowed'>" + hours + ":" + minutes + "</a>");
                        } else {
                            jadwal.append("<a href='<?= base_url() ?>/reservasi/" + value['movie_id'] + "/" + value['id'] + "' class='btn border border-dark rounded text-center text-black fw-bold' style='margin-right:0.25rem;width:100px;'>" + hours + ":" + minutes + "</a>");
                        }
                    });
                },
            });
        });
    });
</script>