<?php
/**
 * The Template for displaying all single listing posts
 *
 * @package WP Listings
 * @since 0.1.0
 */

$lang = "";
if (isset($_GET['lang'])){
	$lang = $_GET['lang'];
}

add_action('wp_enqueue_scripts', 'enqueue_single_listing_scripts');
function enqueue_single_listing_scripts() {
	wp_enqueue_style( 'wp-listings-single' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_script( 'jquery-validate', array('jquery'), true, true );
	wp_enqueue_script( 'fitvids', array('jquery'), true, true );
	wp_enqueue_script( 'wp-listings-single', array('jquery, jquery-ui-tabs', 'jquery-validate'), true, true );
}

function trans_label($label){
	switch ($label) {
		case 'Price:':
			return '价格：';
			break;
		case 'Address:':
			return '地址：';
			break;
		case 'City:':
			return '城市：';
			break;
		case 'State:':
			return '省：';
			break;
		case 'ZIP:':
			return '邮编：';
			break;
		case 'Open House Time & Date:':
			return '开放日：';
			break;
		case 'Year Built:':
			return '修建年份：';
			break;
		case 'Floors:':
			return '层数：';
			break;
		case 'Square Feet:':
			return '建筑面积：';
			break;
		case 'Lot Square Feet:':
			return '土地面积：';
			break;
		case 'Bedrooms:':
			return '卧室数目：';
			break;
		case 'Bathrooms:':
			return '浴室数目：';
			break;
		case 'Pool:':
			return '游泳池：';
			break;
	}
	return $label;
}

function single_listing_post_content() {
	$lang = "";
	if (isset($_GET['lang'])){
		$lang = $_GET['lang'];
	}
	global $post;

	?>

	<div class="entry-content wplistings-single-listing">

		<div class="listing-image-wrap">
			<?php echo get_the_post_thumbnail( $post->ID, 'listings-full', array('class' => 'single-listing-image') );
			if ( '' != wp_listings_get_status() ) {
				printf( '<span class="listing-status %s">%s</span>', strtolower(str_replace(' ', '-', wp_listings_get_status())), wp_listings_get_status() );
			}
			if ($lang=='en'){
				if ( '' != get_post_meta( $post->ID, '_listing_open_house', true ) ) {
					printf( '<span class="listing-open-house">Open House: %s</span>', get_post_meta( $post->ID, '_listing_open_house', true ) );
				} 
			}else{
				if ( '' != get_post_meta( $post->ID, '_listing_open_house', true ) ) {
					printf( '<span class="listing-open-house">开放日: %s</span>', get_post_meta( $post->ID, '_listing_open_house', true ) );
				} 
			}
			?>
		</div><!-- .listing-image-wrap -->

		<?php
		$listing_meta = sprintf( '<ul class="listing-meta">');

		if ($lang=="en"){

			if ( '' != get_post_meta( $post->ID, '_listing_price', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-price">%s</li>', get_post_meta( $post->ID, '_listing_price', true ) );
			}

			if ( '' != wp_listings_get_property_types() ) {
				$listing_meta .= sprintf( '<li class="listing-property-type"><span class="label">Property Type: </span>%s</li>', get_the_term_list( get_the_ID(), 'property-types', '', ', ', '' ) );
			}

			if ( '' != wp_listings_get_locations() ) {
				$listing_meta .= sprintf( '<li class="listing-location"><span class="label">Location: </span>%s</li>', get_the_term_list( get_the_ID(), 'locations', '', ', ', '' ) );
			}

			if ( '' != get_post_meta( $post->ID, '_listing_bedrooms', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-bedrooms"><span class="label">Beds: </span>%s</li>', get_post_meta( $post->ID, '_listing_bedrooms', true ) );
			}

			if ( '' != get_post_meta( $post->ID, '_listing_bathrooms', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-bathrooms"><span class="label">Baths: </span>%s</li>', get_post_meta( $post->ID, '_listing_bathrooms', true ) );
			}

			if ( '' != get_post_meta( $post->ID, '_listing_sqft', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-sqft"><span class="label">Sq Ft: </span>%s</li>', get_post_meta( $post->ID, '_listing_sqft', true ) );
			}

			if ( '' != get_post_meta( $post->ID, '_listing_lot_sqft', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-lot-sqft"><span class="label">Lot Sq Ft: </span>%s</li>', get_post_meta( $post->ID, '_listing_lot_sqft', true ) );
			}
		}else{
			if ( '' != get_post_meta( $post->ID, '_listing_price', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-price">%s</li>', get_post_meta( $post->ID, '_listing_price', true ) );
			}

			if ( '' != wp_listings_get_property_types() ) {
				$listing_meta .= sprintf( '<li class="listing-property-type"><span class="label">物业类型: </span>%s</li>', get_the_term_list( get_the_ID(), 'property-types', '', ', ', '' ) );
			}

			if ( '' != wp_listings_get_locations() ) {
				$listing_meta .= sprintf( '<li class="listing-location"><span class="label">城市／位置: </span>%s</li>', get_the_term_list( get_the_ID(), 'locations', '', ', ', '' ) );
			}

			if ( '' != get_post_meta( $post->ID, '_listing_bedrooms', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-bedrooms"><span class="label">房间数目: </span>%s</li>', get_post_meta( $post->ID, '_listing_bedrooms', true ) );
			}

			if ( '' != get_post_meta( $post->ID, '_listing_bathrooms', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-bathrooms"><span class="label">浴室数目: </span>%s</li>', get_post_meta( $post->ID, '_listing_bathrooms', true ) );
			}

			if ( '' != get_post_meta( $post->ID, '_listing_sqft', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-sqft"><span class="label">建筑面积: </span>%s</li>', get_post_meta( $post->ID, '_listing_sqft', true ) );
			}

			if ( '' != get_post_meta( $post->ID, '_listing_lot_sqft', true ) ) {
				$listing_meta .= sprintf( '<li class="listing-lot-sqft"><span class="label">土地面积: </span>%s</li>', get_post_meta( $post->ID, '_listing_lot_sqft', true ) );
			}
		}

		$listing_meta .= sprintf( '</ul>');

		echo $listing_meta;

		?>

		<div id="listing-tabs" class="listing-data">

			<ul>
				<?php if ($lang == 'en'){
					print '<li><a href="#listing-description">Description</a></li>';
				}else{
					print '<li><a href="#listing-description">简介</a></li>';
				}

				?>
				<?php
					if($lang=="en"){
						print '<li><a href="#listing-details">Details</a></li>';
					}else{
						print '<li><a href="#listing-details">详细资料</a></li>';
					}
				?>


				<?php if (get_post_meta( $post->ID, '_listing_gallery', true) != '') {
					if ($lang=='en'){
						print '<li><a href="#listing-gallery">Photos</a></li>';
					}else{
						print '<li><a href="#listing-gallery">图片集</a></li>';
					}
				} ?>

				<?php if (get_post_meta( $post->ID, '_listing_video', true) != '') {
					if ($lang=='en'){
						print '<li><a href="#listing-video">Video / Virtual Tour</a></li>';
					}else{
						print '<li><a href="#listing-video">视频</a></li>';
					}
				} ?>

				<?php if (get_post_meta( $post->ID, '_listing_school_neighborhood', true) != '') { 
					if ($lang=='en'){
						print '<li><a href="#listing-school-neighborhood">Schools &amp; Neighborhood</a></li>';
					}else{
						print '<li><a href="#listing-school-neighborhood">学校＆社区</a></li>';
					}
				} ?>
			</ul>

			<div id="listing-description">
				<?php the_content( __( 'View more <span class="meta-nav">&rarr;</span>', 'wp_listings' ) ); ?>
			</div><!-- #listing-description -->

			<div id="listing-details">
				<?php
					$details_instance = new WP_Listings();

					$pattern = '<tr class="wp_listings%s"><td class="label">%s</td><td>%s</td></tr>';

					echo '<table class="listing-details">';

					echo '<tbody class="left">';
					foreach ( (array) $details_instance->property_details['col1'] as $label => $key ) {
						$detail_value = esc_html( get_post_meta($post->ID, $key, true) );
						if (! empty( $detail_value ) ) :
							if ($lang=='en'){
								printf( $pattern, $key, esc_html( $label ), $detail_value );
							}else{
								$tmp = trans_label($label);
								printf( $pattern, $key, esc_html( $tmp ), $detail_value );
							}
						endif;
					}
					echo '</tbody>';

					echo '<tbody class="right">';
					foreach ( (array) $details_instance->property_details['col2'] as $label => $key ) {
						$detail_value = esc_html( get_post_meta($post->ID, $key, true) );
						if (! empty( $detail_value ) ) :
							if ($lang=='en'){
								printf( $pattern, $key, esc_html( $label ), $detail_value );
							}else{
								$tmp = trans_label($label);
								printf( $pattern, $key, esc_html( $tmp ), $detail_value );
							}
						endif;
					}
					echo '</tbody>';

					echo '</table>';

				echo '<h5>Tagged Features</h5><ul class="tagged-features">';
				echo get_the_term_list( get_the_ID(), 'features', '<li>', '</li><li>', '</li>' );
				echo '</ul><!-- .tagged-features -->';

				if ( get_post_meta( $post->ID, '_listing_home_sum', true) != '' || get_post_meta( $post->ID, '_listing_kitchen_sum', true) != '' || get_post_meta( $post->ID, '_listing_living_room', true) != '' || get_post_meta( $post->ID, '_listing_master_suite', true) != '') { ?>
					<div class="additional-features">
						<h4>Additional Features</h4>
						<h6 class="label"><?php _e("Home Summary", 'wp_listings'); ?></h6>
						<p class="value"><?php echo do_shortcode(get_post_meta( $post->ID, '_listing_home_sum', true)); ?></p>
						<h6 class="label"><?php _e("Kitchen Summary", 'wp_listings'); ?></h6>
						<p class="value"><?php echo do_shortcode(get_post_meta( $post->ID, '_listing_kitchen_sum', true)); ?></p>
						<h6 class="label"><?php _e("Living Room", 'wp_listings'); ?></h6>
						<p class="value"><?php echo do_shortcode(get_post_meta( $post->ID, '_listing_living_room', true)); ?></p>
						<h6 class="label"><?php _e("Master Suite", 'wp_listings'); ?></h6>
						<p class="value"><?php echo do_shortcode(get_post_meta( $post->ID, '_listing_master_suite', true)); ?></p>
					</div><!-- .additional-features -->
				<?php
				} ?>				

			</div><!-- #listing-details -->

			<?php if (get_post_meta( $post->ID, '_listing_gallery', true) != '') { ?>
			<div id="listing-gallery">
				<?php echo do_shortcode(get_post_meta( $post->ID, '_listing_gallery', true)); ?>
			</div><!-- #listing-gallery -->
			<?php } ?>

			<?php if (get_post_meta( $post->ID, '_listing_video', true) != '') { ?>
			<div id="listing-video">
				<div class="iframe-wrap">
				<?php echo get_post_meta( $post->ID, '_listing_video', true); ?>
				</div>
			</div><!-- #listing-video -->
			<?php } ?>

			<?php if (get_post_meta( $post->ID, '_listing_school_neighborhood', true) != '') { ?>
			<div id="listing-school-neighborhood">
				<p>
				<?php echo do_shortcode(get_post_meta( $post->ID, '_listing_school_neighborhood', true)); ?>
				</p>
			</div><!-- #listing-school-neighborhood -->
			<?php } ?>

		</div><!-- #listing-tabs.listing-data -->

		<?php
			if (get_post_meta( $post->ID, '_listing_map', true) != '') {
				if($lang!='en'){
					echo '<div id="listing-map"><h3>地址</h3>';
				}else{
					echo '<div id="listing-map"><h3>Location Map</h3>';
				}
			echo do_shortcode(get_post_meta( $post->ID, '_listing_map', true) );
			echo '</div><!-- .listing-map -->';
			}
		?>

		<?php
			if (function_exists('_p2p_init') && function_exists('agent_profiles_init') ) {
				echo'<div id="listing-agent">
				<div class="connected-agents">';
				aeprofiles_connected_agents_markup();
				echo '</div></div><!-- .listing-agent -->';
			}
		?>

	</div><!-- .entry-content -->

<?php
}

if (function_exists('equity')) {

	remove_action( 'equity_entry_header', 'equity_post_info', 12 );
	remove_action( 'equity_entry_footer', 'equity_post_meta' );

	remove_action( 'equity_entry_content', 'equity_do_post_content' );
	add_action( 'equity_entry_content', 'single_listing_post_content' );

	equity();

} elseif (function_exists('genesis_init')) {

	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 ); // HTML5
	remove_action( 'genesis_before_post_content', 'genesis_post_info' ); // XHTML
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' ); // HTML5
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' ); // XHTML
	remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 ); // HTML5
	remove_action( 'genesis_after_post', 'genesis_do_author_box_single' ); // XHTML

	remove_action( 'genesis_entry_content', 'genesis_do_post_content' ); // HTML5
	remove_action( 'genesis_post_content', 'genesis_do_post_content' ); // XHTML
	add_action( 'genesis_entry_content', 'single_listing_post_content' ); // HTML5
	add_action( 'genesis_post_content', 'single_listing_post_content' ); // XHTML

	genesis();

} else {

get_header(); ?>

	<div id="primary" class="content-area container inner">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="entry-meta">
							<?php
								if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
							?>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wp_listings' ), __( '1 Comment', 'wp_listings' ), __( '% Comments', 'wp_listings' ) ); ?></span>
							<?php
								endif;

								edit_post_link( __( 'Edit', 'wp_listings' ), '<span class="edit-link">', '</span>' );
							?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->

					
				<?php single_listing_post_content(); ?>

				</article><!-- #post-ID -->

			<?php 
				// Previous/next post navigation.
				wp_listings_post_nav();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
// get_sidebar( 'content' );
// get_sidebar();
get_footer();

}