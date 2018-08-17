<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Teller
 */
?>
    </div>
    </div>
    <!-- #content -->
	<?php $footer_class = '';
	if( empty( get_theme_mod('Facebook') ) && empty(get_theme_mod('Google_plus')) && empty(get_theme_mod('Linkedin')) && empty(get_theme_mod('Twitter')) ) {
		$footer_class = 'no-social-icons';
	} ?>
    <footer id="colophon" class="site-footer <?php echo $footer_class; ?>" role="contentinfo">
        <div class="site-info">
            <div class="wrap">
                <div class="row-site-info">
                    ©Bulava
                </div>

				<?php if( get_theme_mod('Facebook') || get_theme_mod('Google_plus') || get_theme_mod('Linkedin') ||  get_theme_mod('Twitter') ) { ?>
	                <div class="footer-right">
	                    <ul class="alignleft">
			                        <?php if( get_theme_mod('Facebook') ) : ?>
			                <li class="social-facebook"><a href="<?php echo get_theme_mod('Facebook') ?>"><i class="fa fa-facebook"></i></a>
			                        <?php endif; ?>
			                </li>
			                        <?php if( get_theme_mod('Google_plus') ) : ?>
			                <li class="social-gplus"><a href="<?php echo get_theme_mod('Google_plus') ?>"><i class="fa fa-google-plus"></i></a>
			                        <?php endif; ?>
			                </li>
			                        <?php if( get_theme_mod('Linkedin') ) : ?>
			                <li class="social-linkedin"><a href="<?php echo get_theme_mod('Linkedin') ?>"><i class="fa fa-linkedin"></i></a>
			                        <?php endif; ?>
			                </li>
			                        <?php if( get_theme_mod('Twitter') ) : ?>
			                <li class="social-twitter"><a href="<?php echo get_theme_mod('Twitter') ?>"><i class="fa fa-twitter"></i></a>
			                        <?php endif; ?>
			                </li>
			            </ul>
	                </div>
			<?php } ?>
            </div>
        </div>
        <!-- .site-info -->
    </footer>
    <!-- #colophon -->
    </div>
    <!-- #page -->

    <?php wp_footer(); ?>

        </body>

        </html>
