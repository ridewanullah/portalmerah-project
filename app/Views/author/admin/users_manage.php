<?= $this->extend('author/templateAuthor'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage User</h1>
    <p class="mb-4">Menu setting untuk mengatur tingkat hak akses user dan mengubah beberapa data user</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tingkat User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>Foto Profile</th>
                            <th>Tentang Penulis</th>
                            <th>Dibuat</th>
                            <th>Diupdate</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($dataUsers as $data) {
                                $created = strtotime((string) $data->created_at);
                                $updated = strtotime((string) $data->updated_at);
                                echo '<tr>
                                <td>'.$data->id.'</td>
                                <td>'.$data->name.'</td>
                                <td>'.$data->email.'</td>
                                <td>'.$data->username.'</td>
                                <td>'.$data->fullname.'</td>';
                                
                                if($data->image == null) {
                                    echo '<td>Tidak ada Foto Profile</td>';
                                }else{
                                    echo '<td><img src='.base_url($data->image).' width="300"></td>';
                                }

                                echo '<td>'.$data->about.'</td>
                                <td>'.date("d M Y H:i:s",$created).'</td>
                                <td>'.date("d M Y H:i:s",$updated).'</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <form action='.base_url("admin/update_status_user/".$data->id).'>';
                                    if($data->active == 0) {
                                        echo '<input class="btn btn-danger" name="button_status" id="button_status" type="submit" value="OFF">';
                                    }else{
                                        echo '<input class="btn btn-primary" name="button_status" id="button_status" type="submit" value="ON">';
                                    }
                                echo '</form>
                                </div>
                                </td>
                                <td><a href='.base_url("/admin/user_update/".$data->id).' class="btn btn-outline-primary">Edit</a>
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