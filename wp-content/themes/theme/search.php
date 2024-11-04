
<?php get_header(); ?>
<div class="container">
    <section class="research">
        <div class="content row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-lg-6">
                    <div class="child">
                        <div class="image">
                            <figure>
                                <?php the_post_thumbnail('medium'); ?>
                            </figure>
                        </div>
                        <div class="text">
                            <div class="name">
                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                            </div>
                            <div class="date">
                                <h5><?php echo get_the_date('d/m/Y'); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php
            $big = 999999999;
            $paginate_links = paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
                'type' => 'array'
            ));
            if ($paginate_links) : ?>
                <nav class="number-page">
                    <ul>
                        <?php
                        foreach ($paginate_links as $link) {
                            $active = strpos($link, 'current') !== false ? 'class="active"' : '';
                            if (strpos($link, 'dots') !== false) {
                                echo '<li><i class="fas fa-ellipsis-h"></i></li>';
                            } else {
                                echo "<li $active>$link</li>";
                            }
                        }
                        ?>
                    </ul>
                </nav>
            <?php endif; ?>

            <?php else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
