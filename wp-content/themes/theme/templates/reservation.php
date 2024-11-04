<?php

/**
 * Template name: Reservation
 */
get_header();

?>
<div class="reservation">
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

    <section class="main-content">
        <div class="left-item">
            <figure data-aos="fade-right" data-aos-duration="1200">
                <img src="<?= get_field('form_background'); ?>" alt="">
            </figure>
        </div>
        <div class="right-item">
            <div class="form-content">
                <div class="top">
                    <h2 data-aos="fade-left" data-aos-duration="1000"><?= get_field('form_title'); ?></h2>
                    <p data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000">
                        <?= get_field('form_description'); ?></p>
                </div>
                <!-- <form action="" class="">
                        <div class="input-row">
                            <label>Number of Person(s)</label>
                            <input type="text" class="input-field" placeholder="Enter your number">
                        </div>
                        <div class="input-row">
                            <label>Name</label>
                            <input type="text" class="input-field" placeholder="Enter your name">
                        </div>
                        <div class="input-row">
                            <label>Date</label>
                            <select name="" class="input-field" id="">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="input-row">
                            <label>Date</label>
                            <select name="" class="input-field" id="">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="input-row w-full">
                            <label>Message</label>
                            <textarea type="text" class="input-field" rows="3" cols="10"
                                placeholder="Your message"></textarea>
                        </div>

                        <button class="confirm button-primary">
                            Make a reservation
                        </button>
                    </form> -->
                <?php
                echo do_shortcode('[contact-form-7 id="52baa61" title="Form Reservation"]');
                ?>
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