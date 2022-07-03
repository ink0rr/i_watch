<div class="position-relative top-bg">
    <section id="sedang-tayang">
        <div class="container pt-4">
            <div class="row">
                <h4 class="h4-responsive text-white fw-bold" style="font-family: Brandon Grotesque;">SEDANG TAYANG DI BIOSKOP</h4>
                <div class="slider text-center">
                    <?php
                    if (isset($movies)) :
                        foreach ($movies as $movie) : ?>
                            <div>
                                <a href="<?= "movies/{$movie['id']}" ?>">
                                    <img class="movie-thumbnail" src="<?= base_url("uploads/movies/{$movie['id']}.jpg") ?>" alt="<?= $movie['title'] ?>">
                                </a>
                            </div>
                    <?php endforeach;
                    endif ?>
                </div>
            </div>
        </div>
    </section>
    <section id="cari-bioskop">
        <div class="container pt-5">
            <div class="row">
                <div class="card px-0">
                    <div class="card-header py-0 pt-2">
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="col-md-6">
                                    <h3 class="text-white">Hey kamu</h3>
                                    <h3 class="fw-bold text-white">Mau nonton apa?</h3>
                                </div>
                                <div class="col-md-6 d-flex flex-row-reverse m-0">
                                    <figure class="mx-2">
                                        <img class="img rounded-circle p-2 shadow" style="width:76px; height:76px; background-color: #95D676;" src="<?= base_url("assets/images/animation.png") ?>" alt="">
                                        <figcaption class="text-center text-white fw-bold">Animation</figcaption>
                                    </figure>
                                    <figure class="mx-2">
                                        <img class="img rounded-circle p-2 shadow" style="width:76px; height:76px; background-color: #5162ff;" src="<?= base_url("assets/images/horror.png") ?>" alt="">
                                        <figcaption class="text-center text-white fw-bold">Horror</figcaption>
                                    </figure>
                                    <figure class="mx-2">
                                        <img class="img rounded-circle p-2 shadow" style="width:76px; height:76px; background-color: #FF7B73;" src="<?= base_url("assets/images/action.png") ?>" alt="">
                                        <figcaption class="text-center text-white fw-bold">Action</figcaption>
                                    </figure>
                                    <figure class="mx-2">
                                        <img class="img rounded-circle p-2 shadow" style="width:76px; height:76px; background-color: #FFC773;" src="<?= base_url("assets/images/thriller.png") ?>" alt="">
                                        <figcaption class="text-center text-white fw-bold">Thriller</figcaption>
                                    </figure>
                                    <figure class="mx-2">
                                        <img class="img rounded-circle p-2 shadow" style="width:76px; height:76px; background-color: #528357;" src="<?= base_url("assets/images/sci-fi.png") ?>" alt="">
                                        <figcaption class="text-center text-white fw-bold">Sci-fi</figcaption>
                                    </figure>
                                    <figure class="mx-2" class="mx-2">
                                        <img class="img rounded-circle p-2 shadow" style="width:76px; height:76px; background-color: #FFC49C;" src="<?= base_url("assets/images/comedy.png") ?>" alt="">
                                        <figcaption class="text-center text-white fw-bold">Comedy</figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <img class="img mt-2" src="<?= base_url('assets/logo_icon.png') ?>" style="width:auto; height:40px;">
                            <h4 class="mt-3">Yuk cek film yang akan tayang disekitar kamu</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="container">
                            <form action="#">
                                <div class="row p-2">
                                    <div class="col-md-5 d-flex">
                                        <div class="input-group">
                                            <span class="input-group-text check-span" id="kota"><i class="fa fa-map-marker-alt text-danger"></i></span>
                                            <select class="form-control check-select">
                                                <option selected disabled>Pilih Kota...</option>
                                                <option>Contoh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5 d-flex">
                                        <div class="input-group">
                                            <span class="input-group-text check-span" id="kota"><i class="fa-regular fa-building text-warning"></i></span>
                                            <select class="form-control check-select" placeholder="Pilih kotamu">
                                                <option selected disabled>Pilih Bioskop...</option>
                                                <option>Contoh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <button type="button" class="btn btn-rounded check-button fw-bold text-white">Check</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cinemas section? -->
    <section id="spotlight">
        <div class="container pt-5">
            <div class="row">
                <h4 class="h4-responsive text-black fw-bold" style="font-family: Brandon Grotesque;">SPOTLIGHT</h4>
                <div class="slider pb-4">
                    <div>
                        <div class="card-spotlight border-none border-0">
                            <img src="<?= base_url("assets/images/placeholder-image.jpg") ?>" class="img-fluid mt-0 mt-md-2">
                            <p class="middle-title mt-2 mt-md-0 font-weight-bold mb-0">
                                <a href="#">
                                    <?php
                                    //temporary ya
                                    $title_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est.";

                                    if (strlen($title_spotlight) > 40) {
                                        $fixed = substr($title_spotlight, 0, 40) . '...';
                                        echo $fixed;
                                    } else {
                                        echo $title_spotlight['nama_artikel'];
                                    }
                                    ?>
                                </a>
                            </p>
                            <small class="text-muted middle-subtitle">
                                <?php
                                $tanggal_rilis = "2022-01-01";
                                $date = date('d F Y', strtotime($tanggal_rilis));
                                echo $date; ?>
                            </small>
                            <div class="middle-news">
                                <?php
                                $deskripsi_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est. Praesent gravida laoreet ligula venenatis ultricies. Curabitur pharetra ipsum eros, egestas bibendum est volutpat eu. In ut dui interdum, suscipit turpis sit amet, dapibus diam. Vestibulum sit amet massa vulputate, dignissim leo sed, mollis magna. Quisque eget consequat justo. Pellentesque nec quam massa.";
                                $short = str_replace('&nbsp;', " ", $deskripsi_spotlight);
                                $fixed_short = substr(strip_tags($short), 0, 50) . '...';
                                echo $fixed_short;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-spotlight border-none border-0">
                            <img src="<?= base_url("assets/images/placeholder-image.jpg") ?>" class="img-fluid mt-0 mt-md-2">
                            <p class="middle-title mt-2 mt-md-0 font-weight-bold mb-0">
                                <a href="#">
                                    <?php
                                    //temporary ya
                                    $title_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est.";

                                    if (strlen($title_spotlight) > 40) {
                                        $fixed = substr($title_spotlight, 0, 40) . '...';
                                        echo $fixed;
                                    } else {
                                        echo $title_spotlight['nama_artikel'];
                                    }
                                    ?>
                                </a>
                            </p>
                            <small class="text-muted middle-subtitle">
                                <?php
                                $tanggal_rilis = "2022-01-01";
                                $date = date('d F Y', strtotime($tanggal_rilis));
                                echo $date; ?>
                            </small>
                            <div class="middle-news">
                                <?php
                                $deskripsi_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est. Praesent gravida laoreet ligula venenatis ultricies. Curabitur pharetra ipsum eros, egestas bibendum est volutpat eu. In ut dui interdum, suscipit turpis sit amet, dapibus diam. Vestibulum sit amet massa vulputate, dignissim leo sed, mollis magna. Quisque eget consequat justo. Pellentesque nec quam massa.";
                                $short = str_replace('&nbsp;', " ", $deskripsi_spotlight);
                                $fixed_short = substr(strip_tags($short), 0, 50) . '...';
                                echo $fixed_short;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-spotlight border-none border-0">
                            <img src="<?= base_url("assets/images/placeholder-image.jpg") ?>" class="img-fluid mt-0 mt-md-2">
                            <p class="middle-title mt-2 mt-md-0 font-weight-bold mb-0">
                                <a href="#">
                                    <?php
                                    //temporary ya
                                    $title_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est.";

                                    if (strlen($title_spotlight) > 40) {
                                        $fixed = substr($title_spotlight, 0, 40) . '...';
                                        echo $fixed;
                                    } else {
                                        echo $title_spotlight['nama_artikel'];
                                    }
                                    ?>
                                </a>
                            </p>
                            <small class="text-muted middle-subtitle">
                                <?php
                                $tanggal_rilis = "2022-01-01";
                                $date = date('d F Y', strtotime($tanggal_rilis));
                                echo $date; ?>
                            </small>
                            <div class="middle-news">
                                <?php
                                $deskripsi_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est. Praesent gravida laoreet ligula venenatis ultricies. Curabitur pharetra ipsum eros, egestas bibendum est volutpat eu. In ut dui interdum, suscipit turpis sit amet, dapibus diam. Vestibulum sit amet massa vulputate, dignissim leo sed, mollis magna. Quisque eget consequat justo. Pellentesque nec quam massa.";
                                $short = str_replace('&nbsp;', " ", $deskripsi_spotlight);
                                $fixed_short = substr(strip_tags($short), 0, 50) . '...';
                                echo $fixed_short;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-spotlight border-none border-0">
                            <img src="<?= base_url("assets/images/placeholder-image.jpg") ?>" class="img-fluid mt-0 mt-md-2">
                            <p class="middle-title mt-2 mt-md-0 font-weight-bold mb-0">
                                <a href="#">
                                    <?php
                                    //temporary ya
                                    $title_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est.";

                                    if (strlen($title_spotlight) > 40) {
                                        $fixed = substr($title_spotlight, 0, 40) . '...';
                                        echo $fixed;
                                    } else {
                                        echo $title_spotlight['nama_artikel'];
                                    }
                                    ?>
                                </a>
                            </p>
                            <small class="text-muted middle-subtitle">
                                <?php
                                $tanggal_rilis = "2022-01-01";
                                $date = date('d F Y', strtotime($tanggal_rilis));
                                echo $date; ?>
                            </small>
                            <div class="middle-news">
                                <?php
                                $deskripsi_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est. Praesent gravida laoreet ligula venenatis ultricies. Curabitur pharetra ipsum eros, egestas bibendum est volutpat eu. In ut dui interdum, suscipit turpis sit amet, dapibus diam. Vestibulum sit amet massa vulputate, dignissim leo sed, mollis magna. Quisque eget consequat justo. Pellentesque nec quam massa.";
                                $short = str_replace('&nbsp;', " ", $deskripsi_spotlight);
                                $fixed_short = substr(strip_tags($short), 0, 50) . '...';
                                echo $fixed_short;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-spotlight border-none border-0">
                            <img src="<?= base_url("assets/images/placeholder-image.jpg") ?>" class="img-fluid mt-0 mt-md-2">
                            <p class="middle-title mt-2 mt-md-0 font-weight-bold mb-0">
                                <a href="#">
                                    <?php
                                    //temporary ya
                                    $title_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est.";

                                    if (strlen($title_spotlight) > 40) {
                                        $fixed = substr($title_spotlight, 0, 40) . '...';
                                        echo $fixed;
                                    } else {
                                        echo $title_spotlight['nama_artikel'];
                                    }
                                    ?>
                                </a>
                            </p>
                            <small class="text-muted middle-subtitle">
                                <?php
                                $tanggal_rilis = "2022-01-01";
                                $date = date('d F Y', strtotime($tanggal_rilis));
                                echo $date; ?>
                            </small>
                            <div class="middle-news">
                                <?php
                                $deskripsi_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est. Praesent gravida laoreet ligula venenatis ultricies. Curabitur pharetra ipsum eros, egestas bibendum est volutpat eu. In ut dui interdum, suscipit turpis sit amet, dapibus diam. Vestibulum sit amet massa vulputate, dignissim leo sed, mollis magna. Quisque eget consequat justo. Pellentesque nec quam massa.";
                                $short = str_replace('&nbsp;', " ", $deskripsi_spotlight);
                                $fixed_short = substr(strip_tags($short), 0, 50) . '...';
                                echo $fixed_short;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-spotlight border-none border-0">
                            <img src="<?= base_url("assets/images/placeholder-image.jpg") ?>" class="img-fluid mt-0 mt-md-2">
                            <p class="middle-title mt-2 mt-md-0 font-weight-bold mb-0">
                                <a href="#">
                                    <?php
                                    //temporary ya
                                    $title_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est.";

                                    if (strlen($title_spotlight) > 40) {
                                        $fixed = substr($title_spotlight, 0, 40) . '...';
                                        echo $fixed;
                                    } else {
                                        echo $title_spotlight['nama_artikel'];
                                    }
                                    ?>
                                </a>
                            </p>
                            <small class="text-muted middle-subtitle">
                                <?php
                                $tanggal_rilis = "2022-01-01";
                                $date = date('d F Y', strtotime($tanggal_rilis));
                                echo $date; ?>
                            </small>
                            <div class="middle-news">
                                <?php
                                $deskripsi_spotlight = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pellentesque magna, convallis ultrices nisi cursus et. In faucibus lectus in est cursus condimentum. Nunc quis dolor est. Praesent gravida laoreet ligula venenatis ultricies. Curabitur pharetra ipsum eros, egestas bibendum est volutpat eu. In ut dui interdum, suscipit turpis sit amet, dapibus diam. Vestibulum sit amet massa vulputate, dignissim leo sed, mollis magna. Quisque eget consequat justo. Pellentesque nec quam massa.";
                                $short = str_replace('&nbsp;', " ", $deskripsi_spotlight);
                                $fixed_short = substr(strip_tags($short), 0, 50) . '...';
                                echo $fixed_short;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="anggota-kami">
        <div class="anggota-kami-bg mt-4">
            <div class="container pt-5">
                <div class="row mb-4">
                    <h3 class="fw-bold text-center text-white">Anggota Kami</h3>
                    <p class="font-italic text-center text-white">"Menciptakan lingkungan kerja yang baik dan kondusif serta menghormati antara satu dengan yang lain merupakan kunci keberhasilan kerjasama kami"</p>
                </div>

                <div class="row d-flex justify-content-center text-center">
                    <div class="col-md-4 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="<?= base_url("assets/images/placeholder-user.png") ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Ari Candra Kusuma</h5><span class="small text-uppercase text-muted">Programmer</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="<?= base_url("assets/images/placeholder-user.png") ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Joko Sulistyo</h5><span class="small text-uppercase text-muted">Programmer</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="<?= base_url("assets/images/placeholder-user.png") ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Naufal Fadhilah Alwan</h5><span class="small text-uppercase text-muted">Programmer</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="<?= base_url("assets/images/placeholder-user.png") ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Tomflynn Beltsazar</h5><span class="small text-uppercase text-muted">Programmer</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="<?= base_url("assets/images/placeholder-user.png") ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Viona Cornellia</h5><span class="small text-uppercase text-muted">Programmer</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slider').slick({
                infinite: true,
                centerMode: true,
                autoplay: true,
                pauseOnHover: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: true,
                zindex: 1,
                slidesToShow: 4,
                slidesToScroll: 1,
            });
        });
    </script>