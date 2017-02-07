<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
  <article class="container">

    <?php
      // save database information
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "persons";

    //read the id of the user to Delete
      $record_id = $_GET['record_id'];

      try {
      	// instantiate a new connection object
      	$conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
      	// set the PDO error mode to exception
      	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      	//prepare sql and bind parameters
      	$stmt = $conn->prepare("DELETE FROM records WHERE record_id = $record_id");
      	$stmt->execute();

      	echo 'Record deleted successfully.<br /> <a href="results.php"> View Updated Vinyl Info</a>';
      }

      catch(PDOException $e) {
      	echo "ERROR: Could not able to execute " . $e->getMessage();
      }

      $conn = null;

    ?>

  </article>
</body>
</html>
