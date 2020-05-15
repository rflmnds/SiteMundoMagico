<?php
	require("conexao/conecta.php");

	$target_dir = "img/uploads/";
	$target_file = $target_dir . basename($_FILES["img"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
  	$check = getimagesize($_FILES["img"]["tmp_name"]);
	if($check !== false) {
		$mensagem = "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		$mensagem = "File is not an image.";
		$uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
	  $mensagem = "Sorry, file already exists.";
	  $uploadOk = 0;
	}

	// Check file size
	if ($_FILES["img"]["size"] > 500000) {
	  $mensagem = "Sorry, your file is too large.";
	  $uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	  $mensagem = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk != 0) {
	  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
	    $success = "The file " . basename( $_FILES["img"]["name"]) . " has been uploaded.";
	    echo $sql = "INSERT INTO foto(idItens, Endereco) VALUES (" . $_GET['id'] . ", '" . basename($_FILES["img"]["name"]) .  "')";
	    $result = mysqli_query($conn, $sql);
	  } 
	  else {
	    $success = "Sorry, there was an error uploading your file.";
	  }
	}
	else {
    $success = "Sorry, there was an error uploading your file.";
  }
?>