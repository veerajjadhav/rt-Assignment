<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @package rt_assignment
 */
get_header();
?>

<div class=" wrapper">
	<div class="row slider-row">
		<div class="col-md-7 slider-image">

			<div class="slider">
				<?php
				// Theme_mod settings to check.
				$settings = get_theme_mod( 'slider_slides' );
				foreach ( $settings as $setting ) :
					echo '<div>';
					$attachment_id = $setting[ 'thumbnail' ];
					echo wp_get_attachment_image( $attachment_id, 'slider-image' );
					echo '</div>';
				endforeach;
				?>
			</div>
		</div>
		<div class="col-md-5">
			<h2 class="page-heading">welcome to rtPanel</h2>
			<div class="author-page">
				<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg" alt="adf" class="img-responsive "/>
				<p class="page-desc">

					Vel adipiscing lectus lundium. Dapibus amet turpis adipiscing ridiculus porta, aenean tempor phasellus cras ultrices urna, ut in
					turpis auctor, dignissim odio porttitor mus egestas dapibus diam urna phasellus! Amet adipiscing enim, odio odio? Massa eros, ut pulvinar magnis dis, penatibus urna est penatibus turpis egestas non pulvinar, ac lectus sit, habitasse etiam nisi sed habitasse, risus nisi, amet etiam? Pulvinar dis ac vel!


				</p>
			</div>
		</div>
	</div>

</div>
<?php
get_footer();
