<!-- Begin Page Content -->
<div class="container-fluid">

    <form class="border border-light p-5 row" method="POST" action="<?= base_url('admin/screenings/edit-screening') ?>">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger" role="alert">
                <h4>Terjadi error</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <p class="h4 mb-4">Edit Screening - <?= $screening['title'] ?></p>
        <div class="col-6">
            <input type="hidden" value="<?= $screening['id'] ?>" name="id">
            <label class="form-label text-start" for="customFile">Judul Movie</label>
            <select class="form-control mb-4" name="movie_id">
                <option value="<?= $screening['movie_id'] ?>" selected><?= $screening['title'] ?></option>
                <?php
                foreach ($movie as $row) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                <?php
                }
                ?>
            </select>

            <label class="form-label" for="textAreaExample">Harga Ticket</label>
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="price" value="<?= $screening['price'] ?>">

        </div>
        <div class="col-6">
            <label class="form-label text-start" for="customFile">Tempat Tayang</label>
            <select class="form-control mb-4" name="studio_id">
                <option value="<?= $screening['studio_id'] ?>" selected><?= $screening['name'] ?></option>
                <?php

                foreach ($studio as $row) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                <?php
                }
                ?>
            </select>

            <label class="form-label" for="textAreaExample">Waktu Penayangan</label>
            <input type="hidden" value="<?= $screening['start_time'] ?>" name="temp_start_time">
            <input type="datetime-local" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="start_time">


        </div>



        <div class=" col-6">
            <button class="btn btn-warning btn-block" type="reset"><i class="fa-solid fa-arrows-spin"></i> Reset Input</button>
        </div>
        <div class="col-6">
            <button class="btn btn-success btn-block" type="submit"><i class="fa-solid fa-plus"></i> Edit screening</button>
        </div>
        <div class="col-6">

    </form>

</div>
<br><br><br><br><br><br><br>