<?php
/**
 * The template for displaying single student posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FWD_School
 */

 get_header();
 ?>
 
 <main id="primary" class="site-main">
 
 <?php while ( have_posts() ) : the_post(); ?>
 
	 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
		<header class="entry-header">
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>
		</header>
 
		<div class="entry-content">
			 <?php the_post_thumbnail('medium', array('class' => 'alignright')); ?>
			 <?php the_content(); ?>
		</div>
			 
		<aside>

	
		<?php
			$taxonomy = 'fwd-student-types';
			$terms    = get_the_terms($post->ID, $taxonomy);

			if($terms && ! is_wp_error($terms) ){
				foreach($terms as $term){
					$args = array(
						'post_type'      => 'fwd-students',
						'posts_per_page' => -1,
						'post__not_in'   => array($post->ID),
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
						?>
						<h2>Meet other <?php esc_html_e($term->name) ?> students:</h2>
						<?php
						while ( $query -> have_posts() ) {
							$query -> the_post();
							?>
							<p> 
								<a href="<?php echo esc_url(get_the_permalink()); ?>">
									<?php esc_html_e(get_the_title()); ?> 
								</a>
							</p>
							<?php
						}
						wp_reset_postdata();
					}
				}
			}
			?>

		</aside>

	 </article>
 
 <?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();