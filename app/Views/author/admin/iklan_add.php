<?= $this->extend('author/templateAuthor'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-12">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Menambahkan Iklan di <?= $dataIklan->iklan_letak ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('/admin/save_add_iklan'); ?>" enctype="multipart&#x2F;form-data" method="post" accept-charset="utf-8">
                        <input type="hidden" name="id_iklan" value="<?= $dataIklan->id_iklan ?>">
                        <div class="form-group">
                            <label for="profile_picture">Pilih Gambar</label>
                            <?php
                            if ($dataIklan->iklan_gambar == null) {
                                echo '<br><strong>Tidak ada iklan yang terpasang di '.$dataIklan->iklan_letak.'</strong>';
                            } else {
                                $images_file = $dataIklan->iklan_gambar;
                                echo '<img class="card-img-top center" src='.base_url($images_file).' alt="Card image cap" style="width: 100%; display: block; margin: 20px auto 20px auto;">';
                            }
                            ?>
                            <input type="file" class="form-control" name="iklan_gambar" placeholder="Pilih Gambar" value=""></input>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>