<?php

/**
 * Template name: Promotions & Events
 */
get_header();

?>
<div class="promotion">
    <section class="banner" data-aos="fade-down" data-aos-duration="1000"
        style="background: url(<?= get_field('banner_image'); ?>)">
        <div class="content">
            <h1><?= get_field('banner_title'); ?></h1>
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
    <section class="main-content">
        <div class="container">
            <div class="top">
                <h1 data-aos="fade-up" data-aos-duration="1000" class=""><?= get_field('promotion_title'); ?></h1>
                <span data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="1000"><?= get_field('promotion_sub_title'); ?></span>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <?= get_field('promotion_description'); ?></p>
            </div>
            <div class="bottom">
                <div class="grid-view">
                    <?php
                    $promos_args = array(
                        'post_type' => 'promotion',
                        'posts_per_page' => 4,
                    );
                    $promotion = get_posts($promos_args);
                    $current_id_promos = [];
                    ?>

                    <?php if ($promotion) : ?>
                    <?php foreach ($promotion as $post) : ?>
                    <?php
                            $current_id_promos[] = $post->ID;
                            if ($post === $promotion[0]) {
                                $dataAos = 'data-aos="zoom-in" data-aos-duration="800"';
                            } else {
                                $dataAos = 'data-aos="zoom-in" data-aos-duration="800" data-aos-delay="' . (100 * ($post->ID - $promotion[0]->ID)) . '"';
                            }
                            ?>
                    <div class="item-view" <?= $dataAos ?>>
                        <div class="image">
                            <a href="<?= get_the_permalink($post->ID) ?>">
                                <figure>
                                    <img src="<?= get_the_post_thumbnail_url($post->ID); ?>" alt="">
                                </figure>
                            </a>
                        </div>
                        <div class="context">
                            <span><?= ucfirst($post->post_type); ?></span>
                            <a href="<?= get_the_permalink($post->ID) ?>">
                                <h2><?= $post->post_title; ?></h2>
                            </a>
                            <div class="row">
                                <div class="item">
                                    <figure>
                                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Calendar.svg"
                                            class="" alt="">
                                    </figure>
                                    <?php
                                            $date_start = get_field('promotion_date_start', $post->ID);
                                            $start = DateTime::createFromFormat('m/d/Y', $date_start);
                                            $date_end = get_field('promotion_date_end', $post->ID);
                                            $end = DateTime::createFromFormat('m/d/Y', $date_end);
                                            ?>
                                    <span><?= $start->format('d M'); ?> - <?= $end->format('d M Y'); ?></span>
                                </div>
                            </div>
                            <?php
                                    $description = get_field('promotion_description', $post->ID);
                                    $description = substr($description, strpos($description, "<p"), strpos($description, "</p>") + 4);
                                    ?>
                            <?= $description ?>
                        </div>
                    </div>
                    <?php endforeach;
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <?php
                $promos_count = array(
                    'post_type' => 'promotion',
                );
                $count = get_posts($promos_count);
                ?>
                <?php if (count($count) > 4) : ?>
                <button class="load-more button-primary" id="load-more-promotion" data-page="1" data-button="promotion"
                    data-aos="fade-up" data-aos-duration="800" data-aos-offset="50">
                    Load More
                </button>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php
    $event = get_field('upcoming_item');
    $date_event = new DateTime(get_field('event_date', $event->ID));
    ?>
    <section class="upcoming-event">
        <div class="container">
            <div class="content" data-aos="fade-right" data-aos-duration="1200">
                <div class="top">
                    <span class="title"><?= get_field('upcoming_label'); ?></span>
                    <h2>
                        <?= $event->post_title ?>
                    </h2>
                    <div class="row">
                        <div class="item">
                            <figure>
                                <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/Calendar-white.svg"
                                    class="" alt="">
                            </figure>
                            <span><?= $date_event->format('m.d.Y') ?></span>
                        </div>
                        <div class="item">
                            <figure>
                                <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/Clock-circle-white.svg"
                                    class="" alt="">
                            </figure>
                            <?php
                            $event_time_start = get_field('event_time_start', $event->ID);
                            $event_time_end = get_field('event_time_end', $event->ID);
                            $time = DateTime::createFromFormat('h:i a', $event_time_start);
                            $date_event->setTime((int) $time->format('H'), (int) $time->format('i'));
                            $formatted_date_time = $date_event->format('M d, Y H:i:s');
                            ?>
                            <span><?= get_field('event_time_start', $event->ID); ?> to
                                <?= get_field('event_time_end', $event->ID); ?></span>
                        </div>
                    </div>
                    <?php
                    $event_description = get_field('event_description', $event->ID);
                    $event_description = substr($event_description, strpos($event_description, "<p"), strpos($event_description, "</p>") + 4);
                    ?>
                    <?= $event_description ?>
                </div>
                <div class="bottom">
                    <div class="countdown-container">
                        <span>Time left until event</span>
                        <div class="countdown">
                            <div class="countdown-item">
                                <span id="days">20</span>
                                <span class="label">DAYS</span>
                            </div>
                            <div class="countdown-item">
                                <span id="hours">08</span>
                                <span class="label">HOURS</span>
                            </div>
                            <div class="countdown-item">
                                <span id="minutes">01</span>
                                <span class="label">MINS</span>
                            </div>
                            <div class="countdown-item">
                                <span id="seconds">59</span>
                                <span class="label">SECS</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="button-primary open-modal" data-modal="modalEventBooking"
                    data-title="<?= $event->post_title ?>">
                    <?= get_field('upcoming_button'); ?>
                </button>
            </div>
            <div class="image" data-aos="fade-left" data-aos-duration="1200">
                <figure>
                    <img src="<?= get_the_post_thumbnail_url($event->ID); ?>" alt="">
                </figure>
            </div>
        </div>
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
                        <?php
                        echo do_shortcode('[contact-form-7 id="82b8c04" title="Form Book Event" html_class="event-form"]');
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
    </section>

    <section class="main-content" id="event">
        <div class="container">
            <div class="top">
                <h1 data-aos="fade-up" data-aos-duration="1000" class=""><?= get_field('event_title'); ?></h1>
                <span data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="1000"><?= get_field('event_sub_title'); ?></span>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <?= get_field('event_description'); ?></p>
            </div>
            <div class="bottom">
                <div class="list-view">
                    <?php
                    $event_args = array(
                        'post_type' => 'event',
                        'posts_per_page' => 3,
                    );
                    $event = get_posts($event_args);
                    $current_id_event = [];
                    ?>
                    <?php if ($event) : ?>
                    <?php foreach ($event as $key => $post) : ?>
                    <?php
                            $current_id_event[] = $post->ID;
                            ?>
                    <?php
                            $date = new DateTime(get_field('event_date'));
                            $day = $date->format('d');
                            $month = $date->format('F');
                            if ($key % 2 == 0) {
                                $dataAos = 'data-aos="fade-right" data-aos-duration="1000"';
                            } else {
                                $dataAos = 'data-aos="fade-left" data-aos-duration="1000"';
                            }
                            ?>
                    <div class="list-item-content" <?= $dataAos ?>>
                        <div class="left">
                            <h2>
                                <?= $day ?>
                            </h2>
                            <span><?= $month ?></span>
                        </div>
                        <div class="mid">
                            <a href="<?= get_the_permalink($post->ID) ?>">
                                <figure>
                                    <img src="<?= get_the_post_thumbnail_url($post->ID); ?>" alt="">
                                </figure>
                            </a>
                            <div class="text">
                                <a href="<?= get_the_permalink($post->ID) ?>">
                                    <h2><?= $post->post_title; ?></h2>
                                </a>
                                <?php
                                        $event_description = get_field('event_description', $post->ID);
                                        $event_description = substr($event_description, strpos($event_description, "<p"), strpos($event_description, "</p>") + 4);
                                        ?>
                                <?= $event_description ?>
                            </div>
                        </div>
                        <button class="button-primary open-modal" data-modal="modalEventBooking"
                            data-title="<?= $post->post_title ?>">
                            Book Event
                        </button>
                    </div>
                    <?php endforeach;
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <?php
                $event_count = array(
                    'post_type' => 'event',
                );
                $count_event = get_posts($event_count);
                ?>
                <?php if (count($count_event) > 3) : ?>
                <button class="load-more button-primary" id="load-more-event" data-page="1" data-button="event">
                    Load More
                </button>
                <?php endif; ?>
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

