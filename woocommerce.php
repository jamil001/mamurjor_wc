<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flipmart
 */

get_header();
?>

	<div class="body-content">
		<div class="container">
			<div class="row">
				<div class="blog-page">
					<div class="col-md-9">

						<?php woocommerce_content(); ?>

					</div>

					<div class="col-md-3">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php

get_footer();
