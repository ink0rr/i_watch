<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/logo-16x16.png') ?>" type="image">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custom_css.css') ?>" />
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>
    <header>

        <!-- static navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#4C3575;">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <img src="<?= base_url('assets/logo.png') ?>" alt="IOO Watch" width="227" height="58">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerStatic" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerStatic">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#footer">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#footer">Perlu Bantuan?</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url("/daftar") ?>">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url("/masuk") ?>">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- sticky navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top sticky-navbar shadow-sm mb-5 bg-body rounded" style="transform:translateY(-77px);">
            <div class="container">
                <a class="navbar-brand sticky-item" href="<?= base_url(); ?>">
                    <img src="<?= base_url('assets/logo_icon.png') ?>" alt="IOO Watch">
                </a>
                <button class="navbar-toggler sticky-item" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerSticky" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerSticky">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item sticky-item" style="transform:translateY(-77px);">
                            <a class="nav-link active" href="#footer">Tentang Kami</a>
                        </li>
                        <li class="nav-item sticky-item" style="transform:translateY(-77px);">
                            <a class="nav-link active" href="#footer">Perlu Bantuan?</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0 ">
                        <li class="nav-item sticky-item" style="transform:translateY(-77px);">
                            <a class="nav-link active" href="<?= base_url("/daftar") ?>">Daftar</a>
                        </li>
                        <li class="nav-item sticky-item" style="transform:translateY(-77px);">
                            <a class="nav-link active" href="<?= base_url("/masuk") ?>">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script type="text/javascript">
        $(window).on("scroll", function() {
            const scroll = $(window).scrollTop();
            if (scroll >= 690) {
                anime({
                    duration: 100,
                    targets: '.sticky-navbar',
                    translateY: 0,
                    easing: 'easeInSine',
                });
                anime({
                    targets: '.sticky-item',
                    translateY: 0,
                    direction: 'normal',
                    delay: function(el, i, l) {
                        return i * 25;
                    },
                    endDelay: function(el, i, l) {
                        return (l - i) * 25;
                    },
                });
            } else {
                anime({
                    duration: 100,
                    targets: '.sticky-navbar',
                    translateY: -77,
                    easing: 'easeOutSine',
                });
                anime({
                    targets: '.sticky-item',
                    translateY: -77,
                });
            }
        });
    </script>