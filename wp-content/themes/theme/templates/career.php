<?php

/**
 * Template name: Career
 */
get_header();

$position   = get_terms(['taxonomy' => 'recruitment_position']);
$experience = get_terms(['taxonomy' => 'recruitment_experience']);
$form_work = get_terms(['taxonomy' => 'recruitment_form_of_work']);

?>
<div class="career">
    <div class="relative">
        <div class="banner" style="background: url(<?= get_field('banner_image'); ?>)">
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
        </div>
        <div class="filter">
            <div class="wrap">
                <form action="" id="job-search-form">
                    <div data-aos="fade-right" data-aos-duration="800" data-aos-offset="0" class="filter-content w-33">
                        <select class="input-trans" name="position">
                            <option value="">Position</option>
                            <?php if ($position) {
                                foreach ($position as $position) { ?>
                            <option value="<?= $position->slug ?>"><?= $position->name ?></option>
                            <?php }
                            } ?>
                        </select>
                        <input type="text" class="input-trans" value="" name="position" placeholder="Select position"
                            disabled>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="800" data-aos-offset="0" class="filter-content w-33">
                        <select class="input-trans" name="experience">
                            <option value="">Experience</option>
                            <?php if ($experience) {
                                foreach ($experience as $experience) { ?>
                            <option value="<?= $experience->slug ?>"><?= $experience->name ?></option>
                            <?php }
                            } ?>
                        </select>
                        <input type="text" class="input-trans" value="" name="experience"
                            placeholder="Select experience" disabled>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="800" data-aos-offset="0" class="filter-content w-33">
                        <select class="input-trans" name="form_work">
                            <option value="">Form of Work</option>
                            <?php if ($form_work) {
                                foreach ($form_work as $form_work) { ?>
                            <option value="<?= $form_work->slug ?>"><?= $form_work->name ?></option>
                            <?php }
                            } ?>
                        </select>
                        <input type="text" class="input-trans" value="" name="form_work"
                            placeholder="Select form of work" disabled>
                    </div>
                    <button type="submit" class="confirm button-primary">Search
                        <figure>
                            <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/arrow-right.svg"
                                alt="">
                        </figure>
                    </button>
                </form>
                <figure>
                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-filter-icon.svg"
                        class="illus-left" data-aos="fade-right" data-aos-duration="1200" alt="illus">
                </figure>
                <figure>
                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/home-filter-icon.svg"
                        class="illus-right" data-aos="fade-left" data-aos-duration="1200" alt="illus">
                </figure>
            </div>

        </div>
    </div>
    <section class="main-content">
        <div class="container">
            <div class="top-content">
                <h1 data-aos="fade-up" data-aos-duration="1000" class=""><?= get_field('hiring_title'); ?></h1>
                <span data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="1000"><?= get_field('hiring_sub_title'); ?></span>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <?= get_field('hiring_description'); ?></p>
            </div>
            <div class="bottom-content">
                <?php
                $args = array(
                    'post_type' => 'recruitment',
                    'posts_per_page' => -1,
                );
                $career = get_posts($args);
                ?>
                <?php if ($career) : ?>
                <?php foreach ($career as $key => $post) :
                        $post_form_work = get_the_terms($post->ID, 'recruitment_form_of_work');
                        if ($key == 0) {
                            $dataAos = 'data-aos="fade-up" data-aos-duration="800" data-aos-delay="100"';
                        } elseif ($key == 1) {
                            $dataAos = 'data-aos="fade-up" data-aos-duration="800" data-aos-delay="200"';
                        } elseif ($key == 2) {
                            $dataAos = 'data-aos="fade-up" data-aos-duration="800" data-aos-delay="300"';
                        } elseif ($key == 3) {
                            $dataAos = 'data-aos="fade-up" data-aos-duration="800" data-aos-delay="400"';
                        } elseif ($key == 4) {
                            $dataAos = 'data-aos="fade-up" data-aos-duration="800" data-aos-delay="500"';
                        } else {
                            $dataAos = 'data-aos="fade-up" data-aos-duration="800" data-aos-delay="600"';
                        }
                    ?>
                <div class="hire-content" <?= $dataAos ?>>
                    <div class="top">
                        <a href="<?= get_the_permalink($post->ID) ?>">
                            <h2><?= $post->post_title ?></h2>
                        </a>
                        <div class="tag-wrap">
                            <div class="tag-info primary">
                                <span><?= $post_form_work[0]->name ?></span>
                            </div>
                            <div class="tag-info">
                                <figure>
                                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/hire-location.svg"
                                        alt="">
                                </figure>
                                <span><?= get_field('career_short_location', $post->ID); ?></span>
                            </div>
                            <div class="tag-info">
                                <figure>
                                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/hire-salary.svg"
                                        alt="">
                                </figure>
                                <span><?= get_field('career_salary', $post->ID); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="infomation-row">
                            <figure>
                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/two-round.svg"
                                    alt="">
                            </figure>
                            <div class="info">
                                <h2>Number of people</h2>
                                <span><?= get_field('career_number_of_people', $post->ID); ?></span>
                            </div>
                        </div>
                        <div class="infomation-row">
                            <figure>
                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/hand-watch.svg"
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

