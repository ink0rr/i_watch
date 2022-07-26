<!-- Begin Page Content -->
<div class="container-fluid">

    <form class="border border-light p-5 row" method="POST" action="<?= base_url('admin/studios/add-studio') ?>">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger" role="alert">
                <h4>Terjadi error</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <p class="h4 mb-4">Tambah Studio</p>
        <div class="col-12">
            <div class="form-outline mb-4">
                <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="name">
                <label class="form-label" for="textAreaExample">Nama Studio</label>
            </div>
        </div>


        <div class="col-6">
            <button class="btn btn-warning btn-block" type="reset"><i class="fa-solid fa-arrows-spin"></i> Reset Input</button>
        </div>
        <div class="col-6">
            <button class="btn btn-success btn-block" type="submit"><i class="fa-solid fa-plus"></i> Tambah Studio</button>
        </div>
        <div class="col-6">

    </form>

</div>
<br><br><br><br><br><br><br><br><br><br><br>