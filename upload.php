<?php
if(isset($_POST['title']) && isset($_FILES['video']['name']) && $_FILES['video']['error'] == 0){
	$title = $_POST['title'];
	$fileName = $_FILES['video']['name'];
	$fileTmpName = $_FILES['video']['tmp_name'];
	$fileType = $_FILES['video']['type'];
	$fileSize = $_FILES['video']['size'];
	$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
	$allowedExtensions = array("mp4", "avi", "flv", "wmv");
	
	if(in_array($fileExt, $allowedExtensions)){
		if($fileSize <= 1000000000){ // Maximum file size: 1GB
			$videoPath = 'videos/' . $fileName;
			move_uploaded_file($fileTmpName, $videoPath);
			$videoUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $videoPath;
			$data = array('title' => $title, 'url' => $videoUrl);
			$jsonData = json_encode($data);
			file_put_contents('videos.json', $jsonData . PHP_EOL, FILE_APPEND);
		}
		else{
			echo "Maximum file size allowed is 1GB.";
		}
	}
	else{
		echo "Invalid file format. Only mp4, avi, flv, and wmv formats are allowed.";
	}
}
else{
	echo "Title and video file are required.";
}
?>
