<?php
/**
 * Map View Title Template
 * The title template for the map view of events.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/map/title-bar.php
 *
 * @package TribeEventsCalendar
 * @version 4.4.28
 * @since   4.4.28
 *
 */
?>

<div class="tribe-events-title-bar">

	<!-- Map View Title -->
	<?php do_action( 'tribe_events_before_the_title' ); ?>
	<h1 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h1>
	<?php do_action( 'tribe_events_after_the_title' ); ?>

</div>