<?= $this->extend('author/templateAuthor'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Susunan Redaksi</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-12">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Susunan Redaksi</h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('/admin/save_manage_susunan_redaksi'); ?>" enctype="multipart&#x2F;form-data" method="post" accept-charset="utf-8">
                        <input type="hidden" name="id_redaksi" value="<?= $dataRedaksi[0]['id_redaksi'] ?>">
                        <div class="form-group">
                            <textarea class="form-control" id="news_konten" name="susunan_redaksi" rows="10"><?= $dataRedaksi[0]['susunan_redaksi'] ?></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Update</button>
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