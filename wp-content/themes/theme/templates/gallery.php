<?php

/**
 * Template name: Gallery
 */
get_header();
// echo '<pre style="color: red;">';
// print_r(get_field('gallery_category'));
// echo '</pre>';
$gallery = get_field('gallery_category');
$image = [];
$title = [];
$description = [];
$all_images = [];
foreach ($gallery as $value) {
    $all_images = array_merge($all_images, $value['image']);
    foreach ($value['image'] as $img) {
        $image[]        = $img['image'];
        $title[]        = $img['title'];
        $description[]  = $img['description'];
    }
}
?>
<style>
.image-gallery,
.load-more {
    display: none;

}

.hidden {
    display: none !important;
}
</style>
<div class="gallery-page abc">
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
        <div class="gallery-tab">
            <div class="tab-item tab-gallery active" data-view="view-all" id="all-photos">
                All Photos
            </div>
            <?php foreach ($gallery as $key => $category) : ?>
            <div class="tab-item tab-gallery" data-view="view-<?= sanitize_title($category['category']) ?>">
                <?= $category['category'] ?>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- View all -->
        <div id="view-all" class="image-gallery" data-total="<?= count($all_images); ?>">
            <?php foreach (array_chunk(array_slice($all_images, 0, 12), 6) as $key => $images) : ?>
            <div class="row-1">
                <?php for ($i = 0; $i < 2; $i++) : ?>
                <?php if (isset($images[$i])) : ?>
                <div class="image-content">
                    <a href="<?= esc_url($images[$i]['image']); ?>" data-fancybox="gallery"
                        data-caption="<?= esc_html($images[$i]['title']); ?>">
                        <figure>
                            <img src="<?= esc_url($images[$i]['image']); ?>" alt="">
                        </figure>
                    </a>
                    <div class="caption">
                        <h2><?= esc_html($images[$i]['title']); ?></h2>
                        <p><?= esc_html($images[$i]['description']); ?></p>
                    </div>
                </div>
                <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="row-2">
                <?php for ($i = 2; $i < 6; $i++) : ?>
                <?php if (isset($images[$i])) : ?>
                <div class="image-content">
                    <a href="<?= esc_url($images[$i]['image']); ?>" data-fancybox="gallery"
                        data-caption="<?= esc_html($images[$i]['title']); ?>">
                        <figure>
                            <img src="<?= esc_url($images[$i]['image']); ?>" alt="">
                        </figure>
                    </a>
                    <div class="caption">
                        <h2><?= esc_html($images[$i]['title']); ?></h2>
                        <p><?= esc_html($images[$i]['description']); ?></p>
                    </div>
                </div>
                <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if (count($all_images) > 12) : ?>
        <button class="load-more button-primary" data-target="view-all" data-offset="12" id="load-more-all">Load
            More</button>
        <?php endif; ?>

        <!-- View Category -->
        <?php foreach ($gallery as $key => $category) : ?>
        <div id="view-<?= sanitize_title($category['category']) ?>" class="image-gallery"
            data-total="<?= count($category['image']); ?>" data-offset="0">
            <?php foreach (array_chunk(array_slice($category['image'], 0, 12), 6) as $images) : ?>
            <div class="row-1">
                <?php for ($i = 0; $i < 2; $i++) : ?>
                <?php if (isset($images[$i])) : ?>
                <div class="image-content">
                    <a href="<?= esc_url($images[$i]['image']); ?>" data-fancybox="gallery"
                        data-caption="<?= esc_html($images[$i]['title']); ?>">
                        <figure>
                            <img src="<?= esc_url($images[$i]['image']); ?>" alt="">
                        </figure>
                    </a>
                    <div class="caption">
                        <h2><?= esc_html($images[$i]['title']); ?></h2>
                        <p><?= esc_html($images[$i]['description']); ?></p>
                    </div>
                </div>
                <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="row-2">
                <?php for ($i = 2; $i < 6; $i++) : ?>
                <?php if (isset($images[$i])) : ?>
                <div class="image-content">
                    <a href="<?= esc_url($images[$i]['image']); ?>" data-fancybox="gallery"
                        data-caption="<?= esc_html($images[$i]['title']); ?>">
                        <figure>
                            <img src="<?= esc_url($images[$i]['image']); ?>" alt="">
                        </figure>
                    </a>
                    <div class="caption">
                        <h2><?= esc_html($images[$i]['title']); ?></h2>
                        <p><?= esc_html($images[$i]['description']); ?></p>
                    </div>
                </div>
                <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if (count($category['image']) > 12) : ?>
        <button class="load-more button-primary" data-target="view-<?= sanitize_title($category['category']) ?>"
            data-category="<?= $category['category'] ?>" data-offset="12">Load More</button>
        <?php endif; ?>
        <?php endforeach; ?>
    </section>

</div>
<section class="cta" style="background: url(<?= get_field('location_background', 'option'); ?>)">
    <div class="context" data-aos="zoom-in" data-aos-duration="1200">
        <h2 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
            <?= get_field('location_title', 'option'); ?></h2>
        <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000"><?= get_field('location_sub', 'option'); ?>
        </p>
        <a target="_blank" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000"
            href="<?= get_field('location_link', 'option'); ?>"
            class="cta-button"><?= get_field('location_button', 'option'); ?></a>
    </div>
