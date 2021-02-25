<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sky_Ranch
 * 
 * 
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
                    
                    <section class="entry-forward">
                        <div class = "forward-loop">
                            
                            
                            <?php 
                                $forward_loop = 
                                    new WP_Query([
                                        'post_type' => 'forward',
                                        'order'=>'ASC',
                                        'orderby'=>'ID'
                                        ]); 
                                ?>

                                <?php
                                while( $forward_loop->have_posts() ) : $forward_loop->the_post();

                                     get_template_part( 'template-parts/content', 'forward' );

                                endwhile;                            
                                wp_reset_query();
                            ?>
                           
                        </div>
                    </section><!--.entry-forward--> 
                    
                    <section class="entry-models">
                        <div class="models-loop">
                            <h2 class="models-header">Models</h2>
                            <?php 
                                $model_loop = 
                                    new WP_Query([
                                        'post_type' => 'model',
                                        'order'=>'ASC',
                                        'orderby'=>'ID'
                                        ]); 
                                ?>

                                <?php
                                while( $model_loop->have_posts() ) : $model_loop->the_post();

                                     get_template_part( 'template-parts/content', get_post_type() );

                                endwhile;                            
                                wp_reset_query();
                            ?>
                        </div><!--.models-loop-->  
                    </section><!--entry-models-->

                    <section class="entry-location">
                        <div class = "location-content">
                            <div class="map-container">
                                <h2>Location</h2>

                                <figure class = "entry-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3122.766929270863!2d-109.44766748466148!3d38.493019679634955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8747fb3633329a3b%3A0xc6052115e9ce1c58!2sSky+Ranch+Airport!5e0!3m2!1sen!2sus!4v1539635543288" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </figure>
                            </div><!--.map-container-->
                            
                            <div class="entry-address">
                                <p>431 E Coronado Ln,</br>
                                   Moab, UT 84532
                                </p>
                            </div><!--.entry-address-->
                        </div><!--.location-content-->
                    </section><!--.entry-location--> 
                
                    
                    
                    <section class="contact">
                        <div class = "contact-loop">
                            
                            <?php 
                                $contactInfo_loop = 
                                    new WP_Query([
                                        'post_type' => 'contact-info',
                                        'order'=>'ASC',
                                        'orderby'=>'ID'
                                        ]); 
                                ?>

                                <?php
                                while( $contactInfo_loop->have_posts() ) : $contactInfo_loop->the_post();

                                     get_template_part( 'template-parts/content', get_post_type() );

                                endwhile;                            
                                wp_reset_query();
                            ?>
                            <div class="contact-details">
                                <div class="entry-address">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <address>
                                        123 Street</br>
                                        Moab, UT 84532
                                    </address>
                                </div>

                                <div class="entry-phone-number">
                                    <i class="fas fa-phone"></i>
                                    <p>(123)456-7890</p>
                                </div>

                                <div class="entry-email">
                                    <i class="fas fa-envelope"></i> 
                                    <p>example@bzrez.com</p>
                                </div>
                            </div><!--.contact-details-->
                            
                            <div class="contact-form">
                                <?php echo do_shortcode('[contact-form-7 id="1750" title="Contact form 1"]');?>
                            </div>
                            
                        </div><!--.contact-loop-->
                    </section><!--.entry-models--> 
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();


