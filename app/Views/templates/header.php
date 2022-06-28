<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=esc($title)?></title>
    <link  rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css')?>"/>
    <link rel="icon" href="<?=base_url('assets/logo-16x16.png')?>" type="image">
    <script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
    <script src="<?=base_url('assets/js/anime.min.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.js')?>"></script>
</head>
<body>
    <header>

    <!-- static navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#B25068;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?=base_url('assets/logo.png')?>" alt="IOO Watch" width="227" height="58">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerStatic" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerStatic">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Perlu Bantuan</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Masuk</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- sticky navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top sticky-navbar shadow-sm mb-5 bg-body rounded" style="transform:translateY(-76px);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?=base_url('assets/logo_icon.png')?>" alt="IOO Watch">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerSticky" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerSticky">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Perlu Bantuan</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <script type="text/javascript">

        $(window).scroll(function() {
        
        var scroll = $(window).scrollTop();
        var sticky = $('.sticky-navbar');
        
        if (scroll >= 490) { 
            anime({
                duration: 100,
                targets: '.sticky-navbar',
                translateY: 0,
                easing: 'easeInSine'
            });
        }else { 
            // toggleDisplay('none');
            anime({
                        duration: 100,
                        targets: '.sticky-navbar',
                        translateY: -76,
                        easing: 'easeOutSine'
                    });
            setTimeout(() => {
            }, 100);
        }
    });
    </script>

