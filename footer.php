<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package QA_WP_Template
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="container-fluid site-footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-8">
					<p>copyright <?php bloginfo( 'name' ); ?><br/ >
						If you have any questions please contact the <a href='mailto:<?php get_option( 'admin_email' ); ?>'>admin here</a>.</p>
                </div>
                <div class="col-sm-6 col-md-4">
					<?php
					if ( is_user_logged_in() ) {
						$current_user = wp_get_current_user();
						printf( 'Hello %s', esc_html( $current_user->user_firstname ) );
						printf( ' %s!', esc_html( $current_user->user_lastname ) );
						?>
						<br />Click <a href="<?php echo wp_logout_url( home_url() ); ?>">here to log out</a>.
						<?php

					} else {
						?>
						You are currently not logged in;<br>Please <a href="<?php echo wp_login_url( home_url() ); ?>" title="Login">click here to log in</a>
						<?php
						//wp_loginout();
					}
					?>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
