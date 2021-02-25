<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sky_Ranch
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
            <?php
                if ( is_singular() ) :

                    if ( 'post' === get_post_type() ) : ?>

                    <div class="entry-meta">
                            <?php
                            skyranch_posted_on();
                            skyranch_posted_by();
                            ?>
                    </div><!-- .entry-meta -->

                    <?php endif; ?>

                <?php endif; 



                if ( is_singular() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;
            ?>
                      
	</header><!-- .entry-header -->
        
	<?php skyranch_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'skyranch' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skyranch' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
        
        <?php
        if ( is_singular() ) :
        ?>
            <div class="tag-cat-wrap">
                <div class="entry-categories">
                    <?php skyranch_the_category_list(); ?>
                </div><!--.entry-categories-->

                <div class="entry-tags">
                    <?php skyranch_the_tag_list(); ?>
                </div><!--.entry-tags-->
            </div><!--.tag-cat-wrap-->
            
        <?php 
        skyranch_post_navigation();
        endif; ?>
        
        
	<footer class="entry-footer">
		<?php skyranch_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
