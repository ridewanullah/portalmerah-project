<?= $this->extend('template'); ?>

<?php
$visitor_ip = $getIpAddress;
if ($newsTraffic->where('ip_address', $visitor_ip)->findColumn('ip_address') == null) {
   $newsTraffic->insert(['ip_address' => $visitor_ip, 'id_artikel' => $news[0]['id_artikel']]);
   $query = $db->query('SELECT COUNT(ip_address) FROM tblnewstraffic WHERE id_artikel = ' . $news[0]['id_artikel'] . ';');
   $results = json_decode(json_encode($query->getResult()), true);
   $db->query('UPDATE tblartikel SET news_traffic = ' . $results[0]['COUNT(ip_address)'] . ' WHERE id_artikel = ' . $news[0]['id_artikel'] . ';');
} else if ($newsTraffic->where('ip_address', $visitor_ip)->findColumn('ip_address') != null && $newsTraffic->where('id_artikel', $news[0]['id_artikel'])->findColumn('ip_address') == null) {
   $newsTraffic->insert(['ip_address' => $visitor_ip, 'id_artikel' => $news[0]['id_artikel']]);
   $query = $db->query('SELECT COUNT(ip_address) FROM tblnewstraffic WHERE id_artikel = ' . $news[0]['id_artikel'] . ';');
   $results = json_decode(json_encode($query->getResult()), true);
   $db->query('UPDATE tblartikel SET news_traffic = ' . $results[0]['COUNT(ip_address)'] . ' WHERE id_artikel = ' . $news[0]['id_artikel'] . ';');
}
$views = $artikel->where('id_artikel', $news[0]['id_artikel'],)->findColumn('news_traffic');
?>

<?= $this->section('content'); ?>

<?php if ($dataIklan[15]['iklan_gambar'] != null) : ?>
   <section class="whats-news-area">
      <div class="container">
         <div class="row">
            <img src="<?= base_url($dataIklan[15]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
         </div>
      </div>
   </section>
<?php endif; ?>

