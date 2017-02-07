<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Records</title>
</head>

<body>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'persons');

if (!$conn)  {
		die('Could not connect: ' . mysqli_error());
}

//create a variable we can use to determine if there is any missing information
$formOk = true;

// check for Record Name value
if (empty($_POST['record_name'])) {
	echo "Record Name is required </n>";
	$formOk  = false;
}

// check for Record artist value
if (empty($_POST['record_artist'])) {
	echo "Record artist is required </n>";
	$formOk  = false;
}

// check for Record genre value
if (empty($_POST['record_genre'])) {
	echo "Record genre is required </n>";
	$formOk  = false;
}

// if we have both a name and an email value, keep going
if ($formOk == true) {
	$record_name = mysqli_real_escape_string($conn, $_POST['record_name']);
	$record_artist = mysqli_real_escape_string($conn, $_POST['record_artist']);
  $record_genre = mysqli_real_escape_string($conn, $_POST['record_genre']);

	/*set up the SQL insert command, then execute it to save the data */
	$sql = "INSERT INTO records(record_name, record_artist, record_genre) VALUES ('$record_name','$record_artist','$record_genre');";
	/*use the connection in order for the statement to run */
	$result = mysqli_query($conn, $sql);

	// display success message only when the query is successful
	if ($result === TRUE) {
		echo 'Records added successfully. <br /> <a href="results.php"> View Records </a>';
	}

	else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}

}

mysqli_close($conn);

?>

</body>

</html>
