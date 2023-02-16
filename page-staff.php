<?php
get_header();
?>

	<main id="primary" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>
            
            <header class="entry-header">
                <h1 class="entry-title">
                    <?php the_title(); ?>
                </h1>
            </header>

            <section class="entry-content">
                
                <?php the_content(); ?>
                
            </section>

            <?php
            $taxonomy = 'fwd-staff-type';
            $terms    = get_terms(
                array(
                    'taxonomy' => $taxonomy
                )
            );
            if($terms && ! is_wp_error($terms) ) :
                foreach($terms as $term) :
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
                        
                    if ( $query -> have_posts() ) :
                        ?>
                        <section class="staff-term-wrapper">
                        <h2> <?php esc_html_e( $term->name ) ?> </h2>
                        <?php
                        while ( $query -> have_posts() ) :
                            $query -> the_post();
                        
                            if ( function_exists( 'get_field' ) ) :
                                ?>
                                <article class="staff-article">
                                    <?php
                                    if ( get_field( 'staff_biography' ) ) :
                                        ?>
                                        <h3> <?php esc_html_e( get_the_title()) ?></h3>
                                        <p> <?php esc_html_e(get_field( 'staff_biography' )); ?></p>
                                    <?php
                                    endif;
                                    if ( get_field( 'staff_courses' ) ) :
                                        ?>
                                        <p class="staff-courses">Courses: <?php esc_html_e(get_field( 'staff_courses' )); ?> </p>
                                        <?php
                                    endif;
                                    if ( get_field( 'staff_website' ) ) :
                                        ?>
                                        <a href="<?php echo esc_url(get_field( 'staff_website' )); ?>">Instructor Website</a>
                                    <?php
                                    endif;
                                    ?>
                                </article>
                            <?php
                            endif;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                        </section>
                        <?php
                    endif;
                endforeach;
            endif;
            ?>

        <?php endwhile; ?>

	</main>

<?php
get_footer();
