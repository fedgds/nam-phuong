<?php
get_header('detail');
$id = get_the_ID();
$event_args = array(
    'post_type' => 'event',
    'posts_per_page' => -1,
);
$event = get_posts($event_args);
?>
<div class="event-detail">
    <section class="main-content">
        <div class="container">
            <div class="detail">
                <div class="stick-left">
                    <div class="button-list" data-aos="fade-right" data-aos-duration="800">
                        <a href="<?= get_field('social_facebook', 'option')['link'] ?>" id="copy" class="">
                            <figure>
                                <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/fb-detail.svg"
                                    alt="">
                            </figure>
                        </a>
                        <a href="mailto:<?= get_field('social_mail', 'option')['link'] ?>" class="">
                            <figure>
                                <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/mail-detail.svg"
                                    alt="">
                            </figure>
                        </a>
                        <button id="copy" onclick="copytext('<?= get_permalink(get_the_ID()) ?>')" class="btn-copy">
                            <figure>
                                <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/link-detail.svg"
                                    alt="">
                            </figure>
                        </button>
                    </div>
                </div>
                <div class="right">
                    <h1 data-aos="fade-up" data-aos-duration="1000"><?= get_the_title(); ?></h1>

                    <div class="main">
                        <div class="top">
                            <h2 data-aos="fade-up" data-aos-duration="1000">Date and time</h2>
                            <div class="col" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                                <div class="item">
                                    <figure>
                                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Calendar.svg"
                                            class="" alt="">
                                    </figure>
                                    <?php
                                    $date = get_field('event_date', $post->ID);
                                    $date = DateTime::createFromFormat('m/d/Y', $date);

                                    ?>
                                    <span><?= $date->format('m.d.Y'); ?></span>
                                </div>
                                <div class="item">
                                    <figure>
                                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Clock-circle.svg"
                                            class="" alt="">
                                    </figure>
                                    <span><?= get_field('event_time_start', $post->ID); ?> to
                                        <?= get_field('event_time_end', $post->ID); ?></span>
                                </div>
                            </div>
                            <button data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000"
                                class="button-primary open-modal" data-modal="modalEventBooking">
                                <?= get_field('event_button', $post->ID); ?>
                            </button>
                        </div>
                        <div class="context" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                            <h2>Event description</h2>

                            <?= get_field('event_description', $post->ID) ?>
                        </div>
                        <?php
                        $tags = get_the_terms($id, 'event_tag');
                        ?>
                        <?php if ($tags) : ?>
                            <div class="tag">
                                <h2 data-aos="fade-up" data-aos-duration="1000">Tags</h2>
                                <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" class="tag-wrap">
                                    <?php foreach ($tags as $tag) : ?>
                                        <button class="tag-item">
                                            <?= $tag->name ?>
                                        </button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="modalEventBooking" class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-head">
                        <h2>Event Booking</h2>
                        <span>Prosperity Dining 11/11</span>
                        <button class="close-modal">
                            <figure>
                                <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/close.svg" alt="">
                            </figure>
                        </button>
                    </div>
                    <div class="modal-content">
                        <div class="event-form">
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
                                </div> -->

                            <!-- <button class="confirm button-primary">
                                    Send request
                                </button> -->
                            <?php
                            echo do_shortcode('[contact-form-7 id="82b8c04" title="Form Book Event"]');
                            ?>
                        </div>
                    </div>

                    <div class="illus-modal">
                        <figure class="">
                            <img src="<?= get_template_directory_uri() ?>/dist/assets/image/modal-illus.svg" alt="">
                        </figure>
                    </div>
                </div>
            </div>
            <hr>

            <?php
            $other_post = array(
                'post_type'      => 'event',
                'posts_per_page' => 2,
                'post__not_in'   => array(get_the_ID()),
            );
            $posts = get_posts($other_post);
            if ($posts) :
            ?>
                <div class="other">
                    <h2 data-aos="fade-up" data-aos-duration="1000">Other events you may like</h2>
                    <div class="grid-view">
                        <?php foreach ($posts as $key => $item) :
                            if ($key / 2 == 0) {
                                $aos = 'fade-right';
                            } else {
                                $aos = 'fade-left';
                            }
                        ?>
                            <div class="item-view" data-aos="<?= $aos ?>" data-aos-duration="1000" data-aos-delay="200">
                                <div class="image">
                                    <a href="<?= get_the_permalink($post->ID) ?>">
                                        <figure>
                                            <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" alt="">
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
                                        <div class="item">
                                            <figure>
                                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Calendar.svg"
                                                    class="" alt="">
                                            </figure>
                                            <?php
                                            $date = get_field('event_date', $item->ID);
                                            $date = DateTime::createFromFormat('m/d/Y', $date);

                                            ?>
                                            <span><?= $date->format('m.d.Y'); ?></span>
                                        </div>
                                        <div class="item">
                                            <figure>
                                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Clock-circle.svg"
                                                    class="" alt="">
                                            </figure>
                                            <span><?= get_field('event_time_start', $item->ID); ?> to
                                                <?= get_field('event_time_end', $post->ID); ?></span>
                                        </div>
                                    </div>
                                    <?php
                                    $description = get_field('event_description', $item->ID);
                                    $description = substr($description, strpos($description, "<p"), strpos($description, "</p>") + 4);
                                    ?>
                                    <p><?= $description ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="cta" style="background: url(<?= get_field('location_background', 'option'); ?>)">
        <div class="context" data-aos="zoom-in" data-aos-duration="1200">
            <h2 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <?= get_field('location_title', 'option'); ?></h2>
            <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <?= get_field('location_sub', 'option'); ?></p>
            <a data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000"
                href="<?= get_field('location_link', 'option'); ?>"
                class="cta-button"><?= get_field('location_button', 'option'); ?></a>
        </div>
    </section>
</div>

<script>
    function copytext(text) {
        var textField = document.createElement('textarea');
        console.log(textField);
        textField.innerText = text;
        document.body.appendChild(textField);
        textField.select();
        textField.focus(); //SET FOCUS on the TEXTFIELD
        document.execCommand('copy');
        textField.remove();
        showCopiedAlert(document.getElementById('copy'));
        // ajax-error.focus(); //SET FOCUS BACK to MODAL
        const modal = document.getElementById('ajax-error');
        if (modal) {
            modal.focus();
        }
    }

    function showCopiedAlert(buttonElement) {
        const rect = buttonElement.getBoundingClientRect();

        // Create an alert div
        var alertDiv = document.createElement('div');
        alertDiv.textContent = 'Đã sao chép';
        alertDiv.style.position = 'absolute';
        alertDiv.style.top = rect.top + window.scrollY + 65 + 'px';
        alertDiv.style.left = rect.left + window.scrollX + 65 + 'px';
        alertDiv.style.transform = 'translate(-50%, -50%)';
        alertDiv.style.backgroundColor = '#333';
        alertDiv.style.color = '#fff';
        alertDiv.style.fontSize = '13px';
        alertDiv.style.padding = '10px 20px';
        alertDiv.style.borderRadius = '5px';
        alertDiv.style.zIndex = '1000';
        alertDiv.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';

        // Append the alert to the body
        document.body.appendChild(alertDiv);

        // Remove the alert after 1 seconds
        setTimeout(function() {
            alertDiv.remove();
        }, 1000);
    }
</script>

<!-- modal script -->
<script defer src="<?= get_template_directory_uri(); ?>/dist/assets/js/modal.js"></script>


<?php

get_footer();

?>