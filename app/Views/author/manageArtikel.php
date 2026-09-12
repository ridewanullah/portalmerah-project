<?= $this->extend('author/templateAuthor'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage Artikel</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Artikel</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Views</th>
                            <th>Dibuat</th>
                            <th>Diupdate</th>
                            <th>Status Berita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($dataArtikel as $data) {
                                echo '<tr>
                                <td>'.$data["news_judul"].'</td>
                                <td><img src='.base_url($data["news_gambar"]).' width="100"></td>
                                <td>Kategori</td>
                                <td>71283 Kali Dilihat</td>
                                <td>23 Juni 2022</td>
                                <td>23 Juni 2022</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="On" checked>
                                        <label class="btn btn-outline-primary" for="btnradio1">On</label>
    
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="Off">
                                        <label class="btn btn-outline-primary" for="btnradio2">Off</label>
                                    </div>
                                </td>
                                <td><a href="#" class="btn btn-outline-primary">Edit</a>
                                <a href='.base_url("/author/deleteArtikel/".$data["id_artikel"]).' class="btn btn-outline-danger">Delete</a></td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href="<?= base_url('/author/create_artikel');?>" class="btn btn-success">Buat Artikel</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>