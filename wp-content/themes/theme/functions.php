<?php
/**
 * theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme
 */
date_default_timezone_set('Asia/Ho_Chi_Minh');
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on theme, use a find and replace
		* to change 'theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
add_filter('show_admin_bar', '__return_false');
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(
        'page_title' => 'Cấu hình chung',
        'menu_title' => 'Cấu hình chung',
        'icon_url' => 'dashicons-image-filter',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Tổng quan',
        'menu_title' => 'Tổng quan',
        'parent_slug' => $parent['menu_slug'],
    ));
}
function enqueue_scripts_and_styles() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue Slick Slider
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1');
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_and_styles');

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '6.6.2') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action('admin_head', 'fix_svg');

function getIdPage($name){
    // Lấy dữ liệu data
    $pages_data = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'templates/'.$name.'.php'
    ));
    if ($pages_data) {
        $id_dv = $pages_data[0]->ID;
        return $id_dv;
    } else {
        return 0;
    }
}

add_filter('date_i18n', function ($date, $format, $timestamp, $gmt) { return wp_date($format, $timestamp); }, 99, 4);

// Short code địa chỉ
function shortCodeNumberGuest() {
    $guest = '<select id="number-guest" class="input-trans num-guest">
						<option value="">Number of Guests</option>';
	for ($i=0;$i<100;$i++) {
		$guest .= '<option value="'. $i .'">'. $i .'</option>';
	}
    $guest .= '</select>';
    return $guest;
}
add_shortcode('short_code_number_guest', 'shortCodeNumberGuest');
// Thực thi short code trong contact form 7
add_filter('wpcf7_form_elements', 'using_shortcode_in_cf7');
function using_shortcode_in_cf7($form)
{
    $form = do_shortcode($form);
    return $form;
}

function job_search_callback() {
    // Retrieve parameters from AJAX request
    $position = isset($_GET['position']) ? sanitize_text_field($_GET['position']) : '';
    $experience = isset($_GET['experience']) ? sanitize_text_field($_GET['experience']) : '';
    $form_work = isset($_GET['form_work']) ? sanitize_text_field($_GET['form_work']) : '';

    // Build meta query based on received parameters
    $tax_query = ['relation' => 'AND'];

    // if ($position) {
    //     $tax_query[] = [
    //         'taxonomy' => 'recruitment_position', // Adjust to your taxonomy name
    //         'field'    => 'slug', // Can also be 'term_id' if passing IDs
    //         'terms'    => $position,
    //     ];
    // }

    if ($experience) {
        $tax_query[] = [
            'taxonomy' => 'recruitment_experience', // Adjust to your taxonomy name
            'field'    => 'slug',
            'terms'    => $experience,
        ];
    }

    if ($form_work) {
        $tax_query[] = [
            'taxonomy' => 'recruitment_form_of_work', // Adjust to your taxonomy name
            'field'    => 'slug',
            'terms'    => $form_work,
        ];
    }
	
    // Query posts
    $args = [
        'post_type'      => 'recruitment',
        'posts_per_page' => -1,
		's'              => $position,
        'tax_query'     => $tax_query,
    ];
    $career = get_posts($args);

    // Output the results
    if ($career) {
        foreach ($career as $post) {
			$post_form_work = get_the_terms($post->ID, 'recruitment_form_of_work');
            ?>
            <div class="hire-content">
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
                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/hire-location.svg" alt="">
                            </figure>
                            <span><?= get_field('career_short_location', $post->ID); ?></span>
                        </div>
                        <div class="tag-info">
                            <figure>
                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/hire-salary.svg" alt="">
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
                <a href="<?= get_the_permalink($post->ID) ?>" class="button-primary">Detail</a>
            </div>
            <?php
        }
    } else {
        echo '<p>No results found.</p>';
    }

    wp_die(); // Required to terminate and return a proper response
}
add_action('wp_ajax_job_search', 'job_search_callback');
add_action('wp_ajax_nopriv_job_search', 'job_search_callback');


