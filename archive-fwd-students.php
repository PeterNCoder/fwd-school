<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_School
 */

get_header();
?>

	<main id="primary" class="site-main">

		<header class="page-header">
			<h1><?php post_type_archive_title(); ?></h1>
		</header>

			<section class='students-content'>
			<?php
			$terms    = get_terms(
				array(
					'taxonomy' => $taxonomy
				)
			);
			if($terms && ! is_wp_error($terms) ){
				foreach($terms as $term){
					$args = array(
						'post_type'      => 'fwd-students',
						'posts_per_page' => -1,
						'order'          => 'ASC',
						'orderby'        => 'title',
						'tax_query'      => array(
							array(
								'taxonomy' => 'fwd-student-types',
								'field'    => 'slug',
								'terms'    => $term->slug,
							)
						),
					);
					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						while( $query->have_posts() ) {
							$query->the_post(); 
							?>
							<article class='student-article'>
								<a href="<?php echo esc_url(get_the_permalink()); ?>">
									<h2><?php esc_html_e(get_the_title()); ?></h2>
									<?php the_post_thumbnail('200-300'); ?>
								</a>
								<?php the_excerpt(); ?>
								<p>Specialty: 
									<a href="<?php echo esc_url(get_term_link($term)); ?>">
									<?php esc_html_e($term->name); ?>
									</a>
								</p>
							</article>
							<?php
						}
					wp_reset_postdata();
					echo "</section>";
					} 
				}
			}
			?>
			</section>
	</main><!-- #main -->

<?php
get_footer();
