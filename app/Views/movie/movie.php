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
                    <h5 class="fw-bold text-muted mt-4 pb-1">Jadwal Tayang</h5>
                    <div class="d-flex mt-1 overflow border-bottom border-muted py-2">
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
</section>
<script>
    $(document).ready(function() {
        $(".hari").click(function() {
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
                        console.log(index, value);
                        console.log(value['start_time']);

                        var date = new Date(),
                            start_time = new Date(value['start_time']),
                            temp_hours = start_time.getHours(),
                            hours = ("0" + temp_hours).slice(-2),
                            temp_minutes = start_time.getMinutes(),
                            minutes = ("0" + temp_minutes).slice(-2);

                        if (date > start_time) {
                            jadwal.append("<a class='btn border border-dark rounded px-4 text-center text-white fw-bold m-1' style='width:100px; background-color:gray;'>" + hours + ":" + minutes + "</a>");
                        } else {
                            jadwal.append("<a class='btn border border-dark rounded px-4 text-center text-black fw-bold m-1' style='width:100px;'>" + hours + ":" + minutes + "</a>");
                        }
                    });
                },
            });
        });
    });
</script>