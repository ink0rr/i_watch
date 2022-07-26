<!-- Begin Page Content -->
<div class="container-fluid">

    <form class="border border-light p-5 row" method="POST" action="<?= base_url('admin/movies/add-movie') ?>" enctype="multipart/form-data">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger" role="alert">
                <h4>Terjadi error</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <p class="h4 mb-4">Tambah Movie</p>
        <div class="col-6">
            <label class="form-label text-start" for="customFile">Cover</label>
            <input type="file" class="form-control mb-4" id="customFile" name="image" />

            <div class="form-outline mb-4">
                <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="title">
                <label class="form-label" for="textAreaExample">Judul Movie</label>
            </div>

            <div class="form-outline mb-4">
                <textarea class="form-control" id="textAreaExample" rows="4" name="description"></textarea>
                <label class="form-label" for="textAreaExample">Deskripsi</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="genre">
                <label class="form-label" for="textAreaExample">Genre</label>
            </div>
        </div>
        <div class="col-6">
            <label class="form-label text-start" for="customFile">Rating Usia</label>
            <select class="form-control mb-4" name="age_rating">
                <option selected disabled>Pilih rating</option>
                <option value="SU">SU</option>
                <option value="13+">13+</option>
                <option value="17+">17+</option>
                <option value="21+">21+</option>
            </select>
            <div class="form-outline mb-4">
                <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="director">
                <label class="form-label" for="textAreaExample">Director</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="writer">
                <label class="form-label" for="textAreaExample">Penulis</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="stars">
                <label class="form-label" for="textAreaExample">Stars</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="duration">
                <label class="form-label" for="textAreaExample">Durasi</label>
            </div>
        </div>
        <div class="col-6">
            <button class="btn btn-warning btn-block" type="reset"><i class="fa-solid fa-arrows-spin"></i> Reset Input</button>
        </div>
        <div class="col-6">
            <button class="btn btn-success btn-block" type="submit"><i class="fa-solid fa-plus"></i> Tambah Movie</button>
        </div>
        <div class="col-6">

    </form>

</div>