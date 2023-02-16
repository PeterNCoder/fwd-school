<?php
get_header();
 ?>
 
 <main id="primary" class="site-main">

 	<header class="entry-header">
		<h1><?php single_term_title(); ?> Students</h1>
	</header>
 
	<?php while ( have_posts() ) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
			<div class="entry-content">
				<h2 class="entry-title">
					<a href="<?php echo esc_url(get_the_permalink()); ?>">
						<?php the_title(); ?>
					</a>
				</h2>

				<?php the_post_thumbnail('200-300', array('class' => 'alignleft')); ?>
				<?php the_content(); ?>
			</div>

		</article>
	
	<?php endwhile; ?>

</main>

<?php
get_footer();