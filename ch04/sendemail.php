<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Make Me Elvis - Send Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<?php
  if (isset($_POST['submit'])){
    $subject = $_POST['subject'];
    $text = $_POST['elvismail'];
    $from = 'chen1649chenli@gmail.com';
    $output_form = false;

    if (empty($subject) || empty($text)){
      echo 'You miss to enter the subject or/and text! <br />';
      $output_form = true;
    }

    if (!empty($subject) && !empty($text)){
      $dbc = mysqli_connect('localhost', 'root', 'chen001649', 'elvis_store')
        or die('Error connecting to MySQL server.');
      $query = "SELECT * FROM email_list";
      $result = mysqli_query($dbc, $query)
        or die('Error querying database.');
      while ($row = mysqli_fetch_array($result)){
        $to = $row['email'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $msg = "Dear $first_name $last_name,\n$text";
        mail($to, $subject, $msg, 'From:' . $from);
        echo 'Email sent to: ' . $to . '<br />';
      }
      mysqli_close($dbc);
    }
  }else{
    $output_form = true;
  }

  if ($output_form){
?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label for="subject">Subject of email:</label><br />
      <input id="subject" name="subject" type="text" size="30" value="<?php echo $subject; ?>" /><br />
      <label for="elvismail">Body of email:</label><br />
      <textarea id="elvismail" name="elvismail" rows="8" cols="40"><?php echo $text; ?></textarea><br />
      <input type="submit" id="submit" name="submit" value="Submit" />
    </form>
<?php
  }
?>

</body>
</html>
