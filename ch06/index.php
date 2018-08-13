<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - High Scores</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Guitar Wars - High Scores</h2>
  <p>Welcome, Guitar Warrior, do you have what it takes to crack the high score list? If so, just <a href="addscore.php">add your own score</a>.</p>
  <hr />

<?php
  //require_once('appvars.php');
  //require_once('connectvars.php');
  // Connect to the database
  //$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $dbc = mysqli_connect('localhost', 'root', 'chen001649', 'guitar_war')
    or die('Error connecting to MySQL server.');
  // Retrieve the score data from MySQL
  $query = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC"
    or die('Error querying the database.');
  $data = mysqli_query($dbc, $query);
  // Loop through the array of score data, formatting it as HTML
  $i = 0;
  while ($row = mysqli_fetch_array($data)) {
    // Display the score data
    echo $row['score']."\t".$row['name']."\t".$row['date']."\n\n";
  }
  mysqli_close($dbc);
?>

</body>
</html>
