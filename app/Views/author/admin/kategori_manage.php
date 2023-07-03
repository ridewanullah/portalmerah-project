<?= $this->extend('author/templateAuthor'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage Kategori</h1>
    <p class="mb-4">Pembuatan Kategori Baru dan Pengaturan Kategori</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Kategori Deskripsi</th>
                            <th>Prioritas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($dataKategori as $data) {
                                echo '<tr>
                                <td>'.$data["id_kategori"].'</td>
                                <td>'.$data["kategori_nama"].'</td>
                                <td>'.$data["kategori_deskripsi"].'</td>
                                <td>'.$data["prioritas"].'</td>
                                <td><a href='.base_url("/admin/update_kategori/".$data["id_kategori"]).' class="btn btn-outline-primary">Edit</a>
                                <a href='.base_url("/admin/delete_kategori/".$data["id_kategori"]).' class="btn btn-outline-danger">Delete</a></td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href="<?= base_url('/admin/create_kategori');?>" class="btn btn-success">Buat Kategori</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>