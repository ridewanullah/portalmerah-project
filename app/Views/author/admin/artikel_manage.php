<?= $this->extend('author/templateAuthor'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage Artikel</h1>
    <p class="mb-4">Pengaturan untuk membuat, mengupdate, menghapus, mengaktifkan dan menonaktifkan Artikel</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
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
                                // dd($data);
                                $created = strtotime((string) $data->created_at);
                                $updated = strtotime((string) $data->updated_at);
                                echo '<tr>
                                <td>'.$data->id_artikel.'</td>
                                <td>'.$data->news_judul.'</td>';
                                if ($data->news_gambar == null) {
                                    echo '<br><strong>Belum ada gambar berita</strong>';
                                } else {
                                    $images_file = $data->news_gambar;
                                    echo '<td><img src='.base_url($images_file).' width="200"></td>';
                                }
                                echo '<td>'.$data->kategori_nama.'</td>
                                <td>'.$data->news_traffic.'</td>
                                <td>'.date("d M Y H:i:s",$created).'</td>
                                <td>'.date("d M Y H:i:s",$updated).'</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <form action='.base_url("admin/update_status_artikel/".$data->id_artikel).'>';
                                    if($data->news_status == 0) {
                                        echo '<input class="btn btn-danger" name="button_status" id="button_status" type="submit" value="OFF">';
                                    }else{
                                        echo '<input class="btn btn-primary" name="button_status" id="button_status" type="submit" value="ON">';
                                    }
                                echo '</form>
                                </div>
                                </td>
                                <td><a href='.base_url("/admin/update_artikel/".$data->id_artikel).' class="btn btn-outline-primary">Edit</a>
                                <a href='.base_url("/admin/delete_artikel/".$data->id_artikel).' class="btn btn-outline-danger">Delete</a></td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href="<?= base_url('/admin/create_artikel');?>" class="btn btn-success">Buat Artikel</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>