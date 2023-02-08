<?php
/**
 * The template for displaying the home page
 *
 * This is the template that displays the homepage.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_School
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
            the_title( '<h1 class="entry-title">', '</h1>' );
			the_content();
        ?>

        <section class="home-recent-news">
            <h2><?php esc_html_e('Recent News', 'fwd'); ?></h2>
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            );

            $blog_query = new WP_Query( $args );

            if ( $blog_query -> have_posts() ) {
                while ( $blog_query -> have_posts() ) {
                    $blog_query -> the_post();
                    ?>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h3><?php esc_html_e(get_the_title()); ?></h3>
                        </a>
                    </article>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>

            <a href="<?php echo esc_url(get_post_type_archive_link( 'post' )); ?>">
            See All News
            </a>
        </section>

        <?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
