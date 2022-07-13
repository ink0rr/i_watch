<section class="auth-bg vh-100">
    <div class="container py-5 h-100 ease" style="transform:scale(0.5); opacity:0;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="<?= base_url('assets/images/login-background.png') ?>" alt="login-image" class="img-fluid" style="border-top-left-radius: 9px; border-bottom-left-radius: 9px;" />
                            <a href="<?= base_url() ?>" class="text-decoration-none" style="color:#371B58;"><span class="position-absolute px-3 py-2 auth-back-button"><i class="fa-solid fa-arrow-left-long"></i> Kembali ke homepage</span></a>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form action="" method="POST">

                                    <?php if (isset($validation)) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="<?= base_url('assets/logo-dark.png') ?>" alt="IOO Watch" width="224" height="55">
                                    </div>

                                    <h5 class="fw-light mb-3 pb-3" style="letter-spacing: 1px;">Hiburan serumu dimulai disini.</h5>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?= set_value('email') ?>" />
                                        <label class="form-label" for="email">Email Address</label>
                                    </div>

                                    <div class="form-outline mb-1">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" value="" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="text-end">
                                        <a href="<?= base_url("/lupa-password") ?>">Lupa Password?</a>
                                    </div>
                                    <div class="pt-3 text-center">
                                        <button class="btn btn-lg px-5 py-2 auth-button fw-bold text-white" type="submit" name="login">Masuk</button>
                                    </div>

                                </form>

                                <div class="forget-password text-center">
                                    <p class="fw-light">Belum punya akun? <a href="<?= base_url("/daftar") ?>">Daftar</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.querySelectorAll('.form-outline').forEach((formOutline) => {
        new mdb.Input(formOutline).init();
    });
    jQuery(function() {
        anime({
            duration: 700,
            targets: '.ease',
            scale: 1,
            opacity: 1,
            easing: 'easeInOutQuad',
        });

    });
</script>
</body>

</html>