<div class="blog_area single-post-area" style="padding-top: 25px;">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 posts-list">
            <div class="single-post" style="margin-top: -30px;">
               <article>
                  <?php foreach ($news as $data) : ?>
                     <div class="blog_details">
                        <h2><?= $data['news_judul']; ?></h2>
                     </div>
                     <div class="feature-img" style="margin-top: 30px;">
                        <img class="img-fluid" src="<?= base_url($data['news_gambar']); ?>" alt="">
                     </div>
                     <div class="blog_details">
                        <ul class="blog-info-link mt-3 mb-4">
                           <li><a href="#"><i class="fa fa-user"></i> <?= $newsKategori[0]; ?></a></li>
                           <li><a href="#"><i class="fa fa-comments"></i> <?= sizeof($komen); ?> Comments</a></li>
                           <li style="float: right;"><a href="#"><i class="fa fa-eye"></i> <?= $views[0]; ?> Views</a></li>
                        </ul>
                     </div>
                     <?= $data['news_konten']; ?>
                  <?php endforeach ?>
               </article>
            </div>

            <?php if ($dataIklan[16]['iklan_gambar'] != null) : ?>
               <section class="single-post">
                  <div class="container">
                     <div class="row">
                        <img src="<?= base_url($dataIklan[16]['iklan_gambar']) ?>" alt="" class="img-fluid" style="margin-top: 25px; margin-bottom: 25px;">
                     </div>
                  </div>
               </section>
            <?php endif; ?>

            <div class="navigation-top">
               <div class="d-sm-flex justify-content-between text-center">
                  <!-- <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                     people like this</p> -->
                  <div class="col-sm-4 text-center my-2 my-sm-0">
                     <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                  </div>
                  <ul class="social-icons">
                     <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                     <li><a href="#"><i class="fab fa-behance"></i></a></li>
                  </ul>
               </div>
               <div class="navigation-area">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                        <div class="thumb">
                           <?php if (isset($previous[0]['link'])) { ?>
                              <a href="<?= base_url('/' . $previous[0]['link']); ?>">
                                 <img class="img-fluid" src="<?= base_url($previous[0]['news_gambar']); ?>" width="90" height="90" alt="">
                              </a>
                           <?php } else { ?>
                           <?php } ?>
                        </div>
                        <div class="arrow">
                           <?php if (isset($previous[0]['link'])) { ?>
                              <a href="<?= base_url('/' . $previous[0]['link']); ?>">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           <?php } else { ?>
                           <?php } ?>
                        </div>
                        <div class="detials">
                           <?php if (isset($previous[0]['link'])) { ?>
                              <p>Prev Post</p>
                              <a href="<?= base_url('/' . $previous[0]['link']); ?>">
                                 <h4><?= $previous[0]['news_judul']; ?></h4>
                              </a>
                           <?php } else { ?>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                        <div class="detials">
                           <?php if (isset($next[0]['link'])) { ?>
                              <p>Next Post</p>
                              <a href="<?= base_url('/' . $next[0]['link']); ?>">
                                 <h4><?= $next[0]['news_judul']; ?></h4>
                              </a>
                           <?php } ?>
                        </div>
                        <div class="arrow">
                           <?php if (isset($next[0]['link'])) { ?>
                              <a href="<?= base_url('/' . $next[0]['link']); ?>">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           <?php } ?>
                        </div>
                        <div class="thumb">
                           <?php if (isset($next[0]['link'])) { ?>
                              <a href="<?= base_url('/' . $next[0]['link']); ?>">
                                 <img class="img-fluid" src="<?= base_url($next[0]['news_gambar']); ?>" width="90" height="90" alt="">
                              </a>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="blog-author">
               <div class="media align-items-center">
                  <?php if ($dataCreator[0]->image != null) {
                     echo ("<img src=" . base_url($dataCreator[0]->image) . ">");
                  } else {
                     echo ("<img src=" . base_url('assets/author/img/undraw_profile_2.svg') . ">");
                  }
                  ?>
                  <div class="media-body">
                     <a href="#">
                        <h4><?= $dataCreator[0]->fullname ?></h4>
                     </a>
                     <p><?= $dataCreator[0]->about ?></p>
                  </div>
               </div>
            </div>
            <div class="comments-area">
               <h4><?= sizeof($komen); ?> Comments</h4>
               <?php foreach ($komen as $data) :
                  $date = strtotime((string) $data['created_at']);
               ?>
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="<?= base_url('assets/img/comment/comment_1.png'); ?>" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 <?= $data['komen_isi'] ?>
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#"><?= $data['komen_user'] ?></a>
                                    </h5>
                                    <p class="date"><?= date("d M Y H:i", $date); ?></p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endforeach ?>
            </div>
            <div class="comment-form">
               <h4>Leave a Reply</h4>
               <form class="form-contact comment_form" action="<?= base_url('/news/savecomment') ?>" id="commentForm">
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                           <textarea class="form-control w-100" name="komen_isi" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input class="form-control" name="komen_user" id="name" type="text" placeholder="Name">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input class="form-control" name="komen_email" id="email" type="email" placeholder="Email">
                        </div>
                     </div>
                     <div class="col-sm-6" hidden>
                        <div class="form-group">
                           <input class="form-control" name="link" id="name" type="text" placeholder="Name" value="<?= $news[0]['link']; ?>">
                        </div>
                     </div>
                     <div class="col-sm-6" hidden>
                        <div class="form-group">
                           <input class="form-control" name="id_artikel" id="name" type="text" placeholder="Name" value="<?= $news[0]['id_artikel']; ?>">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                  </div>
               </form>
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
                              <button class="btns" type="button"><i class="ti-search"></i></button>
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
                           <a href="<?= base_url("/categori?id_kategori=" . $data['id_kategori']) ?>" class="d-flex">
                              <p><?= $data['kategori_nama']; ?></p>

                           </a>
                        </li>
                     <?php endforeach ?>
                  </ul>
               </aside>

               <aside style="padding: 0px 0px 25px 0px;">
                  <?php if ($dataIklan[17]['iklan_gambar'] != null) : ?>
                     <div>
                        <img src="<?= base_url($dataIklan[17]['iklan_gambar']) ?>" class="img-fluid">
                     </div>
                  <?php endif; ?>
               </aside>

               <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Recent Post</h3>
                  <?php foreach ($recent as $data) :
                     $date = strtotime((string) $data['created_at']);
                  ?>
                     <div class="media post_item">
                        <a href="<?= base_url('/' . $data['link']) ?>">
                           <img src="<?= base_url($data['news_gambar']) ?>" alt="post" width="90" height="90">
                        </a>
                        <div class="media-body">
                           <a href="<?= base_url('/' . $data['link']) ?>">
                              <h3><?= $data['news_judul'] ?></h3>
                           </a>
                           <p><?= date("d M Y", $date); ?></p>
                        </div>
                     </div>
                  <?php endforeach ?>
               </aside>
               <!-- <aside class="single_sidebar_widget tag_cloud_widget">
                  <h4 class="widget_title">Tag Clouds</h4>
                  <ul class="list">
                     <li>
                        <a href="#">project</a>
                     </li>
                     <li>
                        <a href="#">love</a>
                     </li>
                     <li>
                        <a href="#">technology</a>
                     </li>
                     <li>
                        <a href="#">travel</a>
                     </li>
                     <li>
                        <a href="#">restaurant</a>
                     </li>
                     <li>
                        <a href="#">life style</a>
                     </li>
                     <li>
                        <a href="#">design</a>
                     </li>
                     <li>
                        <a href="#">illustration</a>
                     </li>
                  </ul>
               </aside> -->
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
</div>
<?= $this->endSection(); ?>