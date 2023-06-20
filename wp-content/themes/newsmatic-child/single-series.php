<?php

get_header();
global $post;

$series_id = $post->ID;
$temp[0] = (string)$series_id; 

$args = array(

	'post_status' => 'publish',
	'post_type' => 'match',
	'meta_key' => 'series',
	'meta_value' => serialize($temp)

);

$matches = get_posts($args);
?>

<table>	
<tr style="background: red; color:white">
	<th>Series</th>
	<th>Match</th>
	<th>Location</th>
	<th>Time</th>
	<th>Team A</th>
	<th>Team B</th>
</tr>
<?php
foreach($matches as $match):
	$match_title = $match->post_title;
	$post_meta = get_post_meta($match->ID);
	if(!empty($post_meta)){
		$time = $post_meta['time'][0];
		$address = $post_meta['address'][0];
		$teamA_id = $post_meta['team_a'][0];
		// print_r($teamA_id);
		// exit;
		$teamB_id = $post_meta['team_b'][0];

	}
	
	
?>
<tr>
	<td><?php echo $post->post_title; ?></td>
	<td><?php echo $match_title; ?></td>
	<td><?php echo $address; ?></td>
	<td><?php echo $time; ?></td>
	<td><?php echo get_the_title($teamA_id); ?></td>
	<td><?php echo get_the_title($teamB_id); ?></td>
	<!-- <td></td> -->
</tr>
<?php

endforeach;	
?>

</table>
<?php get_footer(); ?>