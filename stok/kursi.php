<?php
   include ('../layouts/header.php');
   ?>

 <!-- Featured Section Begin -->
 <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-start mb-4">
                    <a href="../inventory/index.php" class="btn btn-custom" style="background: linear-gradient(45deg,rgb(59, 175, 183),rgb(156, 218, 226)); color: white; padding: 12px 25px; border-radius: 30px; font-weight: bold; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); text-decoration: none; display: flex; align-items: center;">
                        <i class="fa fa-arrow-left" style="margin-right: 8px;"></i> Kembali
                    </a>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2 style="color: #333; font-weight: bold;">Kursi</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="featured__controls text-center">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Termahal</li>
                            <li data-filter=".fresh-meat">Favorit</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="../img/featured/kayupinus.jpg.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Kursi kayupinus</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="../img/featured/kursipijat.jepg.jpeg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Kursi pijat</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="../img/featured/kursi.webp">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Kursi santai</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

<?php
   include ('../layouts/footer.php');  
   include ('../layouts/js.php');
   ?>
