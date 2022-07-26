<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Daftar Movies</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php
        elseif (!empty(session()->getFlashdata('error'))) :
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="col-3 mb-2">
            <a class="btn btn-primary" href="<?= base_url('/admin/movies/add') ?>" class="text-white text-decoration-none">Tambah Movie Baru</a>
        </div>
        <div class="col-12 table-responsive">
            <table class="table text-center" style="height:200px; overflow-y:scroll">
                <thead class="thead-dark">
                    <tr>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Durasi</th>
                        <th>Genre</th>
                        <th>Rating Usia</th>
                        <th>Direktur</th>
                        <th>Penulis</th>
                        <th>Stars</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($movie as $row) {
                    ?>
                        <tr>
                            <td><img class="img" style="width:50px;" src="<?= base_url("uploads/movies/{$row['image']}") ?>" alt="<?= $row['title'] ?>"></td>
                            <td><?= $row['title'] ?></td>
                            <td><?php $short = str_replace('&nbsp;', " ", $row['description']);
                                $fixed_short = substr(strip_tags($short), 0, 50) . '...';
                                echo $fixed_short; ?></td>
                            <td><?= $row['duration'] ?></td>
                            <td><?= $row['genre'] ?></td>
                            <td><?= $row['age_rating'] ?></td>
                            <td><?= $row['director'] ?></td>
                            <td><?= $row['writer'] ?></td>
                            <td><?= $row['stars'] ?></td>
                            <td class="d-flex"><a class="btn btn-warning" href="<?= base_url("/admin/movies/edit/{$row['id']}") ?>"><i class="fa-solid fa-gear"></i></a><a class="btn btn-danger" href="<?= base_url("/admin/movies/delete/{$row['id']}") ?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>