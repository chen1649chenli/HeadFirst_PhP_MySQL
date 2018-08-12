<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Elvis Store - Add Email</title>
  </head>
  <body>

    <?php
      $first_name = $_POST['firstname'];
      $last_name = $_POST['lastname'];
      $email = $_POST['email'];
      $dbc = mysqli_connect('localhost', 'root', 'chen001649', 'elvis_store')
        or die('Error connecting to MySQL server.');
      $query = "INSERT INTO email_list (first_name, last_name, email) " .
        "VALUES ('$first_name', '$last_name', '$email')";
      $result = mysqli_query($dbc, $query)
        or die('Error querying database.');
      mysqli_close($dbc);
      echo 'Thanks for submitting the form.<br />';
      echo 'Your first name is: ' . $first_name;
      echo ' and your last name is: ' . $last_name . '<br />';
      echo 'Your registered email: ' . $email . '<br />';
      echo 'Customer added!'
    ?>
  </body>
</html>
