<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sky_Ranch
 */

?>

            </div><!-- #content -->

            <footer id="colophon" class="site-footer">
                    <div class="site-info">
                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'skyranch' ) ); ?>">
                                    <?php
                                    /* translators: %s: CMS name, i.e. WordPress. */
                                    printf( esc_html__( 'Proudly powered by %s', 'skyranch' ), 'WordPress' );
                                    ?>
                            </a>
                            <span class="sep"> | </span>
                                    <?php
                                    /* translators: 1: Theme name, 2: Theme author. */
                                    printf( esc_html__( 'Theme: %1$s by %2$s.', 'skyranch' ), 'skyranch', '<a href="https://github.com/MichaelChristman">Michael Christman</a>' );
                                    ?>
                    </div><!-- .site-info -->
            </footer><!-- #colophon -->
        </div><!--#ajax-action-area-->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