<?php

get_footer();

?>

<!-- modal script -->
<script defer src="<?= get_template_directory_uri(); ?>/dist/assets/js/modal.js"></script>

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
function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
    return direction;
}

const swiperAboutSpace = new Swiper('#swiperAboutSpace', {
    // Optional parameters
    slidesPerView: 4,
    spaceBetween: 8,
    direction: getDirection(),
    loop: true,

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
    slidesPerView: 3,
    spaceBetween: 24,
    direction: getDirection(),
    loop: true,

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
        document.querySelector(".countdown").innerHTML = "Event Ended";
    }
}, 1000);
</script>
<script>
jQuery(document).ready(function($) {
    let currentPostPromos = <?= json_encode($current_id_promos) ?>;
    let currentPostEvent = <?= json_encode($current_id_event) ?>;

    let pagedPromo = 1;
    let pagedEvent = 1;
    jQuery('#load-more-promotion').on('click', function(e) {
        let post_type = jQuery(this).data('button');
        e.preventDefault();

        jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php') ?>',
            type: 'POST',
            data: {
                action: 'load_more_posts',
                post_type: 'promotion',
                paged: pagedPromo,
                post__not_in: currentPostPromos,
            },
            beforeSend: function() {
                jQuery('#load-more-promotion').text('Loading...');
            },
            success: function(response) {
                if (response.content) {
                    jQuery('.grid-view').append(response.content); // Thêm nội dung mới
                    pagedPromo++; // Tăng số trang cho lần click tiếp theo
                    jQuery('#load-more-promotion').text('Load More');
                }

                if (!response.has_more_posts) {
                    jQuery('#load-more-promotion').hide(); // Ẩn nút nếu không còn bài viết
                }
            },
            error: function() {
                jQuery('#load-more-promotion').text('Load More'); // Khôi phục nút nếu lỗi
            }
        });
    });

    jQuery('#load-more-event').on('click', function(e) {
        let post_type = jQuery(this).data('button');
        e.preventDefault();

        jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'load_more_posts',
                post_type: post_type,
                paged: pagedEvent,
                post__not_in: currentPostEvent, // Nếu cần loại bỏ bài viết đã hiển thị
            },
            beforeSend: function() {
                jQuery('#load-more-event').text('Loading...');
            },
            success: function(response) {
                if (response.content) {
                    jQuery('.list-view').append(response.content); // Thêm nội dung mới
                    pagedEvent++; // Tăng số trang cho lần tiếp theo
                    jQuery('#load-more-event').text('Load More');
                }

                if (!response.has_more_posts) {
                    jQuery('#load-more-event').hide(); // Ẩn nút nếu không còn bài viết
                }
            },
            error: function() {
                jQuery('#load-more-event').text('Load More'); // Khôi phục nút nếu lỗi
            }
        });
    });


    jQuery(document).on('click', '.open-modal', function() {
        let title = jQuery(this).data('title');
        let modal = jQuery('#modalEventBooking');
        modal.find('.modal-event-title').text(title);
        modal.show(); // Show the modal
    });
});
</script>