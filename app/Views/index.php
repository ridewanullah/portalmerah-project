<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<main>
    <?php if ($dataIklan[0]['iklan_gambar'] != null) : ?>
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <div class="header-banner f-right ">
                        <img src="<?= base_url($dataIklan[0]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <?php foreach ($beritaTrending as $data) : ?>
                                        <?php if (str_word_count($data['artikel']['news_judul']) < 15) : ?>
                                            <a href="<?= base_url($data['artikel']['link']) ?>">
                                                <li class="news-item"><?= $data['artikel']['news_judul'] ?></li>
                                            </a>
                                        <?php else : ?>
                                            <a href="<?= base_url($data['artikel']['link']) ?>">
                                                <li class="news-item"><?= word_limiter($data['artikel']['news_judul'], 15) ?> ... </li>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <?php foreach (array_slice($beritaTrending, 0, 1) as $data) : $n = 0;?>
                            <!-- Trending Top -->
                                    <script>
                                        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                                            document.write('\
                                            <div class="trending-bottom">\
                                                <div class="row">\
                                                    <div class="col-lg-12">\
                                                    <div class="single-bottom mb-35">\
                                                        <div class="trend-bottom-img mb-30">\
                                                            <img src=" <?= base_url($data['artikel']['news_gambar']) ?>" class="img-fluid">\
                                                        </div>\
                                                        <div class="trend-bottom-cap">\
                                                            <span class="color1"><?= $data['kategori']['kategori_nama'] ?></span>\
                                                            <h4><a href="<?= base_url("/" . $data['artikel']['link']) ?>"> <?= $titleTrending[$n] ?> </a></h4>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            ');
                                        }else{
                                            //  Trending Top
                                            document.write('\
                                            <div class="trending-top mb-30">\
                                                <div class="trend-top-img">\
                                                    <img src=" <?= base_url($data['artikel']['news_gambar']) ?>" class="img-fluid">\
                                                    <div class="trend-top-cap">\
                                                        <span><?= $data['kategori']['kategori_nama'] ?></span>\
                                                        <h4 style="color: white;"><a href="<?= base_url("/" . $data['artikel']['link']) ?>"> <?= $titleTrending[$n] ?> </a></h4>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            ');
                                        }
                                    </script>
                        <?php $n++; endforeach; ?>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                <?php foreach (array_slice($beritaTrending, 1, 3) as $data) : ?>
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <div class="d-none d-md-block">
                                                    <a href=" <?= base_url("/" . $data['artikel']['link']) ?>">
                                                        <img src=" <?= base_url($data['artikel']['news_gambar']) ?>" width="240" height="160" style="width: 240; height: 160; object-fit: fill; object-fit: cover;">
                                                    </a>
                                                </div>
                                                <div class="d-block d-md-none">
                                                    <a href=" <?= base_url("/" . $data['artikel']['link']) ?>">
                                                        <img src=" <?= base_url($data['artikel']['news_gambar']) ?>" width="240" height="160" style="width: 240; height: 160; object-fit: fill; object-fit: cover;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1"><?= $data['kategori']['kategori_nama'] ?></span>
                                                <h4><a href="<?= base_url("/" . $data['artikel']['link']) ?>"> <?= $titleTrending[$n] ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php $n++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Right content  -->
                    <div class="col-lg-3">
                        <?php foreach (array_slice($beritaTrending, 4, 5) as $data) : ?>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img" style="margin-right: 10px;">
                                    <div class="image-right-trending">
                                        <a href="<?= base_url("/" . $data['artikel']['link']) ?>">
                                            <img src="<?= base_url($data['artikel']['news_gambar']) ?>" width="120" height="100" style="width: 120; height: 100; object-fit: fill; object-fit: cover;" alt=""></img>
                                        </a>
                                    </div>
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color2"><?= $data['kategori']['kategori_nama'] ?></span>
                                    <h4><a href="<?= base_url("/" . $data['artikel']['link']) ?>"><?= word_limiter($titleTrending[$n], 6) ?></a></h4>
                                </div>
                            </div>
                        <?php $n++; endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    
    <?php if ($dataIklan[1]['iklan_gambar'] != null) : ?>
        <section class="whats-news-area">
            <div class="container">
                <div class="row">
                    <img src="<?= base_url($dataIklan[1]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--   Weekly-News start -->
    <!-- <div class="weekly-news-area pt-50">
        <div class="container">
            <div class="weekly-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
                            <?php foreach (array_slice($beritaMingguan, 0, 6) as $data) : ?>
                                <div class="weekly-single weekly-content">
                                    <div class="weekly-img">
                                        <a href="<?= base_url('/' . $data['link']); ?>">
                                            <img src="<?= base_url($data['news_gambar']) ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="weekly-caption">
                                        <span class="color1"><?= $data['kategori_nama'] ?></span>
                                        <h4><a href="<?= base_url('/' . $data['link']) ?>"><?= $data['news_judul'] ?></a></h4>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Weekly-News -->
    <!-- Whats New Start -->
    <?php if ($dataIklan[2]['iklan_gambar'] != null) : ?>
        <section class="whats-news-area">
            <div class="container">
                <div class="row">
                    <img src="<?= base_url($dataIklan[2]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <section class="whats-news-area pt-50 pb-20" id="kategori-news">
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
                                        <li class="navMenu-item on"> <a href="javascript:kategoriSelected(<?= $dataNewsKategori[0]['id_kategori'] ?>)"><?= $dataNewsKategori[0]['kategori_nama'] ?></a> </li>
                                        <?php
                                        foreach (array_slice($dataNewsKategori, 1) as $dataKategori) {
                                            // dd (base_url("getkategori/1"));
                                            echo '<li class="navMenu-item"> <a href="javascript:kategoriSelected(' . $dataKategori['id_kategori'] . ')">' . $dataKategori['kategori_nama'] . '</a> </li>';
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
                                <!-- card Kategori -->
                                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="whats-news-caption">
                                        <div class="row" id="konten-kategori">
                                            <!-- Konten Kategori terpilih menggunakan JS -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                    <div class="text-center" style="margin-bottom: 40px;">
                        <a href="<?= base_url() ?>/categori"><button type="button" class="btn btn-danger" style="background: #ff0b0b;">Selengkapnya</button></a>
                    </div>
                </div>
                <div class="recent-articles">
                    <div class="container">
                        <div class="recent-wrapper">
                        </div>
                    </div>
                </div>
                
                <!-- Follow US -->
                <!-- <div class="col-lg-4">
                    
                    <div class="section-tittle mb-40">
                        <h3>Follow Us</h3>
                    </div>
                    
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="<?= base_url("assets/img//icon-fb.png") ?>" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="<?= base_url("assets/img//icon-tw.png") ?>" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="<?= base_url("assets/img//icon-ins.png") ?>" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="<?= base_url("assets/img//icon-yo.png") ?>" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php if ($dataIklan[3]['iklan_gambar'] != null) : ?>
                        <div class="single-what-news">
                            <img src="<?= base_url($dataIklan[3]['iklan_gambar']) ?>" class="img-fluid">
                        </div>
                    <?php endif; ?>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    
    <!--   Weekly2-News start -->
    <!-- <div class="weekly2-news-area gray-bg">
        <div class="container">
            <?php if ($dataIklan[4]['iklan_gambar'] != null) : ?>
                <section class="whats-news-area">
                    <div class="container">
                        <div class="row">
                            <img src="<?= base_url($dataIklan[4]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <div class="weekly2-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly2-news-active dot-style d-flex dot-style">
                            <?php foreach ($beritaTrendingMingguan as $data) :
                                $date = strtotime((string) $data['created_at']);
                            ?>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <a href="<?= base_url('/' . $data['link']); ?>">
                                            <img src="<?= base_url($data['news_gambar']) ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1"><?= $data['kategori_nama'] ?></span>
                                        <p><?= date("d M Y", $date); ?></p>
                                        <h4><a href="<?= base_url('/' . $data['link']); ?>"><?= $data['news_judul'] ?></a></h4>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Weekly-News -->
    <!-- Start Youtube -->
    <!-- <div class="youtube-area video-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="video-caption">
                            <div class="top-caption">
                                <span class="color1">Politics</span>
                            </div>
                            <div class="bottom-caption">
                                <h2>Welcome To The Best Model Winner Contest At Look of the year</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit lorem ipsum dolor sit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testmonial-nav text-center">
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Start youtube -->

    <!--  Recent Articles start -->
    <?php if ($dataIklan[5]['iklan_gambar'] != null) : ?>
        <section class="whats-news-area">
            <div class="container">
                <div class="row">
                    <img src="<?= base_url($dataIklan[5]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
                </div>
            </div>
        </section>
    <?php endif; ?>
    <div class="recent-articles">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Recent Articles</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            <?php foreach ($beritaTerkini as $data) : ?>
                                <div class="single-recent mb-100">
                                    <a href="<?= base_url('/' . $data['link']); ?>">
                                        <div class="what-img">
                                            <img src="<?= base_url($data['news_gambar']) ?>" style="width: 100%; height: 305px; object-fit: fill; object-fit: cover;">
                                        </div>
                                    </a>
                                    <div class="what-cap" style="height: 175px;">
                                        <span class="color1"><?= $data['kategori_nama']; ?></span>
                                        <h4><a href="<?= base_url('/' . $data['link']); ?>"><?= $data['news_judul'] ;?></a></h4>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="margin-bottom: 40px;">
                    <a href="<?= base_url() ?>/latest_news"><button type="button" class="btn btn-danger" style="background: #ff0b0b;">Selengkapnya</button></a>
                </div>
            </div>
        </div>
    </div>
    <!--Recent Articles End -->
    <!--Start pagination -->
    <!-- <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                                <li class="page-item"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End pagination  -->
    <?php if ($dataIklan[6]['iklan_gambar'] != null) : ?>
        <section class="whats-news-area">
            <div class="container">
                <div class="row">
                    <img src="<?= base_url($dataIklan[6]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
<!-- <script type="text/javascript">
    window.onload = readKateogriNews(0);
</script> -->

<?= $this->endSection(); ?>