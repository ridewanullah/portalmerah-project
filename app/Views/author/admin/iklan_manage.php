<?= $this->extend('author/templateAuthor'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage Iklan</h1>
    <p class="mb-4">Untuk Mengatur Penayangan Iklan</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Iklan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Letak Iklan</th>
                            <th>Gambar Iklan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dataIklan as $data) {
                            echo '<tr>
                                <td>' . $data["id_iklan"] . '</td>
                                <td>' . $data["iklan_letak"] . '</td>';
                            if ($data["iklan_gambar"] == null) {
                                echo '<td>Tidak Ada Iklan</td>';
                                echo '<td><a href=' . base_url("/admin/add_iklan/" . $data["id_iklan"]) . ' class="btn btn-outline-primary">Add</a>';
                            }else{
                                echo '<td><img src=' . base_url($data["iklan_gambar"]) . ' class="img-fluid"></td>';
                                echo '<td>';
                            }
                            echo '<a href=' . base_url("/admin/delete_iklan/" . $data["id_iklan"]) . ' class="btn btn-outline-danger">Delete</a></td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href="<?= base_url('/admin/create_kategori'); ?>" class="btn btn-success">Buat Kategori</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>