</section>

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
        header.classListNaNpxove('scroll');
        headContainer.classListNaNpxove('scroll');
    }
});
</script>

<!-- galery tab item active -->
<script defer>
// Đảm bảo phần tử đầu tiên có class 'active' khi trang tải
document.querySelector('.gallery-tab .tab-item').classList.add('active');
document.querySelector('#view-all').classList.add('active'); // Activate the first view

// Xử lý khi người dùng nhấp vào các tab
document.querySelectorAll('.gallery-tab .tab-item').forEach(function(tab) {
    tab.addEventListener('click', function() {
        // Xóa lớp 'active' khỏi tất cả các tab
        document.querySelectorAll('.gallery-tab .tab-item').forEach(function(item) {
            item.classList.remove('active');
        });

        // Xóa lớp 'active' khỏi tất cả các image gallery
        document.querySelectorAll('.image-gallery').forEach(function(gallery) {
            gallery.classList.remove('active');
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


<!-- fancy-box -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
jQuery(document).ready(function($) {
    jQuery('[data-fancybox]').fancybox({
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

    // Hide all galleries except 'All Photos' by default
    jQuery('.image-gallery').hide();
    jQuery('#view-all').show();

    jQuery('.load-more').hide();
    jQuery('#load-more-all').show();

    // Handle tab click events
    jQuery('.tab-item').on('click', function() {
        jQuery('.load-more').hide();
        // Remove 'active' class from all tabs and add it to the clicked one
        jQuery('.tab-item').removeClass('active');
        jQuery(this).addClass('active');
        let targetView = jQuery(this).data('view');

        // Get the view ID from the data-view attribute of the clicked tab
        let viewId = jQuery(this).data('view');


        // Hide all galleries and load-more buttons
        jQuery('.image-gallery').hide();
        jQuery(`#${targetView}`).show();

        // Show the selected gallery
        jQuery(`#${viewId}`).show();

        // Check if the selected gallery has a matching load-more button and show it
        let loadMoreBtn = jQuery(`button[data-target="${viewId}"]`);
        if (loadMoreBtn.length) {
            loadMoreBtn.show();
        }
    });

    jQuery('#load-more-all').on('click', function($) {
        const button = jQuery(this);
        let offset = parseInt(button.data('offset'));
        let id = 'view-all';

        jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'load_more_images',
                offset: offset,
            },
            beforeSend: function() {
                button.text('Loading...');
            },
            success: function(response) {
                if (response) {
                    jQuery(`#${id}`).append(response);
                    button.data('offset', offset + 12);

                    const totalImages = jQuery(`#${id}`).data('total');
                    if (offset + 12 >= totalImages) {
                        button.addClass('hidden');
                    }
                } else {
                    button.addClass('hidden');
                }
                button.text('Load More');
            },
        });
    })

    // // Load More functionality for both 'All Photos' and category views
    // jQuery('button.load-more').on('click', function () {
    //     let button = jQuery(this);
    //     let category = button.data('category');
    //     let target = button.data('target');
    //     let offset = parseInt(button.data('offset'));
    //     let total = parseInt(jQuery(`#${target}`).data('total'));

    //     // Prevent unnecessary calls if no more images
    //     if (category) {
    //         return;
    //     }

    //     // AJAX request to load more images (adjust the URL accordingly)
    //     jQuery.ajax({
    //         url: '<?php echo admin_url('admin-ajax.php'); ?>',
    //         type: 'POST',
    //         data: {
    //             action: 'load_more_images_by_category',
    //             offset: offset,
    //             target: target
    //         },
    //         beforeSend: function () {
    //             button.text('Loading...');
    //         },
    //         success: function (response) {
    //             // Append new images to the correct gallery
    //             jQuery(`#${target}`).append(response);

    //             // Update offset for next batch
    //             offset += 12;
    //             button.data('offset', offset);

    //             // Hide button if all images are loaded
    //             if (offset >= total) {
    //                 button.hide();
    //             }
    //         },
    //         error: function () {
    //             console.error('Failed to load more images.');
    //         }
    //     });
    // });

    jQuery(document).on('click', 'button[data-category]', function() {
        let button = jQuery(this);
        let category = button.data('category'); // Lấy slug của category từ nút nhấn

        if (button.attr('id') === 'load-more-all') {
            console.log('Load More All button clicked');
        } else {
            if (!category) {
                button.hide();
                return;
            }
        }

        let offset = parseInt(button.data('offset')) || 0;
        let targetId = button.data('target') || 'view-all'; // Lấy ID container

        jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                offset: offset,
                category: category,
                action: 'load_more_images_by_category',
            },
            beforeSend: function() {
                button.text('Loading...');
            },
            success: function(response) {
                if (response) {
                    jQuery(`#${targetId}`).append(response);
                    button.data('offset', offset + 12);

                    let totalImages = jQuery(`#${targetId}`).data('total');
                    if (offset + 12 >= totalImages) {
                        button.hide()
                    }
                } else {
                    button.addClass('hidden');
                }
                button.addClass('hidden');
            },
        });
    });
});
</script>
<?php

get_footer();
?>