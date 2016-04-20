<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
(function($) {
function render_map( $el ) {
	var $markers = $el.find('.marker');
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
		draggable: false,
		scrollwheel: false
	};
	var map = new google.maps.Map( $el[0], args);
	map.markers = [];
	$markers.each(function(){
    	add_marker( $(this), map );
	});
	center_map( map );
}
function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}
$(document).ready(function(){
	$('#acf-map').each(function(){
		render_map( $(this) );
	});
});
})(jQuery);
</script>

<?php
$store_query = new WP_Query (
	array (
		'post_type' => 'page',
		'pagename' => 'store',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	)
);
if ( $store_query -> have_posts() ):
	while ( $store_query->have_posts() ) : $store_query->the_post();
?>

			<div id="store">
				<div class="contents">
					<h1><span class="title-en"><?php echo esc_html(ucfirst($post->post_name)); ?></span><?php the_title(); ?></h1>
					<?php the_content(); ?>
					
					<div id="store-information">
						<table>
							<tr>
								<th>店舗名</th>
								<td><?php the_field('name'); ?></td>
							</tr>
							<tr>
								<th>住所</th>
								<td>〒<?php the_field('zip'); ?><br><?php the_field('address'); ?> <?php the_field('bldg'); ?></td>
							</tr>
							<tr>
								<th>電話番号</th>
								<?php if(is_mobile()): ?>
								<td><a href="tel:<?php the_field('tel'); ?>"><?php the_field('tel'); ?></a></td>
								<?php else: ?>
								<td><?php the_field('tel'); ?></td>
								<?php endif; ?>
							</tr>
							<tr>
								<th>定休日</th>
								<td><?php the_field('holiday'); ?></td>
							</tr>
							<tr>
								<th>営業時間</th>
								<td><?php the_field('open_close'); ?></td>
							</tr>
							<?php if(get_field('last_hours')): ?>
							<tr>
								<th>最終受付時間</th>
								<td><?php the_field('last_hours'); ?></td>
							</tr>
							<?php endif; ?>
							<?php if(get_field('reception_time')): ?>
							<tr>
								<th>受付時間</th>
								<td><?php the_field('reception_time'); ?></td>
							</tr>
							<?php endif; ?>
						</table>
					</div><!-- /#store-information -->
					<?php 
					$location = get_field('google_map');
					if( !empty($location) ):
					?>

					<div id="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
					<div id="open-map">
						<a href="http://maps.google.com/maps?q=<?php echo $location['address']; ?>+<?php the_field('name'); ?>" target="_blank">Googleマップで開く</a>
					</div>
					<?php endif; ?>
		
				</div><!-- /.contents -->
			</div><!-- /.inner -->
<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>
