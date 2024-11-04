<?php
    get_header('detail');
    $id = get_the_ID();
?>
    <div class="event-detail">
        <section class="main-content">
            <div class="container">
                <div class="detail">
                    <div class="stick-left">
                        <div class="button-list">
                        <a href="<?= get_field('social_facebook', 'option')['link'] ?>" id="copy" class="">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/fb-detail.svg" alt="">
                                </figure>
                            </a>
                            <a href="mailto:<?= get_field('social_mail', 'option')['link'] ?>" class="">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/mail-detail.svg" alt="">
                                </figure>
                            </a>
                            <button id="copy" onclick="copytext('<?= get_permalink(get_the_ID()) ?>')" class="btn-copy">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/link-detail.svg" alt="">
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="right">
                        <h1><?= get_the_title(); ?></h1>

                        <div class="main">
                            <div class="context">
                                <p><?= get_field('content', $post->ID) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                
                <?php
                    $other_post = array(
                        'post_type'      => 'resources',
                        'posts_per_page' => 2,
                        'post__not_in'   => array(get_the_ID()),
                    );
                    $posts = get_posts($other_post);
                    if ($posts) :
                ?>
                    <div class="other">
                        <h2>Related Posts</h2>
                        <div class="grid-view">
                            <?php foreach ($posts as $item) : ?>
                                <div class="item-view">
                                    <div class="image">
                                        <a href="<?= get_the_permalink($item->ID) ?>">
                                            <figure>
                                                <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="context">
                                        <a href="<?= get_the_permalink($item->ID) ?>">
                                            <h2><?= $item->post_title; ?></h2>
                                        </a>
                                        <?php
                                            $description = get_field('content', $item->ID);
                                            $description = substr($description, strpos($description, "<p"), strpos($description, "</p>")+4);
                                        ?>
                                        <?= $description ?>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </section>

        <section class="cta" style="background: url(<?= get_field('location_background', 'option'); ?>)">
            <div class="context">
                <h2><?= get_field('location_title', 'option'); ?></h2>
                <p><?= get_field('location_sub', 'option'); ?></p>
                <a href="<?= get_field('location_link', 'option'); ?>" class="cta-button"><?= get_field('location_button', 'option'); ?></a>
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

<?php


get_footer();

?>