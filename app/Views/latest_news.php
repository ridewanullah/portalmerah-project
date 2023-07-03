<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<?php if ($dataIklan[10]['iklan_gambar'] != null) : ?>
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <img src="<?= base_url($dataIklan[10]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
            </div>
        </div>
    </section>
<?php endif; ?>
<section class="blog_area" style="padding: 30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php
                    foreach ($beritaTerkini as $data) :
                        $date = strtotime((string) $data['created_at']);
                    ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <a href='<?= base_url("/" . $data['link']); ?>'><img class="card-img rounded-0" src='<?= base_url($data['news_gambar']); ?>' alt=""></a>
                                <a href='<?= base_url("/" . $data['link']); ?>' class="blog_item_date">
                                    <h3><?= date("d", $date); ?></h3>
                                    <p><?= date("M", $date); ?></p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="<?= base_url("/" . $data['link']); ?>">
                                    <h2><?= $data['news_judul']; ?></h2>
                                </a>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i><?= $data['kategori_nama']; ?></a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> <?= $komen->where('id_artikel', $data['id_artikel'])->countAllResults(); ?> Comments</a></li>
                                </ul>
                            </div>
                        </article>
                    <?php endforeach ?>

                    <nav class="blog-pagination justify-content-center d-flex" style="padding: 0px 0px 20px 0">
                        <ul class="pagination">
                            <li class="page-item">
                                <a <?php if ($page > 1) {
                                        echo "href='?page=$previous'";
                                    } ?> class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <?php for ($x = 1; $x <= $total_page; $x++) { ?>
                                <li class="page-item">
                                    <a href="?page=<?= $x; ?>" class="page-link"><?= $x; ?></a>
                                </li>
                            <?php } ?>
                            <li class="page-item">
                                <a <?php if ($page < $total_page) {
                                        echo "href='?page=$next'";
                                    } ?> class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="<?= base_url('latest_news/searchresult'); ?>">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="keyword" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button" type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            <?php foreach ($dataNewsKategori as $data) : ?>
                                <li>
                                    <a href="<?= base_url("/categori?id_kategori=".$data['id_kategori']) ?>" class="d-flex">
                                        <p><?= $data['kategori_nama']; ?></p>
                                        
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </aside>

                    <aside style="padding: 0px 0px 25px 0px;">
                        <?php if ($dataIklan[11]['iklan_gambar'] != null) : ?>
                            <div>
                                <img src="<?= base_url($dataIklan[11]['iklan_gambar']) ?>" class="img-fluid">
                            </div>
                        <?php endif; ?>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                            <?php foreach (array_slice($beritaTerkini, 0, 4) as $data) :
                                $date = strtotime((string) $data['created_at']);
                            ?>
                            <div class="media post_item">
                                <a href="<?= base_url('/' . $data['link']) ?>">
                                    <img src="<?= base_url($data['news_gambar']) ?>" alt="post" style="width: 90px; height: 90px; object-fit: fill; object-fit: cover;">
                                </a>
                                <div class="media-body">
                                    <a href="<?= base_url('/' . $data['link']) ?>">
                                        <h3><?= word_limiter($data['news_judul'], 6); ?></h3>
                                    </a>
                                    <p><?= date("d M Y", $date); ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </aside>

                    <aside style="padding: 0px 0px 25px 0px;">
                        <?php if ($dataIklan[12]['iklan_gambar'] != null) : ?>
                            <div>
                                <img src="<?= base_url($dataIklan[12]['iklan_gambar']) ?>" class="img-fluid">
                            </div>
                        <?php endif; ?>
                    </aside>

                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <?php foreach ($dataNewsKategori as $data) : ?>
                                <li>
                                    <input class="" type="checkbox" value="" id="tag<?= $data['kategori_nama']; ?>" hidden>
                                    <a href="#" for="tag<?= $data['kategori_nama']; ?>">
                                        <?= $data['kategori_nama']; ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </aside>

                    <aside style="padding: 0px 0px 25px 0px;">
                        <?php if ($dataIklan[13]['iklan_gambar'] != null) : ?>
                            <div>
                                <img src="<?= base_url($dataIklan[13]['iklan_gambar']) ?>" class="img-fluid">
                            </div>
                        <?php endif; ?>
                    </aside>

                    <!-- <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </aside> -->

                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>

                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($dataIklan[14]['iklan_gambar'] != null) : ?>
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <img src="<?= base_url($dataIklan[14]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
            </div>
        </div>
    </section>
<?php endif; ?>
<?= $this->endSection(); ?>