<script>
jQuery(document).ready(function() {
    jQuery('select[name="position"]').on('change', function() {
        let position = jQuery(this).find('option:selected').text();
        if (position) {
            jQuery(this).parent().find('p').text(position);
            jQuery('input[name="position"]').val(position);
        }
        jQuery(this).val('');
    });
    jQuery('select[name="experience"]').on('change', function() {
        let experience = jQuery(this).find('option:selected').text();
        if (experience) {
            jQuery(this).parent().find('p').text(experience);
            jQuery('input[name="experience"]').val(experience);
        }
        jQuery(this).val('');
    });
    jQuery('select[name="form_work"]').on('change', function() {
        let form_work = jQuery(this).find('option:selected').text();
        if (form_work) {
            jQuery(this).parent().find('p').text(form_work);
            jQuery('input[name="form_work"]').val(form_work);
        }
        jQuery(this).val('');
    });
})
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

<!-- .tab-item script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabContainer = document.querySelector('.tab-container');
    const tabItems = document.querySelectorAll('.tab-item');
    const tabViews = document.querySelectorAll('.tab-view');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    let currentIndex = 0; // Chỉ số tab hiện tại
    let isDown = false;
    let startX;
    let scrollLeft;

    // Thiết lập mục đầu tiên là active khi load page
    if (tabItems.length > 0) {
        tabItems[0].classList.add('active'); // Phần tử đầu tiên được active
        if (tabViews.length > 0) {
            tabViews[0].classList.add('active'); // Hiển thị nội dung tab đầu tiên
        }
    }

    // Hàm thiết lập tab active và nội dung tương ứng
    function setActiveTab(index) {
        // Xóa class 'active' khỏi tất cả các tab và nội dung
        tabItems.forEach((item, i) => {
            item.classList.remove('active');
            if (tabViews[i]) {
                tabViews[i].classList.remove('active'); // Ẩn tất cả nội dung
            }
        });

        // Thêm class 'active' cho mục được click
        tabItems[index].classList.add('active');
        if (tabViews[index]) {
            tabViews[index].classList.add('active'); // Hiển thị nội dung tab hiện tại
        }

        currentIndex = index; // Cập nhật chỉ số hiện tại
    }

    // Thêm sự kiện cho mỗi tab item
    tabItems.forEach((item, index) => {
        item.addEventListener('click', function() {
            if (!isDown) { // Chỉ click nếu không đang kéo
                setActiveTab(index);
            }
        });
    });

    // Xử lý sự kiện cho nút Prev
    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            setActiveTab(currentIndex - 1); // Di chuyển đến tab trước
        }
    });

    // Xử lý sự kiện cho nút Next
    nextButton.addEventListener('click', () => {
        if (currentIndex < tabItems.length - 1) {
            setActiveTab(currentIndex + 1); // Di chuyển đến tab tiếp theo
        }
    });

    // Bắt đầu sự kiện kéo
    tabContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        startX = e.pageX - tabContainer.offsetLeft;
        scrollLeft = tabContainer.scrollLeft;
    });

    // Kết thúc sự kiện kéo
    document.addEventListener('mouseup', () => {
        isDown = false;
    });

    // Thực hiện kéo
    tabContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return; // Không kéo nếu không nhấn chuột
        e.preventDefault();
        const x = e.pageX - tabContainer.offsetLeft;
        const walk = (x - startX) * 2; // Tốc độ kéo
        tabContainer.scrollLeft = scrollLeft - walk;
    });
});
</script>

<script>
jQuery('#job-search-form').on('submit', function(e) {
    e.preventDefault(); // Prevent page reload

    // Get form data values
    let position = jQuery('input[name="position"]').val();
    let experience = jQuery('input[name="experience"]').val();
    let form_work = jQuery('input[name="form_work"]').val();

    // Build data object to send with AJAX
    let data = {
        action: 'job_search', // Required action parameter for WordPress AJAX
        position: position,
        experience: experience,
        form_work: form_work
    };

    jQuery.ajax({
        url: '<?php echo admin_url("admin-ajax.php"); ?>',
        type: 'GET',
        data: data, // Pass data object here
        beforeSend: function() {
            jQuery('.bottom-content').html('<p>Loading...</p>');
        },
        success: function(response) {
            jQuery('.bottom-content').html(response);
        },
        error: function() {
            jQuery('.bottom-content').html('<p>An error occurred. Please try again.</p>');
        }
    });
});
</script>

<?php

get_footer();
?>