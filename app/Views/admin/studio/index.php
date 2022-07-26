<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Daftar Studio</h1>
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
            <a class="btn btn-primary" href="<?= base_url('/admin/studios/add') ?>" class="text-white text-decoration-none">Tambah Studio Baru</a>
        </div>
        <div class="col-12 table-responsive">
            <table class="table text-center" style="height:200px; overflow-y:scroll">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Studio</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($studio as $row) {
                    ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td class="d-flex justify-content-center"><a class="btn btn-warning" href="<?= base_url("/admin/studios/edit/{$row['id']}") ?>"><i class="fa-solid fa-gear"></i></a><a class="btn btn-danger" href="<?= base_url("/admin/studios/delete/{$row['id']}") ?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>