add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts() {
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $post_type = isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : 'post';
    $post_not_in = isset($_POST['post__not_in']) ? array_map('intval', $_POST['post__not_in']) : array();
    $posts_per_page = 4;

    $query = array(
        'post_type'       => $post_type,
        'posts_per_page'  => $posts_per_page,
        'paged'           => $paged,
        'post__not_in'    => $post_not_in,
    );

    $posts = get_posts($query);
    $content = ''; // Khởi tạo biến content
    $has_more_posts = false; // Giả định không còn bài viết nào

    if ($posts) {
        foreach ($posts as $item) {
            ob_start(); // Bắt đầu lấy nội dung HTML
            
            if ($item->post_type == 'promotion') : ?>
                <div class="item-view">
                    <div class="image">
                        <figure>
                            <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" alt="">
                        </figure>
                    </div>
                    <div class="context">
                        <span><?= ucfirst($item->post_type); ?></span>
                        <a href="<?= get_the_permalink($item->ID); ?>">
                            <h2><?= $item->post_title; ?></h2>
                        </a>
                        <div class="row">
                            <div class="item">
                                <figure>
                                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/Calendar.svg" alt="">
                                </figure>
                                <?php
                                $date_start = get_field('promotion_date_start', $item->ID);
                                $start = DateTime::createFromFormat('m/d/Y', $date_start);
                                $date_end = get_field('promotion_date_end', $item->ID);
                                $end = DateTime::createFromFormat('m/d/Y', $date_end);
                                ?>
                                <span><?= $start->format('d M'); ?> - <?= $end->format('d M Y'); ?></span>
                            </div>
                        </div>
                        <?php
							$event_description = get_field('promotion_description', $item->ID);
							$event_description = substr($event_description, strpos($event_description, "<p"), strpos($event_description, "</p>") + 4);
						?>
                        <?= $event_description ?>
                    </div>
                </div>
            <?php elseif ($item->post_type == 'event') : 
                $date = new DateTime(get_field('event_date', $item->ID)); ?>
                <div class="list-item-content">
                    <div class="left">
                        <h2><?= $date->format('d'); ?></h2>
                        <span><?= $date->format('F'); ?></span>
                    </div>
                    <div class="mid">
                        <a href="<?= get_the_permalink($item->ID); ?>">
                            <figure>
                                <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" alt="">
                            </figure>
                        </a>
                        <div class="text">
                            <a href="<?= get_the_permalink($item->ID); ?>">
                                <h2><?= $item->post_title; ?></h2>
                            </a>
                            <?php
								$event_description = get_field('event_description', $item->ID);
								$event_description = substr($event_description, strpos($event_description, "<p"), strpos($event_description, "</p>") + 4);
							?>
                        <?= $event_description ?>
                        </div>
                    </div>
                    <button class="button-primary open-modal" data-modal="modalEventBooking" data-title="<?= $item->post_title; ?>">
                        Book Event
                    </button>
                </div>
            <?php 
            endif;

            $content .= ob_get_clean(); // Lấy nội dung HTML
        }

        $has_more_posts = (count($posts) >= $posts_per_page); // Kiểm tra còn bài viết không
    }

    wp_send_json([
        'content' => $content,
        'has_more_posts' => $has_more_posts,
    ]);

    wp_die();
}

function load_more_images() {
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

    $gallery = get_field('gallery_category', getIdPage('gallery'));
    $all_images = [];
    foreach ($gallery as $value) {
        $all_images = array_merge($all_images, $value['image']);
    }
    $images_to_load = array_slice($all_images, $offset, 12);

    if (!empty($images_to_load)) {
        foreach (array_chunk($images_to_load, 6) as $images) : ?>
            <div class="row-1">
                <?php for ($i = 0; $i < 2; $i++) : ?>
                    <?php if (isset($images[$i])) : ?>
                        <div class="image-content">
                            <a href="<?= esc_url($images[$i]['image']); ?>" data-fancybox="gallery" data-caption="<?= esc_html($images[$i]['title']); ?>">
                                <figure><img src="<?= esc_url($images[$i]['image']); ?>" alt=""></figure>
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
                            <a href="<?= esc_url($images[$i]['image']); ?>" data-fancybox="gallery" data-caption="<?= esc_html($images[$i]['title']); ?>">
                                <figure><img src="<?= esc_url($images[$i]['image']); ?>" alt=""></figure>
                            </a>
                            <div class="caption">
                                <h2><?= esc_html($images[$i]['title']); ?></h2>
                                <p><?= esc_html($images[$i]['description']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endforeach;
    }

    wp_die();
}
add_action('wp_ajax_load_more_images', 'load_more_images');
add_action('wp_ajax_nopriv_load_more_images', 'load_more_images');

function load_more_images_by_category() {
    // Lấy dữ liệu từ request
    $category = isset($_POST['category']) ? $_POST['category'] : 0;
    $offset = isset($_POST['offset']) ? $_POST['offset'] : 0;

    // Lấy dữ liệu gallery từ ACF
    $gallery = get_field('gallery_category', getIdPage('gallery'));
    $images = [];
    foreach ($gallery as $value) {
        foreach ($value as $cate) {
            if ($category == $cate) {
                $images = $value['image'];
            }
        }
        // $images = $value[$category]['image'] ?? [];
    }

    // Lấy danh mục dựa trên ID
    // $category = isset($gallery[$category_id]) ? $gallery[$category_id] : null;

    // Nếu không tìm thấy danh mục, gửi thông báo lỗi
    // if (!$category) {
    //     wp_send_json_error('Category not found.');
    //     wp_die();
    // }

    // Lấy các hình ảnh cần tải
    $images_to_load = array_slice($images, $offset, 12);

    // Kiểm tra xem có hình ảnh để tải không
    if (empty($images_to_load)) {
        wp_send_json_error('No more images to load.');
        wp_die();
    }

    // Gửi lại dữ liệu hình ảnh
    foreach (array_chunk(array_slice($images_to_load, 0, 12), 6) as $images) : ?>
        <div class="row-1">
            <?php for ($i = 0; $i < 2; $i++) : ?>
                <?php if (isset($images[$i])) : ?>
                    <div class="image-content">
                        <a href="<?= esc_url($images[$i]['image']); ?>" data-fancybox="gallery" data-caption="<?= esc_html($images[$i]['title']); ?>">
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
                        <a href="<?= esc_url($images[$i]['image']); ?>" data-fancybox="gallery" data-caption="<?= esc_html($images[$i]['title']); ?>">
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
    <?php endforeach;

    wp_die();
}
add_action('wp_ajax_load_more_images_by_category', 'load_more_images_by_category');
add_action('wp_ajax_nopriv_load_more_images_by_category', 'load_more_images_by_category');

