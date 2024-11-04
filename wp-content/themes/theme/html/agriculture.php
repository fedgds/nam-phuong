<?php include './header.php' ?>

<section class="banner">
    <div class="img">
        <figure>
            <img src="./dist/img/Rectangle 30.png" alt="">
        </figure>
    </div>
    <div class="text">
        <div class="top">
            <h4>Aus4Equality / <span>Agriculture</span></h4>
        </div>
        <div class="bot">
            <h2>Agriculture</h2>
        </div>
    </div>
</section>

<div class="container">
    <section class="agriculture">
        <div class="content">
            <div class="image">
                <figure>
                    <img src="./dist/img/Rectangle 54.png" alt="">
                </figure>
            </div>
            <div class="text">
                <div class="title">
                    <h2>Agriculture Sector Overview</h2>
                    <div class="underlined">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="desc">
                    <p>The Gender Responsive Equitable Agriculture and Tourism (GREAT) Program is working with partners to sustainably grow the agricultural sector in Lao Cai and Son La. The provinces fertile land and improving access to major markets, provides significant opportunities for women to increase their income. </p>
                    <p>Around 80% of the Son La population is engaged in agriculture and in 2019 the sector represented just over 24% of provincial GDP. Lao Cai also has a largely rural population with almost everyone involved in agriculture in one way or another; with the sector contributing to 16% of the province’s GDP. Women are actively engaged in agricultural and represent upwards of 60% of total labour, however they face constraints in accessing technical support, inputs and market information. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="our-agriculture">
        <div class="title">
            <div class="name">
                <h2>Our agriculture focus areas</h2>
                <div class="underlined">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="desc">
                <p>GREAT has adopted a multipronged approach to stimulating change in partnership with the private sector, government and civil society organisations in the tourism and agriculture markets.</p>
            </div>
        </div>
        <div class="content row">
            <div class="col-lg-4">
                <div class="child">
                    <div class="image">
                        <figure>
                            <img src="./dist/img/Rectangle 55.png" alt="">
                        </figure>
                    </div>
                    <div class="text">
                        <div class="name">
                            <h4>Bamboo shoot</h4>
                        </div>
                        <div class="desc">
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempo, Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempo...</p>
                        </div>
                        <div class="action">
                            <a href="#">View detail</a>
                            <i class="fas fa-caret-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="child">
                    <div class="image">
                        <figure>
                            <img src="./dist/img/Rectangle 56.png" alt="">
                        </figure>
                    </div>
                    <div class="text">
                        <div class="name">
                            <h4>Cinnamon</h4>
                        </div>
                        <div class="desc">
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempo, Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempo...</p>
                        </div>
                        <div class="action">
                            <a href="#">View detail</a>
                            <i class="fas fa-caret-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="child">
                    <div class="image">
                        <figure>
                            <img src="./dist/img/Rectangle 57.png" alt="">
                        </figure>
                    </div>
                    <div class="text">
                        <div class="name">
                            <h4>Ramie</h4>
                        </div>
                        <div class="desc">
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempo, Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempo...</p>
                        </div>
                        <div class="action">
                            <a href="#">View detail</a>
                            <i class="fas fa-caret-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        $related_pages = get_field('related_page');

        if ($related_pages) {
            foreach ($related_pages as $page) {
                setup_postdata($page);

                // Hiển thị thông tin của trang con
                ?>
                <div class="col-lg-4">
                    <div class="child">
                        <div class="image">
                            <figure>
                                <?php echo get_the_post_thumbnail($page, 'thumbnail'); ?>
                            </figure>
                        </div>
                        <div class="text">
                            <div class="name">
                                <h4><?php echo get_the_title($page); ?></h4>
                            </div>
                            <div class="desc">
                                <p><?php echo wp_trim_words(get_the_content($page), 20); ?></p>
                            </div>
                            <div class="action">
                                <a href="<?php echo get_permalink($page); ?>">View detail</a>
                                <i class="fas fa-caret-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                wp_reset_postdata(); // Đặt lại dữ liệu của trang chính
            }
        }
    ?>
    </section>
</div>

<?php include './footer.php' ?>