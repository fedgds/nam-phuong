<?php

/**
 * Template name: About
 */
get_header();
?>
<div class="about">
    <section class="banner" style="background: url(<?= get_field('banner_image'); ?>)">
        <div class="content">
            <h1 data-aos="fade-down" data-aos-duration="1000"><?= get_field('banner_title'); ?></h1>
            <div class="breadcrumb" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <a href="<?= home_url(); ?>">Home</a>
                <figure>
                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/chevron-right-w.svg"
                        alt="abc">
                </figure>
                <span><?= get_field('banner_title'); ?></span>
            </div>
        </div>
    </section>
    <section class="our-story">
        <div class="container">
            <div class="left">
                <figure data-aos="fade-right" data-aos-duration="1200">
                    <img src="<?= get_field('story_image_left'); ?>" alt="our-story">
                </figure>
                <figure data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <img src="<?= get_field('story_image_right'); ?>" alt="our-story">
                </figure>
            </div>
            <div class="right">
                <h2 data-aos="fade-left" data-aos-duration="1000"><?= get_field('story_title'); ?></h2>
                <span data-aos="fade-left" data-aos-delay="100"
                    data-aos-duration="1000"><?= get_field('story_sub_title'); ?></span>
                <p data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                    <?= get_field('story_description'); ?> </p>
            </div>
        </div>
    </section>
    <section class="gallery-slider" style="background: url(<?= get_field('space_background'); ?>)">
        <div class="top">
            <h2 data-aos="fade-up" data-aos-duration="1000" class=""><?= get_field('space_title'); ?></h2>
            <span data-aos="fade-up" data-aos-delay="100"
                data-aos-duration="1000"><?= get_field('space_sub_title'); ?></span>
            <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000"><?= get_field('space_description'); ?>
            </p>
        </div>
        <div class="bottom">
            <!-- Slider main container -->
            <div id="swiperAboutSpace" class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slide -->
                    <?php if (get_field('space_images')) : ?>
                    <?php foreach (get_field('space_images') as $image) : ?>
                    <div class="swiper-slide">
                        <div class="gallery-item">
                            <figure>
                                <img src="<?= $image ?>" class="" alt="promos-item">
                            </figure>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="why-choose">
        <div class="container">
            <div class="left">
                <h2 data-aos="fade-right" data-aos-duration="1000"><?= get_field('why_title'); ?></h2>
                <span data-aos="fade-right" data-aos-delay="100"
                    data-aos-duration="1000"><?= get_field('why_sub_title'); ?></span>
                <div class="wcu-container">
                    <?php if (get_field('why_items')) : ?>
                    <?php foreach (get_field('why_items') as $key => $item) :
                            if ($key == 0) {
                                $dataAos = 'data-aos="fade-right" data-aos-duration="800" data-aos-delay="200"';
                            } elseif ($key == 1) {
                                $dataAos = 'data-aos="fade-right" data-aos-duration="800" data-aos-delay="300"';
                            } elseif ($key == 2) {
                                $dataAos = 'data-aos="fade-right" data-aos-duration="800" data-aos-delay="400"';
                            } elseif ($key == 3) {
                                $dataAos = 'data-aos="fade-right" data-aos-duration="800" data-aos-delay="500"';
                            }
                        ?>
                    <div class="row" <?= $dataAos ?>>
                        <figure>
                            <img src="<?= $item['icon'] ?>" alt="about">
                        </figure>
                        <div class="content">
                            <h3><?= $item['title'] ?></h3>
                            <span><?= $item['description'] ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="right">
                <figure data-aos="fade-left" data-aos-duration="1200">
                    <img src="<?= get_field('why_image'); ?>" alt="why choose">
                </figure>
            </div>
        </div>
    </section>

    <section class="our-customer" style="background: url(<?= get_field('feedback_background'); ?>)">
        <div class="container">
            <div class="top">
                <h2 data-aos="fade-up" data-aos-duration="1000"><?= get_field('feedback_title'); ?></h2>
                <span data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="1000"><?= get_field('feedback_sub_title'); ?></span>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <?= get_field('feedback_description'); ?></p>
            </div>
            <div class="bottom">
                <!-- Slider main container -->
                <div id="swiperAboutFeedBack" class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php if (get_field('feedback_items')) : ?>
                        <?php foreach (get_field('feedback_items') as $item) : ?>
                        <div class="swiper-slide">
                            <div class="feedback-item">
                                <div class="title">
                                    <h3><?= $item['name'] ?></h3>
                                    <span><?= $item['time'] ?></span>
                                </div>
                                <div class="sub">
                                    <span><?= $item['description'] ?></span>
                                </div>
                                <div class="rating">
                                    <?php foreach ($item['stars'] as $star) : ?>
                                    <div class="row">
                                        <span><?= $star['title'] ?>:</span>
                                        <div class="star-rate">
                                            <?php for ($i = 0; $i < $star['star']; $i++) : ?>
                                            <figure>
                                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/star.svg"
                                                    alt="abc">
                                            </figure>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <p class="comment"><?= $item['text'] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="cta" style="background: url(<?= get_field('location_background', 'option'); ?>)">
        <div class="context" data-aos="zoom-in" data-aos-duration="1200">
            <h2 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <?= get_field('location_title', 'option'); ?></h2>
            <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <?= get_field('location_sub', 'option'); ?></p>
            <a target="_blank" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000"
                href="<?= get_field('location_link', 'option'); ?>"
                class="cta-button"><?= get_field('location_button', 'option'); ?></a>
        </div>
    </section>
</div>

<!-- swiper script -->
<script defer>
const swiperAboutSpace = new Swiper('#swiperAboutSpace', {
    // Optional parameters
    slidesPerView: 4,
    spaceBetween: 8,
    loop: true,
    breakpoints: true,
    autoplay: true,
    breakpoint: {
        1200: {
            slidesPerView: 3,
        },
        992: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 1,
        },
    },

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});
const swiperAboutFeedBack = new Swiper('#swiperAboutFeedBack', {
    // Optional parameters
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    autoplay: true,
    breakpoints: true,

    breakpoints: {
        640: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});
</script>

<!-- header scroll script -->
<script defer>
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    const headContainer = document.querySelector('.head-container');
    const logo = document.querySelector('.logo');
    const logoScroll = document.querySelector('.logo-scroll');

    // Check if the user scrolled down
    if (window.scrollY > 50) { // You can adjust this value for when to trigger the effect
        header.classList.add('scroll');
        headContainer.classList.add('scroll');
    } else {
        header.classList.remove('scroll');
        headContainer.classList.remove('scroll');
    }
});
</script>

<?php

get_footer();
?>