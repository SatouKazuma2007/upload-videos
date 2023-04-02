<?php
header('Content-Type: application/json');
if (file_exists('videos.json')) {
	$videos = file('videos.json');
	$videoArray = array();
	foreach ($videos as $video) {
		$videoArray[] = json_decode($video, true);
	}
	echo json_encode($videoArray);
}
?>
