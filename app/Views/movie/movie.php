<section class="movie-bg">
    <div class="container">
        <div class="align-items-center py-4">
            <div class="col">
                <div class="shadow-sm bg-light p-3">
                    <div class="d-flex">
                        <h4 class="fw-bold pt-3">NOW PLAYING</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-grid">
                                <img class="movie-cover" src="<?= base_url("uploads/movies/{$movie['id']}.jpg") ?>" alt="<?= $movie['title'] ?>">
                                <button class="btn bg-warning bg-opacity-75 rounded-0 text-black fw-bold shadow-none" style="font-size:15px;">Beli tiket</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between">
                                <h1 class="fw-bold" style="color: #4C3575;"><?= $movie['title'] ?></h1>
                                <p class="text-muted float-end p-2"><i class="fa-solid fa-clock fa-sm"></i> 87 Minutes</p>
                            </div>
                            <div class="d-flex">
                                <table class="table table-borderless table-responsive movie-description-table">
                                    <tbody>
                                        <tr>
                                            <td class="attribute">Jenis Film</td>
                                            <td class="colon">:</td>
                                            <td class="value">lorem, ipsum, dolor</td>
                                        </tr>
                                        <tr>
                                            <td class="attribute">Produser</td>
                                            <td class="colon">:</td>
                                            <td class="value">consectetur adipiscing elit. Quisque ac urna mattis lacus maximus suscipit et quis elit.</td>
                                        </tr>
                                        <tr>
                                            <td class="attribute">Sutradara</td>
                                            <td class="colon">:</td>
                                            <td class="value">consectetur adipiscing elit. Quisque ac urna mattis lacus maximus suscipit et quis elit.</td>
                                        </tr>
                                        <tr>
                                            <td class="attribute">Penulis</td>
                                            <td class="colon">:</td>
                                            <td class="value">Maecenas a volutpat risus, eu tristique sapien</td>
                                        </tr>
                                        <tr>
                                            <td class="attribute">Casts</td>
                                            <td class="colon">:</td>
                                            <td class="value">Praesent quis lectus suscipit, vulputate tortor vitae, commodo turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Aliquam vel ornare nisi, eu rhoncus mi. Ut leo erat, dignissim vitae ante a, dignissim pretium magna. Morbi id egestas dolor, vitae vestibulum magna. Vestibulum ac scelerisque mi. Duis ac faucibus ante, vitae eleifend nibh. Mauris sagittis vehicula ante vel lobortis.</td>
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
                </div>
            </div>
        </div>
    </div>
</section>