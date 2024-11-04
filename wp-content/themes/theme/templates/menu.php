<?php

/**
 * Template name: Menu
 */
get_header();

$terms = get_terms(array(
    'taxonomy'   => 'menu_category',
));
?>
<div class="menu">
    <section class="banner" data-aos="fade-down" data-aos-duration="1000"
        style="background: url(<?= get_field('banner_image'); ?>)">
        <div class="content">
            <h1><?= get_field('banner_title') ?></h1>
            <div class="breadcrumb" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <a href="<?= home_url(); ?>">Home</a>
                <figure>
                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/chevron-right-w.svg"
                        alt="abc">
                </figure>
                <span><?= get_field('banner_title') ?></span>
            </div>
        </div>
    </section>
    <section class="main-content">
        <div class="tab-wrapper">
            <div class="container">
                <button class="prev">
                    <figure>
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.01192 4.43056C9.32641 4.16099 9.79989 4.19741 10.0695 4.5119L16.0695 11.5119C16.3102 11.7928 16.3102 12.2072 16.0695 12.4881L10.0695 19.4881C9.79989 19.8026 9.32641 19.839 9.01192 19.5694C8.69743 19.2999 8.661 18.8264 8.93057 18.5119L14.5122 12L8.93057 5.48809C8.661 5.1736 8.69743 4.70012 9.01192 4.43056Z"
                                fill="#6B7280" />
                        </svg>

                    </figure>
                </button>
                <div class="tab-container scrollable">
                    <?php if ($terms) : ?>
                        <?php foreach ($terms as $key => $term) : ?>
                            <div class="tab-item" data-tab="view-<?= $key ?>">
                                <span>
                                    <?= $term->name ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <button class="next">
                    <figure>
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.01192 4.43056C9.32641 4.16099 9.79989 4.19741 10.0695 4.5119L16.0695 11.5119C16.3102 11.7928 16.3102 12.2072 16.0695 12.4881L10.0695 19.4881C9.79989 19.8026 9.32641 19.839 9.01192 19.5694C8.69743 19.2999 8.661 18.8264 8.93057 18.5119L14.5122 12L8.93057 5.48809C8.661 5.1736 8.69743 4.70012 9.01192 4.43056Z"
                                fill="#6B7280" />
                        </svg>
                    </figure>
                </button>
            </div>
        </div>

        <?php foreach ($terms as $keys => $term) : ?>
            <div id="view-<?= $keys ?>" class="tab-view">
                <div class="container">
                    <h2 data-aos="fade-up" data-aos-duration="1000">
                        <?= $term->name ?>
                    </h2>
                    <div class="grid-view">
                        <?php
                        $args = array(
                            'post_type' => 'menu',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'menu_category',
                                    'field'    => 'slug',
                                    'terms'    => $term->slug,
                                )
                            )
                        );
                        $cuisine = get_posts($args);
                        ?>
                        <?php if ($cuisine) : ?>
                            <?php foreach ($cuisine as $key => $item) : ?>
                                <div class="item" data-aos="zoom-in" data-aos-duration="1000"
                                    data-aos-delay="calc(100 * var(--index))">
                                    <div class="image">
                                        <figure>
                                            <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" class="" alt="product"
                                                style="height: 400px;">
                                        </figure>
                                    </div>
                                    <div class="context" data-aos="zoom-in" data-aos-duration="1200">
                                        <h2><?= $item->post_title ?></h2>
                                        <p><?= get_field('description', $item->ID) ?></p>
                                        <span>$<?= get_field('price', $item->ID) ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- <div id="view-2" class="tab-view">
                <div class="container">
                    123
                </div>
            </div> -->
    </section>

    <section class="cta" style="background: url(<?= get_field('location_background', 'option'); ?>)">
        <div class="context">
            <h2 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <?= get_field('location_title', 'option'); ?></h2>
            <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <?= get_field('location_sub', 'option'); ?></p>
            <a target="_blank" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000"
                href="<?= get_field('location_link', 'option'); ?>"
                class="cta-button hover-second"><?= get_field('location_button', 'option'); ?></a>
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

            // Cuộn đến phần tử tab được chọn
            tabItems[index].scrollIntoView({
                behavior: 'smooth', // Cuộn mượt
                block: 'nearest', // Căn chỉnh phần tử gần nhất trong vùng nhìn thấy
                inline: 'center' // Cuộn ngang để tab nằm giữa container
            });
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

<?php

get_footer();
?>