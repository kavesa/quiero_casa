<?php
use Aws\S3\S3Exception;


require '../app/start.php';

if (isset($_FILES['pocFile'])) {
	$file = $_FILES['pocFile'];
	$name = $file['name'];
	$tmp_name = $file['tmp_name'];

	$extension = explode('.', $name);
	$extension = strtolower(end(explode('.', $name)));
	
	$key = md5(uniqid());

	$tmp_file_name = "{$key}.{$extension}";

	$tmp_file_path = "../files/{$tmp_file_name}";

	move_uploaded_file($tmp_name, $tmp_file_path);

	try {
		
		$s3 -> putObject([
			'Bucket' => $config['s3']['bucket'],
			'Key' => "uploads/{$name}",
			'Body' => fopen($tmp_file_path, 'rb'),
			'ACL' => 'public-read'
		]);

		//unlink($tmp_file_path);
	}
	catch (S3Exception $e) {
		die("Error");
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Upload POC</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="pocFile" value="" placeholder="" >
		<input type="submit" name="" value="Upload">
	</form>
</body>
</html>