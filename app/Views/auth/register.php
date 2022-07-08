<section class="auth-bg vh-100">
    <div class="container py-5 h-100 ease" style="transform:scale(0.5); opacity:0;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="<?= base_url('assets/images/register-background.png') ?>" alt="login-image" class="img-fluid" style="border-top-left-radius: 9px; border-bottom-left-radius: 9px;" />
                            <a href="<?= base_url() ?>" class="text-decoration-none" style="color:#371B58;"><span class="position-absolute px-3 py-2 auth-back-button"><i class="fa-solid fa-arrow-left-long"></i> kembali ke homepage</span></a>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="#" method="GET">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h1 fw-bold mb-0"><img src="<?= base_url('assets/logo-dark.png') ?>" alt="IOO Watch" width="224" height="55"></span>
                                    </div>

                                    <h5 class="fw-light mb-3 pb-3" style="letter-spacing: 1px;">Buat akunmu dan nikmati keseruan menonton.</h5>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email-input" class="form-control form-control-lg" />
                                        <label class="form-label" for="email-input">Email address</label>
                                    </div>

                                    <div class="form-outline mb-1">
                                        <input type="password" id="password-input" class="form-control form-control-lg" />
                                        <label class="form-label" for="password-input">Password</label>
                                    </div>
                                    <div class="pt-3 text-center">
                                        <button class="btn btn-lg px-5 py-2 auth-button fw-bold text-white" type="submit">Daftar</button>
                                    </div>

                                </form>

                                <div class="forget-password text-center">
                                    <p class="fw-light">Sudah punya akun? <a href="<?= base_url("/masuk") ?>">Masuk</a></p>
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
    $(document).ready(function() {
        anime({
            duration: 700,
            targets: '.ease',
            scale: 1,
            opacity: 1,
            easing: 'easeInOutQuad',
        });

    })
</script>
</body>

</html>