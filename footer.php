<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package editorial_wp
 */

?>
				</div><!-- #inner -->
			</div><!-- #main -->

			<!-- Sidebar -->
			<div id="sidebar">
				<div class="inner">
					<!-- Search -->
					<section id="search" class="alt">
						<form method="post" action="#">
							<input type="text" name="query" id="query" placeholder="Search" />
						</form>
					</section><!-- #search -->

					<!-- Menu -->
					<nav id="menu">
						<header class="major">
							<h2>Menu</h2>
						</header>
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'editorial_wp' ); ?></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
							?>
						</nav><!-- #site-navigation -->
						<ul>
							<li><a href="index.html">Homepage</a></li>
							<li><a href="generic.html">Generic</a></li>
							<li><a href="elements.html">Elements</a></li>
							<li>
								<span class="opener">Submenu</span>
								<ul>
									<li><a href="#">Lorem Dolor</a></li>
									<li><a href="#">Ipsum Adipiscing</a></li>
									<li><a href="#">Tempus Magna</a></li>
									<li><a href="#">Feugiat Veroeros</a></li>
								</ul>
							</li>
							<li><a href="#">Etiam Dolore</a></li>
							<li><a href="#">Adipiscing</a></li>
							<li>
								<span class="opener">Another Submenu</span>
								<ul>
									<li><a href="#">Lorem Dolor</a></li>
									<li><a href="#">Ipsum Adipiscing</a></li>
									<li><a href="#">Tempus Magna</a></li>
									<li><a href="#">Feugiat Veroeros</a></li>
								</ul>
							</li>
							<li><a href="#">Maximus Erat</a></li>
							<li><a href="#">Sapien Mauris</a></li>
							<li><a href="#">Amet Lacinia</a></li>
						</ul>
					</nav><!-- #menu -->

					<!-- Section -->
					<section>
						<header class="major">
							<h2>Ante interdum</h2>
						</header>
						<div class="mini-posts">
							<article>
								<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
								<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
							</article>
							<article>
								<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
								<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
							</article>
							<article>
								<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
								<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
							</article>
						</div>
						<ul class="actions">
							<li><a href="#" class="button">More</a></li>
						</ul>
					</section><!-- #section -->

					<!-- Section -->
					<section>
						<header class="major">
							<h2>Get in touch</h2>
						</header>
						<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
						<ul class="contact">
							<li class="fa-envelope-o"><a href="#">information@untitled.tld</a></li>
							<li class="fa-phone">(000) 000-0000</li>
							<li class="fa-home">1234 Somewhere Road #8254<br />
							Nashville, TN 00000-0000</li>
						</ul>
					</section><!-- #section -->

					<!-- Footer -->
					<footer id="footer">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'editorial_wp' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'editorial_wp' ), 'WordPress' );
							?>
						</a>
						<span class="sep"> | </span>
							<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'editorial_wp' ), 'editorial_wp', '<a href="http://underscores.me/">Underscores.me</a>' );
							?>
						<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer><!-- #footer -->
				</div><!-- #inner -->
			</div><!-- #section -->
		</div><!-- #wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>
