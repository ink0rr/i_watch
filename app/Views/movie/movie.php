<section class="movie-bg">
    <div class="container">
        <div class="align-items-center py-4">
            <div class="col">
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
                            <a href="<?= base_url('booking/' . $movie['id']) ?>" class="btn btn-lg bg-warning bg-opacity-75 rounded-0 text-black fw-bold shadow-none float-end w-25" style="font-size:15px;">Beli tiket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>