<?php

/**
 * Template name: Homepage
 */

get_header();

?>
<style>
#ui-datepicker-div {
    z-index: 10;
}

.ui-timepicker-container .ui-timepicker-no-scrollbar .ui-timepicker-standard {
    z-index: 10;
}
</style>
<div class="homepage">
    <section class="relative">
        <div class="home-banner">
            <div class="video-wrapper">
                <figure>
                    <video src="<?= get_field('banner_video'); ?>" loop autoplay muted></video>
                </figure>
            </div>
        </div>
        <div class="filter">
            <div class="wrap">
                <!-- <form action="">
                    <div class="filter-content">
                        <span>
                            Your name
                        </span>
                        <input type="text" class="input-trans" value="" placeholder="Type your name">
                    </div>
                    <div class="filter-content">
                        <span>
                            Mobile Number
                        </span>
                        <input type="text" class="input-trans" value="" placeholder="Type your mobile number">
                    </div>
                    <div class="filter-content">
                        <select class="input-trans">
                            <option value="">Date Arrive</option>
                        </select>
                        <input type="text" class="input-trans" value="" placeholder="Date choice" disabled>
                    </div>
                    <div class="filter-content">
                        <select class="input-trans">
                            <option value="">Time</option>
                        </select>
                        <input type="text" class="input-trans" value="" placeholder="Time choice" disabled>
                    </div>
                    <div class="filter-content">
                        <span>
                            Number of guests
                        </span>
                        <input type="text" class="input-trans value=" placeholder=" Type your number">
                    </div>
                    <button class="confirm button-primary">Book a table
                        <figure>
                            <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/arrow-right.svg"
                                alt="">
                        </figure>
                    </button>
                </form> -->
                <style>
                body .filter .wrap form .confirm.wpcf7-submit:hover {
                    transform: translate(-50%, 30px);
                }
                </style>
                <?php
                echo do_shortcode('[contact-form-7 id="52a5a20" title="Form Book Table"]');
                ?>
                <figure>
                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/home-filter-icon.svg"
                        class="illus-left" alt="illus">
                </figure>
                <figure>
                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/home-filter-icon-right.svg"
                        class="illus-right" alt="illus">
                </figure>
            </div>

        </div>
    </section>
    <section class="our-most"
        style="background:url(<?= get_template_directory_uri() ?>/dist/assets/image/our-most-bg.png)">
        <div class="container-homepage">
            <div class="top">
                <h1 class="" data-aos="fade-up" data-aos-duration="1000"><?= get_field('popular_title'); ?></h1>
                <span data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="1000"><?= get_field('popular_sub_title'); ?></span>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <?= get_field('popular_description'); ?></p>
            </div>
            <div class="bottom">
                <div class="grid-item" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1000">
                    <?php if (get_field('popular_items')) : ?>
                    <?php foreach (get_field('popular_items') as $item) : ?>
                    <div class="item">
                        <div class="image">
                            <figure>
                                <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" class="" alt="product">
                            </figure>
                        </div>
                        <div class="context">
                            <h2>
                                <?= $item->post_title; ?>
                            </h2>
                            <p>
                                <?= get_field('description', $item->ID) ?>
                            </p>
                            <span>
                                $<?= get_field('price', $item->ID) ?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <a href="<?= home_url(); ?>/menu" class="view-full fancy-hover button-primary">
                <?= get_field('popular_button'); ?>
            </a>
        </div>
    </section>
    <section class="cta" style="background: url(<?= get_field('location_background', 'option'); ?>)">
        <div class="context" data-aos="fade-up" data-aos-duration="1200">
            <h2><?= get_field('location_title', 'option'); ?></h2>
            <p><?= get_field('location_sub', 'option'); ?></p>
            <a target="_blank" href="<?= get_field('location_link', 'option'); ?>"
                class="cta-button hover-second "><?= get_field('location_button', 'option'); ?></a>
        </div>
    </section>
    <section class="event-slider" style="background:url(<?= get_field('promotion_background'); ?>);">
        <div class="top">
            <h2 class="" data-aos="fade-up" data-aos-duration="1000"><?= get_field('promotion_title'); ?></h2>
            <span data-aos="fade-up" data-aos-delay="100"
                data-aos-duration="1000"><?= get_field('promotion_sub_title'); ?></span>
            <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <?= get_field('promotion_description'); ?></p>
        </div>
        <div class="bottom">
            <!-- Slider main container -->
            <div id="swiper1" class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php if (get_field('promotion_items')) : ?>
                    <?php foreach (get_field('promotion_items') as $item) : ?>
                    <!-- Slides -->
                    <?php if ($item->post_type == "promotion") : ?>
                    <div class="swiper-slide">
                        <div class="slide-card">
                            <div class="image">
                                <a href="<?= get_the_permalink($item->ID) ?>">
                                    <figure>
                                        <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" class=""
                                            alt="promos-item">
                                    </figure>
                                </a>
                            </div>
                            <div class="context">
                                <a href="<?= get_the_permalink(getIdPage('promotion')) ?>">
                                    <span><?= ucfirst($item->post_type); ?></span>
                                </a>
                                <a href="<?= get_the_permalink($item->ID) ?>">
                                    <h2><?= $item->post_title; ?></h2>
                                </a>
                                <div class="row">
                                    <?php
                                                $date_start = get_field('promotion_date_start', $item->ID);
                                                $start = DateTime::createFromFormat('m/d/Y', $date_start);
                                                $date_end = get_field('promotion_date_end', $item->ID);
                                                $end = DateTime::createFromFormat('m/d/Y', $date_end);
                                                ?>
                                    <div class="item">
                                        <figure>
                                            <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Calendar.svg"
                                                class="" alt="">
                                        </figure>
                                        <?= $start->format('d M'); ?> - <?= $end->format('d M Y'); ?>
                                    </div>
                                </div>
                                <?= substr(get_field('promotion_description', $item->ID), 0, 150) . '...'; ?>
                                <figure class="promos-illus">
                                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/illus-big.png"
                                        class="" alt="abc">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <?php elseif ($item->post_type == "event") : ?>
                    <div class="swiper-slide">
                        <div class="slide-card">
                            <div class="image">
                                <a href="<?= get_the_permalink($item->ID) ?>">
                                    <figure>
                                        <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" class=""
                                            alt="promos-item">
                                    </figure>
                                </a>
                            </div>
                            <div class="context">
                                <a href="<?= get_the_permalink(getIdPage('promotion')) . '#event' ?>">
                                    <span><?= ucfirst($item->post_type); ?></span>
                                </a>
                                <a href="<?= get_the_permalink($item->ID) ?>">
                                    <h2><?= $item->post_title; ?></h2>
                                </a>
                                <div class="row">
                                    <?php
                                                $date_event = get_field('event_date', $item->ID);
                                                $date = DateTime::createFromFormat('m/d/Y', $date_event);
                                                ?>
                                    <div class="item">
                                        <figure>
                                            <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Calendar.svg"
                                                class="" alt="">
                                        </figure>
                                        <?= $date->format('m.d.Y') ?>
                                    </div>
                                    <div class="item">
                                        <figure>
                                            <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Clock-circle.svg"
                                                class="" alt="">
                                        </figure>
                                        <span><?= get_field('event_time_start', $item->ID); ?> to
                                            <?= get_field('event_time_end', $item->ID); ?></span>
                                    </div>
                                </div>
                                <?= substr(get_field('event_description', $item->ID), 0, 150) . '...'; ?>
                                <button class="button-primary fancy-hover open-modal" data-modal="modalEventBooking"
                                    data-title="<?= $item->post_title ?>">
                                    Book Event
                                </button>
                                <figure class="promos-illus">
                                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/illus-big.png"
                                        class="" alt="abc">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <div id="modalEventBooking" class="modal-wrapper">
        <div class="modal-container">
            <div class="modal-head">
                <h2>Event Booking</h2>
                <span class="modal-event-title"></span>
                <button class="close-modal">
                    <figure>
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/close.svg" alt="">
                    </figure>
                </button>
            </div>
            <div class="modal-content">
                <div action="" class="event-form">
                    <!-- <div class="row-1">
                        <div class="input-row">
                            <label>Title <span style="color: #dc2222;">*</span></label>
                            <select name="" class="input-field" id="">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="input-row">
                            <label>Name <span style="color: #dc2222;">*</span></label>
                            <input type="text" class="input-field" placeholder="Enter your name">
                        </div>
                        <div class="input-row">
                            <label>Email <span style="color: #dc2222;">*</span></label>
                            <input type="email" class="input-field" placeholder="Enter your email">
                        </div>
                        <div class="input-row">
                            <label>Phone <span style="color: #dc2222;">*</span></label>
                            <input type="text" class="input-field" placeholder="Enter your phone number">
                        </div>
                    </div>
                    <div class="row-2">
                        <div class="input-row">
                            <label>Date <span style="color: #dc2222;">*</span></label>
                            <select name="" class="input-field" id="">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="input-row">
                            <label>Time <span style="color: #dc2222;">*</span></label>
                            <input type="text" class="input-field" placeholder="Choose the time">
                        </div>
                        <div class="input-row">
                            <label>Number of Person(s)</label>
                            <input type="number" class="input-field"
                                placeholder="Enter your number of persons">
                        </div>
                    </div>
                    <div class="input-row">
                        <label>Message</label>
                        <textarea type="text" class="input-field" rows="5" cols="10"
                            placeholder="Your message"></textarea>
                    </div>

                    <button class="confirm button-primary">
                        Send request
                    </button> -->
                    <?php
                    echo do_shortcode('[contact-form-7 id="82b8c04" title="Form Book Event"]');
                    ?>
                </div>
            </div>

            <div class="illus-modal">
                <figure class="">
                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/modal-illus.svg" alt="">
                </figure>
            </div>
        </div>
    </div>
    <?php
    ?>
    <section class="gallery-slider">
        <div class="top">
            <h2 data-aos="fade-up" data-aos-duration="1000" class=""><?= get_field('gallery_title') ?></h2>
            <span data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" class="">
                <?= get_field('gallery_sub_title') ?></span>
            <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" class="">
                <?= get_field('gallery_description') ?>
            </p>
            <div class="gallery-tab">
                <div class="tab-item tab-gallery active" data-view="view-all" id="all-photos">
                    All Photos
                </div>
                <?php
                $galleryItems = get_field('gallery_items');
                $arr_category = [];
                $all_images = [];
                if ($galleryItems) :
                    foreach ($galleryItems as $key => $category) {
                        $all_images = array_merge($all_images, $category['images']);
                        $categoryName = $category['category'];
                        $tab = sanitize_title($categoryName);
                        if (!in_array($categoryName, $arr_category)) {
                            $arr_category[] = $tab; ?>
                <div class="tab-item tab-gallery" data-view="view-<?= $key ?>" id="<?= $tab ?>">
                    <?= esc_html($categoryName) ?>
                </div>
                <?php
                        }
                    }
                endif;
                ?>
            </div>
        </div>
        <div class="bottom gallery-view" id="view-all">
            <!-- Slider main container -->
            <div class="swiper-gallery swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper gallery-wrapper">
                    <!-- Slides -->
                    <?php foreach ($all_images as $key => $image) : ?>
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-item">
                            <a href="<?= $image ?>" data-fancybox="gallery">
                                <figure>
                                    <img src="<?= $image ?>" class="" alt="promos-item">
                                </figure>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <?php foreach ($galleryItems as $key => $category) : ?>
        <div class="bottom gallery-view" id="view-<?= $key ?>">
            <!-- Slider main container -->
            <div class="swiper-gallery swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper gallery-wrapper">
                    <!-- Slides -->
                    <?php foreach ($category['images'] as $key => $image) : ?>
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-item">
                            <a href="<?= $image ?>" data-fancybox="gallery">
                                <figure>
                                    <img src="<?= $image ?>" class="" alt="promos-item">
                                </figure>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <?php endforeach; ?>
    </section>

    <section class="our-next" data-aos="zoom-out" data-aos-duration="1000">
        <?php
        $event = get_field('upcoming_event', 'option');
        $date = new DateTime(get_field('event_date', $event->ID));
        ?>
        <div class="img-wrap">
            <div class="img-border">
                <div class="img">
                    <figure>
                        <img src="<?= get_the_post_thumbnail_url($event->ID); ?>" class="" alt="our-event">
                    </figure>
                </div>
            </div>
            <div class="img-no-border">
                <div class="img">
                    <figure>
                        <img src="<?= get_field('upcoming_image', 'option') ?>" class="" alt="our-event">
                    </figure>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="content">
                <div class="top">
                    <span class="title"><?= get_field('upcoming_event_label', 'option'); ?></span>
                    <h2><?= $event->post_title ?></h2>
                    <div class="row">
                        <div class="item">
                            <figure>
                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Calendar-white.svg"
                                    class="" alt="">
                            </figure>
                            <span><?= $date->format('m.d.Y') ?></span>
                        </div>
                        <div class="item">
                            <figure>
                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Clock-circle-white.svg"
                                    class="" alt="">
                            </figure>
                            <span>
                                <?php
                                $event_time_start = get_field('event_time_start', $event->ID);
                                $event_time_end = get_field('event_time_end', $event->ID);
                                $time = DateTime::createFromFormat('h:i a', $event_time_start);
                                $date->setTime((int) $time->format('H'), (int) $time->format('i'));
                                $formatted_date_time = $date->format('M d, Y H:i:s');
                                ?>
                                <?= $event_time_start ?> to
                                <?= $event_time_end ?>
                            </span>
                        </div>
                    </div>
                    <?php
                    $event_description = get_field('event_description', $event->ID);
                    $event_description = substr($event_description, strpos($event_description, "<p"), strpos($event_description, "</p>") + 4);
                    ?>
                    <?= $event_description ?>
                </div>
                <?php
                $current_date = new DateTime();
                ?>
                <div class="bottom">
                    <div class="countdown-container">
                        <span>Time left until event</span>
                        <div class="countdown">
                            <div class="countdown-item">
                                <span id="days"><?= $date->format('d') ?></span>
                                <span class="label">DAYS</span>
                            </div>
                            <div class="countdown-item">
                                <span id="hours"><?= $date->format('H') ?></span>
                                <span class="label">HOURS</span>
                            </div>
                            <div class="countdown-item">
                                <span id="minutes"><?= $date->format('i') ?></span>
                                <span class="label">MINS</span>
                            </div>
                            <div class="countdown-item">
                                <span id="seconds"><?= $date->format('s') ?></span>
                                <span class="label">SECS</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="button-primary fancy-hover open-modal" data-modal="modalEventBooking"
                    data-title="<?= $event->post_title ?>">
                    Book Event
                </button>
            </div>
            <div class="illus">
                <figure>
                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/our-event-illus.svg"
                        alt="illus-svg">
                </figure>
            </div>
        </div>
    </section>

    <section class="cta-2" style="background:url(<?= get_field('organize_background'); ?>);">
        <div class="context" data-aos="zoom-in" data-aos-duration="1200">
            <h2><?= get_field('organize_title') ?></h2>
            <span><?= get_field('organize_sub_title') ?></span>
            <p><?= get_field('organize_description') ?></p>
            <a href="<?= home_url(); ?>/promotions-events/#event"
                class="cta-button button-primary fancy-hover"><?= get_field('organize_button') ?></a>
        </div>
    </section>

    <section class="feedback">
        <div class="container background">
            <div class="content">
                <div class="top">
                    <h2 data-aos="fade-left" data-aos-duration="1000"><?= get_field('feedback_title') ?></h2>
                    <span data-aos="fade-left" data-aos-duration="1000"><?= get_field('feedback_sub_title') ?></span>
                    <p data-aos="fade-left" data-aos-duration="1000"><?= get_field('feedback_description') ?></p>
                </div>
                <div class="bottom">
                    <div class="border" data-aos="zoom-in" data-aos-duration="1000">
                        <figure>
                            <video src="<?= get_field('feedback_video') ?>" loop autoplay muted></video>
                        </figure>
                    </div>

                    <!-- illus animation -->
                    <figure class="left-illus-1">
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-review-left-1.svg"
                            alt="icon">
                    </figure>
                    <figure class="left-illus-2">
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-review-left-2.svg"
                            alt="icon">
                    </figure>
                    <figure class="left-illus-3">
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-review-left-3.svg"
                            alt="icon">
                    </figure>
                    <figure class="left-illus-4">
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-review-left-4.svg"
                            alt="icon">
                    </figure>

                    <figure class="right-illus-1">
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-review-right-1.svg"
                            alt="icon">
                    </figure>
                    <figure class="right-illus-2">
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-review-right-2.svg"
                            alt="icon">
                    </figure>
                    <figure class="right-illus-3">
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-review-right-3.svg"
                            alt="icon">
                    </figure>
                    <figure class="right-illus-4">
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-review-right-4.svg"
                            alt="icon">
                    </figure>
                    <!-- <div class="illus">
                        <figure>
                            <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/feedback-illus.svg" alt="">
                        </figure>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

