<?php
/**
 * The template for displaying the staff page
 *
 * This is the template that displays the staff page.
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

		<?php while ( have_posts() ) : the_post(); ?>
            
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>

        <section class="entry-content">
        <?php the_content() ?>
        </section>

        <?php
        $taxonomy = 'fwd-staff-type';
        $terms    = get_terms(
            array(
                'taxonomy' => $taxonomy
            )
        );
        if($terms && ! is_wp_error($terms) ){
            foreach($terms as $term){
                $args = array(
                    'post_type'      => 'fwd-staff',
                    'posts_per_page' => -1,
                    'order'          => 'ASC',
                    'orderby'        => 'title',
                    'tax_query'      => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        )
                    ),
                );
                    
                $query = new WP_Query( $args );
                    
                if ( $query -> have_posts() ) {
                    echo '<section class="staff-term-wrapper">';
                    echo '<h2>' . esc_html( $term->name ) . '</h2>';

                    while ( $query -> have_posts() ) {
                        $query -> the_post();
                    
                        if ( function_exists( 'get_field' ) ) {
                            echo '<article class="staff-article">';
                            if ( get_field( 'staff_biography' ) ) {
                                echo '<h3>' . esc_html( get_the_title()) . '</h3>';
                                the_field( 'staff_biography' );
                            }
                            if ( get_field( 'staff_courses' ) ) {
                                echo '<p> Courses: '; 
                                the_field( 'staff_courses' );
                                echo '</p>';
                            }
                            if ( get_field( 'staff_website' ) ) {
                                echo '<a href="';
                                esc_url(the_field( 'staff_website' ));
                                echo '">Instructor Website</a>';
                            }
                            echo '</article>';
                        }
                    }
                    wp_reset_postdata();
                    echo '</section>';
                }
            }
        }
        ?>

        <?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
