<?php 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/assets/style/main.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/assets/js/aos.css" />
    <title>Nam Phương</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <!-- fancy box -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"
        integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="header">
        <div class="head-container">
            <div class="left">
                <a href="/">
                    <div class="logo">
                        <figure>
                            <img src="<?= get_field('header_logo', 'option'); ?>" alt="logo">
                        </figure>
                        <div class="fix-size"></div>
                    </div>
                </a>
                <a href="/">
                    <div class="logo-scroll">
                        <figure>
                            <img src="<?= get_field('header_logo_scroll', 'option'); ?>" alt="logo">
                        </figure>
                    </div>
                </a>
                <nav class="nav">
                    <ul>
                        <?php
                            $link_directory = get_template_directory_uri();
                            //Dữ liệu menu top
                            $arr_top = wp_get_nav_menu_items('Menu'); // lấy menu ra
                            $menu2 = []; // tạo mảng mới cho menu
                            foreach ($arr_top as $key => $ar) {  // tạo thằng cha đầu tiên cho menu
                                if ($ar->menu_item_parent == 0) {
                                    $menu2[$key]['ID'] = $ar->ID;
                                    $menu2[$key]['title'] = $ar->title;
                                    $menu2[$key]['url'] = $ar->url;
                                    $menu2[$key]['menu_item_parent'] = $ar->menu_item_parent;
                                    $menu2[$key]['classes'] = $ar->classes;
                                    $menu2[$key]['description'] = $ar->description;
                                    $class = $ar->classes;
                                    $menu2[$key]['classes'] = $class[0];
                                    $menusubtop = [];

                                    $i_sub = 0;
                                    foreach ($arr_top as $key_sub => $ar_sub) { //tạo ra menu con thứ 2 theo id của menu cha
                                        if ($ar->ID == $ar_sub->menu_item_parent) {
                                            $menusubtop[$i_sub]['ID'] = $ar_sub->ID;
                                            $menusubtop[$i_sub]['title'] = $ar_sub->title;
                                            $menusubtop[$i_sub]['url'] = $ar_sub->url;
                                            $menusubtop[$i_sub]['menu_item_parent'] = $ar_sub->menu_item_parent;
                                            $menusubtop[$i_sub]['description'] = $ar_sub->description;
                                            $menusubtop_2 = [];
                                            $i_sub2 = 0;
                                            $menusubtop[$i_sub]['menusub_2'] = $menusubtop_2;
                                            $i_sub++;
                                        }
                                    }
                                    $menu2[$key]['menu_sub'] = $menusubtop;
                                }
                            }

                            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            $ke = strpos($actual_link, '?');
                            if (!empty($ke)) {
                                $actual_link = substr($actual_link, 0, $ke);
                            }
                            $actual_link = rtrim($actual_link, '/');

                            $dem = 0;
                            $menu_t = [];
                            foreach ($menu2 as $mn) {
                                $menu_t[$dem] = $mn;
                                if ($actual_link == rtrim($mn['url'], '/')) {
                                    $li = printf('<li class="active"><a href="%s">%s</a></li>', $mn['url'], $mn['title']);
                                } else {
                                    $li = printf('<li><a href="%s">%s</a></li>', $mn['url'], $mn['title']);
                                }
                                $dem++;
                            }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="right">
                <a href="<?= home_url(); ?>/reservation" target="_blank" class="res fancy-hover">Reservation</a>
                <a href="<?= get_field('order_online', 'option'); ?>" target="_blank"  class="order fancy-hover">Order online</a>
            </div>
        </div>

        <div class="mobile-header">
            <a href="/">
                <div class="logo">
                    <figure>
                        <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/logo-mobile.svg" alt="logo">
                    </figure>
                </div>
            </a>

            <button class="breadcrumb-button">
                <figure>
                    <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/3bar.svg" alt="">
                </figure>
            </button>

            <div class="breadcrumb-header">
                <div class="top">
                    <a href="/">
                        <div class="logo">
                            <figure>
                                <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/logo-mobile.svg" alt="logo">
                            </figure>
                        </div>
                    </a>
                    <button class="breadcrumb-close">
                        <figure>
                            <img src="<?= get_template_directory_uri(); ?>/dist/assets/image/icon/close.svg" alt="">
                        </figure>
                    </button>
                </div>
                <nav class="nav">
                    <ul>
                        <?php
                            // Get the current URL, removing query parameters if present
                            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") 
                            . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            $actual_link = strtok($actual_link, '?'); // Removes query parameters
                            $actual_link = rtrim($actual_link, '/'); // Ensures consistent URLs

                            // Fetch menu items

                            foreach ($menu2 as $mn) {
                                $is_active = $actual_link === $mn['url'] ? 'active' : '';
                                printf('<li class="%s"><a href="%s">%s</a></li>', $is_active, $mn['url'], $mn['title']);

                                // Render submenu if available
                                if (!empty($mn['menu_sub'])) {
                                    echo '<ul class="submenu">';
                                    foreach ($mn['menu_sub'] as $submenu) {
                                        $sub_active = $actual_link === $submenu['url'] ? 'active' : '';
                                        printf('<li class="%s"><a href="%s">%s</a></li>', $sub_active, $submenu['url'], $submenu['title']);
                                    }
                                    echo '</ul>';
                                }
                            }
                        ?>
                        <!-- <li><a href="#">Home</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Promos & Events</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">About Nam Phuong</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Contact</a></li> -->
                    </ul>
                </nav>
                <div class="right">
                    <a href="<?= home_url(); ?>/reservation" target="_blank" class="res fancy-hover">Reservation</a>
                    <a href="<?= get_field('order_online', 'option'); ?>" target="_blank"  class="order hover-second">Order online</a>
                </div>
            </div>
        </div>
    </header>
    
    <!-- mobile header script -->
    <script defer>
        // Lấy các phần tử cần thao tác
        const breadcrumbButton = document.querySelector('.breadcrumb-button');
        const breadcrumbHeader = document.querySelector('.breadcrumb-header');
        const breadcrumbClose = document.querySelector('.breadcrumb-close');

        // Khi nhấn vào button thì thêm hoặc gỡ class 'active' cho breadcrumb
        breadcrumbButton.addEventListener('click', function (event) {
            event.stopPropagation(); // Ngăn không để sự kiện này lan ra ngoài
            breadcrumbHeader.classList.toggle('active');
        });

        // Khi click vào nút close, loại bỏ class 'active'
        breadcrumbClose.addEventListener('click', function () {
            breadcrumbHeader.classList.remove('active');
        });

        // Khi click bên ngoài breadcrumb, loại bỏ class 'active'
        document.addEventListener('click', function (event) {
            if (!breadcrumbHeader.contains(event.target) && !breadcrumbButton.contains(event.target)) {
                breadcrumbHeader.classList.remove('active');
            }
        });

    </script>