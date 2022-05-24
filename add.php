<?php
require 'links/connection.php';

// echo "whoami:";
// echo exec('whoami');

if (isset($_POST['submit'])) {

	// $ads_id = $_POST['ads_id'];
	$title = $_POST['title'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$product_condition = $_POST['product_condition'];
	$category = $_POST['category'];
	$location = $_POST['location'];
	$image = $_POST['image'];

	$target_dir = "uploads/";
	$epoch = microtime(true);
	$target_file = $target_dir .$epoch. basename($_FILES["image"]["name"]);
	$image_path = $target_dir.$epoch.htmlspecialchars(basename($_FILES["image"]["name"]));
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if ($check !== false) {
			echo ("File is an image - " . $check["mime"] . ".");
			$uploadOk = 1;
		} else {
			die ("File is not an image.");
			$uploadOk = 0;
		}
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		die ("Sorry, file already exists.");
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["image"]["size"] > 500000) {
		die ("Sorry, your file is too large.");
		$uploadOk = 0;
	}

	// Allow certain file formats
	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif"
	) {
		die ("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		die ("Sorry, your file was not uploaded.");
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo ("The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.");
		} else {
			die ("Sorry, there was an error uploading your file.");
		}
	}

	$sql = "INSERT INTO advertise (`title`,`price`,`description`,
   `product_condition`,`category`,`location`,`image_path`, `filename`)	
    VALUES ('$title','$price',
    '$description','$product_condition','$category', '$location','$image_path', 'random')";
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
		echo "<script> location.href='home.php'; </script>";

	} else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	}
	mysqli_close($conn);
} else {
	echo "request not working here";
}
