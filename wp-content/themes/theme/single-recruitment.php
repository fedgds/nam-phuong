<?php
get_header('detail');
$id = get_the_ID();

$experience = get_the_terms($id, 'recruitment_experience');
$form_work = get_the_terms($id, 'recruitment_form_of_work');

?>
<div class="career-detail">
    <section class="main-content">
        <div class="container">
            <div class="detail">
                <div class="stick-left">
                    <div class="button-list">
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
                    <h1><?= get_the_title(); ?></h1>
                    <div class="main-context">
                        <div class="main">
                            <div class="context">
                                <h2>Job Description</h2>
                                <ul>
                                    <?php foreach (get_field('career_description', $id) as $value) : ?>
                                    <li><?= $value['description'] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="context">
                                <h2>Information</h2>
                                <p><?= get_field('career_information', $id); ?></p>
                            </div>
                            <div class="context">
                                <h2>Responsibilities</h2>
                                <ul>
                                    <?php foreach (get_field('career_responsibilities', $id) as $value) : ?>
                                    <li><?= $value['responsibilities'] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="context">
                                <h2>We are looking for</h2>
                                <p><?= get_field('career_looking_for', $id); ?></p>
                            </div>
                        </div>
                        <div class="more">
                            <div class="more-info">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/hire-location.svg"
                                        alt="">
                                </figure>
                                <div class="more-context">
                                    <h3>Location</h3>
                                    <span><?= get_field('career_location', $id); ?></span>
                                </div>
                            </div>

                            <div class="more-info">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/two-round.svg"
                                        alt="">
                                </figure>
                                <div class="more-context">
                                    <h3>Number of people</h3>
                                    <span><?= get_field('career_number_of_people', $id); ?></span>
                                </div>
                            </div>

                            <div class="more-info">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/hand-watch.svg"
                                        alt="">
                                </figure>
                                <div class="more-context">
                                    <h3>Application deadline</h3>
                                    <span><?= get_field('career_application_deadline', $id); ?></span>
                                </div>
                            </div>

                            <div class="more-info">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/hire-form.svg"
                                        alt="">
                                </figure>
                                <div class="more-context">
                                    <h3>Form of work</h3>
                                    <span><?= $form_work[0]->name ?></span>
                                </div>
                            </div>

                            <div class="more-info">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/hire-level.svg"
                                        alt="">
                                </figure>
                                <div class="more-context">
                                    <h3>Level</h3>
                                    <span><?= get_field('career_level', $id); ?></span>
                                </div>
                            </div>

                            <div class="more-info">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/hire-experience.svg"
                                        alt="">
                                </figure>
                                <div class="more-context">
                                    <h3>Experience</h3>
                                    <span><?= $experience[0]->name ?></span>
                                </div>
                            </div>

                            <div class="more-info primary">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/hire-salary.svg"
                                        alt="">
                                </figure>
                                <div class="more-context">
                                    <h3>Salary</h3>
                                    <span><?= get_field('career_salary', $id); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <h2>More positions</h2>
                <?php
                $other_post = array(
                    'post_type'      => 'recruitment',
                    'posts_per_page' => 2,
                    'post__not_in'   => array(get_the_ID()),
                );
                $posts = get_posts($other_post);
                if ($posts) :
                ?>
                <div class="grid-view">
                    <?php foreach ($posts as $post) :
                            $post_form_work = get_the_terms($post->ID, 'recruitment_form_of_work');
                        ?>
                    <div class="hire-content">
                        <div class="top">
                            <h2><?= $post->post_title; ?></h2>
                            <div class="tag-wrap">
                                <div class="tag-info primary">
                                    <span><?= $post_form_work[0]->name ?></span>
                                </div>
                                <div class="tag-info">
                                    <figure>
                                        <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/hire-location.svg"
                                            alt="">
                                    </figure>
                                    <span><?= get_field('career_short_location', $post->ID); ?></span>
                                </div>
                                <div class="tag-info">
                                    <figure>
                                        <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/hire-salary.svg"
                                            alt="">
                                    </figure>
                                    <span><?= get_field('career_salary', $post->ID); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="middle">
                            <div class="infomation-row">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/two-round.svg"
                                        alt="">
                                </figure>
                                <div class="info">
                                    <h2>Number of people</h2>
                                    <span><?= get_field('career_number_of_people', $post->ID); ?></span>
                                </div>
                            </div>
                            <div class="infomation-row">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/assets/image/icon/hand-watch.svg"
                                        alt="">
                                </figure>
                                <div class="info">
                                    <h2>Application deadline</h2>
                                    <span><?= get_field('career_application_deadline', $post->ID); ?></span>
                                </div>
                            </div>
                        </div>

                        <a href="<?= get_the_permalink($post->ID) ?>" class="button-primary">
                            Detail
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <section class="cta" style="background: url(<?= get_field('location_background', 'option'); ?>)">
        <div class="context">
            <h2><?= get_field('location_title', 'option'); ?></h2>
            <p><?= get_field('location_sub', 'option'); ?></p>
            <a href="<?= get_field('location_link', 'option'); ?>"
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
<?php


get_footer();

?>