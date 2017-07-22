<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ascent
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
	if( !is_front_page() ){
		echo '<header class="page-header">
						<h1 class="entry-title">'.get_the_title().'</h1>
					</header>';
	} 
?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ascent' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'ascent' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
