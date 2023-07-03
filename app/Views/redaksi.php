<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="about-img col-lg-9">
                <img src="<?= base_url('/assets/img/logo.png'); ?>" class="mx-auto d-block img-fluid" alt="Portal Merah" style="margin-top: 50px; margin-bottom: 30px;">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <?= $dataRedaksi[0]['susunan_redaksi'] ?>
            </div>
            <div class="col-lg-3">
                <!-- Section Tittle -->
                <div class="section-tittle mb-30 pt-30">
                    <h3>Follow Us</h3>
                </div>
                <!-- Flow Social -->
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="<?= base_url('assets/img/news/icon-fb.png'); ?>" alt=""></a>
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
                <!-- New Poster -->
                <!-- <div class="news-poster d-none d-lg-block">
                    <img src="assets/img/news/news_card.jpg" alt="">
                </div> -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>