</div>

<!-- fancy-box -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$('[data-fancybox]').fancybox({
    protect: true,
    loop: true,
    buttons: [
        "zoom",
        "slideShow",
        "fullScreen",
        "download",
        "thumbs",
        "close"
    ],
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

<!-- swiper script -->
<script defer>
const swiper = new Swiper('#swiper1', {
    // Optional parameters
    slidesPerView: 1,
    spaceBetween: 48,
    // direction: getDirection(),
    centeredSlides: true,
    // roundLengths: true,
    loop: true,
    autoplay: true,
    breakpoints: {
        552: {
            slidesPerView: 1.2,
        },
        1200: {
            slidesPerView: 1.48,
        },
        2560: {
            slidesPerView: 2,
        }
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

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',

    },
});


const swiper2 = new Swiper('.swiper-gallery', {
    // Optional parameters
    slidesPerView: 1,
    spaceBetween: 8,
    // direction: getDirection(),
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        552: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
        1440: {
            slidesPerView: 4,
        },
        2560: {
            slidesPerView: 6,
        }
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

<!-- script animation review feedback -->
<script defer>
document.addEventListener('DOMContentLoaded', function() {
    const elementsToScaleSmall = [
        document.querySelector('.left-illus-1'),
        document.querySelector('.left-illus-3'),
        document.querySelector('.left-illus-4'),
        document.querySelector('.right-illus-1')
    ];

    const elementsToScale40 = [
        document.querySelector('.left-illus-2'),
        document.querySelector('.right-illus-2'),
        document.querySelector('.right-illus-3'),
        document.querySelector('.right-illus-4')
    ];

    let isScaledDown = false;

    function scaleSmall() {
        // Thu nhỏ nhóm 1 (0.6) và giữ nguyên nhóm 2 (1)
        elementsToScaleSmall.forEach(el => {
            el.style.transform = 'scale(0.6)';
        });
        elementsToScale40.forEach(el => {
            el.style.transform = 'scale(1)';
        });
    }

    function scale40() {
        // Thu nhỏ nhóm 2 (0.4) và mở rộng nhóm 1 về kích thước ban đầu (1)
        elementsToScaleSmall.forEach(el => {
            el.style.transform = 'scale(1)';
        });
        elementsToScale40.forEach(el => {
            el.style.transform = 'scale(0.4)';
        });
    }

    // Luân phiên giữa scaleSmall và scale40
    setInterval(() => {
        if (isScaledDown) {
            scale40(); // Scale nhóm 1 trở về và nhóm 2 thu nhỏ
        } else {
            scaleSmall(); // Scale nhóm 1 thu nhỏ và nhóm 2 giữ nguyên
        }
        isScaledDown = !isScaledDown;
    }, 3500); // Thay đổi sau mỗi 2 giây
});
</script>



<!-- galery tab item active -->
<script defer>
// Đảm bảo phần tử đầu tiên có class 'active' khi trang tải
document.querySelector('.gallery-tab .tab-item').classList.add('active');

// Xử lý khi người dùng nhấp vào các tab
document.querySelectorAll('.gallery-tab .tab-item').forEach(function(tab) {
    tab.addEventListener('click', function() {
        // Xóa lớp 'active' khỏi tất cả các tab
        document.querySelectorAll('.gallery-tab .tab-item').forEach(function(item) {
            item.classList.remove('active');
        });

        // Thêm lớp 'active' cho tab được nhấn
        tab.classList.add('active');

        // Lấy giá trị data-view từ tab được nhấn
        const viewId = tab.getAttribute('data-view');

        // Thêm lớp 'active' cho phần hình ảnh tương ứng
        const activeGallery = document.getElementById(viewId);
        if (activeGallery) {
            activeGallery.classList.add('active');
        }
    });
});
</script>

<!-- our event countdown  -->
<script defer>
// Set thời gian đích (ngày sự kiện)
var countDownDate = new Date("<?= $formatted_date_time ?>").getTime();

// Update countdown mỗi giây
var x = setInterval(function() {

    // Lấy thời gian hiện tại
    var now = new Date().getTime();

    // Tìm khoảng cách giữa thời gian hiện tại và thời gian đích
    var distance = countDownDate - now;

    // Tính toán số ngày, giờ, phút và giây
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Hiển thị kết quả trong các thẻ HTML
    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = ("0" + hours).slice(-2); // Thêm 0 cho các số < 10
    document.getElementById("minutes").innerHTML = ("0" + minutes).slice(-2);
    document.getElementById("seconds").innerHTML = ("0" + seconds).slice(-2);

    // Nếu hết thời gian, dừng đếm ngược
    if (distance < 0) {
        clearInterval(x);
        // document.querySelector(".countdown").innerHTML = "Event Ended";
        // hiển thị 0:0:0:0
        document.getElementById("days").innerHTML = 0;
        document.getElementById("hours").innerHTML = 0;
        document.getElementById("minutes").innerHTML = 0;
        document.getElementById("seconds").innerHTML = 0;
    }
}, 1000);
</script>

<!-- script chạy border -->
<script defer>
let angle = 60; // Góc bắt đầu
const border = document.querySelector('.border');

function changeGradient() {
    angle = (angle + 1) % 360; // Tăng góc lên 1 độ và quay lại 0 sau khi đạt 360
    border.style.background =
        `linear-gradient(${angle}deg, rgba(124, 243, 33, 0) 16.79%, rgba(255, 255, 255, 0.94) 37.98%, rgba(194, 243, 33, 0) 79.39%)`;
}

// Gọi hàm mỗi 100ms
setInterval(changeGradient, 50);
</script>

<!-- modal script -->
<script defer src="<?= get_template_directory_uri(); ?>/dist/assets/js/modal.js"></script>

<script>
jQuery(document).ready(function() {
    $('.tab-item:first').addClass('active');
    $('.gallery-view:first').show();
    jQuery('.tab-item').on('click', function() {
        // Remove 'active' class from all tabs and add it to the clicked one
        jQuery('.tab-item').removeClass('active');
        jQuery(this).addClass('active');

        // Get the view ID from data-view attribute
        const viewId = jQuery(this).data('view');

        // Hide all galleries and show the selected one
        jQuery('.gallery-view').hide();
        jQuery(`#${viewId}`).show();
    });

    // Cache modal elements
    jQuery('.open-modal').on('click', function() {
        let title = jQuery(this).data('title');
        let modal = jQuery('#modalEventBooking');
        let modalTitle = modal.find('.modal-event-title');
        let closeButton = modal.find('.close-modal');
        jQuery('.modal-event-title').text(title);
    });

    jQuery('#number-guest').on('change', function() {
        let guest = jQuery(this).val();
        if (guest) {
            jQuery(this).parent().find('p').text(guest);
            jQuery('input[name="number-guest"]').val(guest);
        }
        jQuery(this).val('');
    });
})
</script>

<?php
get_footer();

?>