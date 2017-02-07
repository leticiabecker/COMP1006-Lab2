<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'persons');
/*set up and execute the sql select to get the data from db */
$sql = "SELECT * FROM records";
$result = mysqli_query($conn, $sql) or die('Error querying database.');
/* column headings - start table before loop*/
echo '<table border ="1"><tr><td>Record Name</td><td>Record Artist</td><td>Record Genre</td><td>Delete Record</td></tr>';

/*use a loop to cycle through data */
while ($row = mysqli_fetch_array($result)) {
  echo '<tr>
          <td>'. $row['record_name'] . '</td>
          <td>'. $row['record_artist'] . '</td>
          <td>'. $row['record_genre'] . '</td>
          <td><a href="delete_vinyl_pdo.php?record_id=' .$row['record_id'].'"onclick="return confirm(\'Are you sure\');"> Delete</td>
        </tr>';
}
echo '</table>';
/*disconnect */
mysqli_close($conn);

?>

</body>

</html>
