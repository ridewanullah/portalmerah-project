<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<?php if($dataIklan[7]['iklan_gambar'] != null) : ?>
<section class="whats-news-area">
    <div class="container">
        <div class="row">
            <img src="<?= base_url($dataIklan[7]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
        </div>
    </div>
</section>
<?php endif; ?>
<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between" style="margin-bottom: 10px;">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Whats New</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div id="navMenu">
                            <div id="navMenu-wrapper">
                                <ul id="navMenu-items">
                                    <div id="menuSelector"></div>
                                    <li class="navMenu-item on"> <a href="javascript:kategoriSelectedMain(<?= $dataNewsKategori[0]['id_kategori'] ?>)"><?= $dataNewsKategori[0]['kategori_nama'] ?></a> </li>
                                    <?php
                                    foreach (array_slice($dataNewsKategori, 1) as $dataKategori) {
                                        // dd (base_url("getkategori/1"));
                                        echo '<li class="navMenu-item"> <a href="javascript:kategoriSelectedMain(' . $dataKategori['id_kategori'] . ')">' . $dataKategori['kategori_nama'] . '</a> </li>';
                                    }
                                    ?>
                                </ul>
                                <div class="navMenu-paddles">
                                    <button class="navMenu-paddle-left icon-chevronleft" aria-hidden="true"> </button>
                                    <button class="navMenu-paddle-right icon-chevronright" aria-hidden="true"> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="whats-news-caption">
                                    <div class="row" id="konten-kategori-main">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Nav Card -->
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="section-tittle mb-40">
                    <h3>Follow Us</h3>
                </div>
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($dataIklan[8]['iklan_gambar'] != null) : ?>
                    <div class="single-what-news">
                        <img src="<?= base_url($dataIklan[8]['iklan_gambar']) ?>" class="img-fluid">
                    </div>
                <?php endif; ?>
            </div> -->
        </div>
    </div>
</section>
<!-- Whats New End -->


<!--Start pagination -->
<div class="pagination-area pb-45 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                          <li class="page-item" id="pagination-kategori"></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($dataIklan[9]['iklan_gambar'] != null) : ?>
<section class="whats-news-area">
    <div class="container">
        <div class="row">
            <img src="<?= base_url($dataIklan[9]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
        </div>
    </div>
</section>
<?php endif; ?>

<?= $this->endSection(); ?>