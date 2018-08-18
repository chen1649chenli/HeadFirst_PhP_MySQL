<?php
  // If the user is logged in, delete the cookie to log them out
  if(isset($_COOKIE['user_id'])){
    setcookie('user_id', time() - 100);
    setcookie('username', time() - 100);
  }
  // Redirect to the home page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']).'/index.php';
  header('Location: '.$home_url);
?>