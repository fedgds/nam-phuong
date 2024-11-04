<?php

/**
 * Template name: Contact
 */
get_header();

?>
<div class="contact">
    <section class="banner" style="background: url(<?= get_field('banner_image'); ?>)">
        <div class="content">
            <h1><?= get_field('banner_title'); ?></h1>
            <div class="breadcrumb">
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
                <h2><?= get_field('contact_title'); ?></h2>
                <span><?= get_field('contact_sub_title'); ?></span>
                <p><?= get_field('contact_description'); ?></p>
            </div>
            <?php
            echo do_shortcode('[contact-form-7 id="bf220a1" title="Form Contact"]');
            ?>
            <figure data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="300">
                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/contact-bg.svg" alt="">
            </figure>
        </div>
    </section>

    <section class="maps">
        <div class="container">
            <div class="info">
                <div class="title">
                    <h2 data-aos="fade-right" data-aos-duration="1000"><?= get_field('map_title'); ?></h2>
                    <span data-aos="fade-right" data-aos-delay="100"
                        data-aos-duration="1000"><?= get_field('map_sub_title'); ?></span>
                </div>
                <div class="bottom">
                    <div class="col" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <p><?= get_field('map_address'); ?></p>
                        <p>Call: <a href="tel:<?= get_field('map_tel'); ?>"><?= get_field('map_tel'); ?></a></p>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                        <h3>OPEN HOUR</h3>
                        <p>
                            <?= get_field('map_open_info'); ?> <br><?= get_field('map_open_time'); ?>
                        </p>
                    </div>
                    <div class="social" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                        <?php if (get_field('sharing')) : ?>
                        <?php foreach (get_field('sharing') as $sharing) : ?>
                        <a href="<?= $sharing['link']; ?>">
                            <figure>
                                <img src="<?= $sharing['icon']; ?>" alt="">
                            </figure>
                        </a>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <figure class="contact-illus" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/contact-illus.svg" alt="">
                </figure>
            </div>
            <div class="map-wrapper" data-aos="zoom-in" data-aos-duration="1200">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d105950.04245452592!2d-84.27596228771941!3d33.916973966158764!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f5a6bf0f354d07%3A0x6114e8a36ef8f59d!2sNam%20Phuong%20-%20Jimmy%20Carter!5e0!3m2!1sen!2s!4v1729162116901!5m2!1sen!2s"
                    width="954" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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