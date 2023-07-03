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
                    <h6 class="m-0 font-weight-bold text-primary">Buat Kategori Baru</h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('/admin/save_create_kategori'); ?>" enctype="multipart&#x2F;form-data" method="post" accept-charset="utf-8">
                        <div class="form-group">
                            <label for="kategori_nama">Nama Kategori</label>
                            <input type="text" class="form-control" name="kategori_nama" placeholder="Tulis Nama Kategori Disini">
                        </div>
                        <div class="form-group">
                            <label for="kategori_deskripsi">Kategori Deskripsi</label>
                            <input type="text" class="form-control" name="kategori_deskripsi" placeholder="Tulis Kategori Deskripsi Disini">
                        </div>
                        <div class="form-group">
                            <label for="prioritas">Prioritas</label>
                            <input type="text" class="form-control" name="prioritas">
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