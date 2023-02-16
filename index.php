<?php
get_header();
?>

	<main id="primary" class="site-main">

		<header class="entry-header">
            <h1 class="entry-title">
                <?php single_post_title(); ?>
            </h1>
		</header>

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main>

<?php
get_sidebar();
get_footer();