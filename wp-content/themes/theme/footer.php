    <footer>
        <?php
        $float_chef = get_field('float_chef', 'option');
        $float_phone = get_field('float_phone', 'option');
        $float_mess = get_field('float_mess', 'option');
        ?>

        <div class="floating-button">
            <a href="<?= home_url() ?>/menu" class="fl-button">
                <figure><img src="<?= $float_chef['icon'] ?>" alt="abc">
                </figure>
            </a>
            <a href="tel:<?= $float_phone['link'] ?>" class="fl-button">
                <figure><img src="<?= $float_phone['icon'] ?>" alt="abc">
                </figure>
            </a>
            <a href="<?= $float_mess['link'] ?>" class="fl-button">
                <figure><img src="<?= $float_mess['icon'] ?>" alt="abc">
                </figure>
            </a>
        </div>
        <div class="footer">
            <div class="top">
                <div class="container">
                    <a href="/" class="logo">
                        <figure>
                            <img src="<?= get_field('footer_logo', 'option') ?>" class="" alt="footer">
                        </figure>
                    </a>
                    <div class="col-1">
                        <h2>OVERVIEW</h2>
                        <ul>
                            <?php if (get_field('footer_overview', 'option')) : ?>
                            <?php foreach (get_field('footer_overview', 'option') as $item) : ?>
                            <li>
                                <a href="<?= $item['link'] ?>" class=""><?= $item['title'] ?></a>
                            </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-2">
                        <h2>Quick Links</h2>
                        <ul>
                            <?php if (get_field('footer_resources', 'option')) : ?>
                            <?php foreach (get_field('footer_resources', 'option') as $item) : ?>
                            <li>
                                <a target="_blank" href="<?= $item['link']['url'] ?>" class=""><?= $item['title'] ?></a>
                            </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h2>CONTACT INFO</h2>
                        <div class="contact">
                            <?php if (get_field('footer_contact_info', 'option')) : ?>
                            <?php foreach (get_field('footer_contact_info', 'option') as $item) : ?>
                            <a target="_blank" href="<?= $item['link'] ?>" class="contact-row">
                                <figure><img src="<?= $item['icon'] ?>" alt=""></figure>
                                <p>
                                    <?= $item['text'] ?>
                                </p>
                            </a>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="container">
                    <!-- <a href="#" class="copyright">
                        <?= get_field('footer_copyright', 'option') ?>
                    </a> -->
                    <p class="copyright">
                        Copyright @2024 Nam Phuong at Jimmy Carter Restaurant | Designed by <a target="_blank"
                            href="https://qixtech.com/">Qixtech - Web
                            Design &
                            Digital Marketing</a>
                    </p>
                    <div class="social-container">
                        <a target="_blank" href="<?= get_field('social_facebook', 'option')['link'] ?>" target="_blank">
                            <figure>
                                <img src="<?= get_field('social_facebook', 'option')['icon'] ?>" alt="">
                            </figure>
                        </a>
                        <a target="_blank" href="mailto:<?= get_field('social_mail', 'option')['link'] ?>">
                            <figure>
                                <img src="<?= get_field('social_mail', 'option')['icon'] ?>" alt="">
                            </figure>
                        </a>
                        <a target="_blank" href="tel:<?= get_field('social_phone', 'option')['phone_number'] ?>">
                            <figure>
                                <img src="<?= get_field('social_phone', 'option')['icon'] ?>" alt="">
                            </figure>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php
    wp_footer();
    ?>
    <script>
jQuery(document).ready(function($) {
    currentDate = new Date();
    currentTime = new Date($.now());
    time = currentTime.getHours() + ":" + currentTime.getMinutes();

    jQuery("#date-choose").datepicker({
        minDate: currentDate,
    });
    jQuery("#time-choose").timepicker({
        minTime: '8',
        maxTime: '10:00pm',
    });
    jQuery("#date-choose2").datepicker({
        minDate: currentDate,
    });
    jQuery("#time-choose2").timepicker({
        minTime: '8',
        maxTime: '10:00pm',
    });
});
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/aos.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/wow.min.js"></script>
    <script>
AOS.init();
new WOW().init();
    </script>
    </body>

    </html>