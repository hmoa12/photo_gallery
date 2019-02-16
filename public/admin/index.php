<?php

require_once '../../includes/functions.php';
require_once '../../includes/session.php';
if (!$session->is_logged_in()) { redirect_to('login.php'); }

// if(isset($_GET['submit'])) {
//     $session->logout();
// }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../stylesheets/main.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <div id="header">
        <h1>Photo Gallery</h1>
    </div>
    <div id="main">
        <h2>Menu</h2>
    </div>
    <div id="footer">Copyright <?php  echo date("Y", time()) ?></div>
</body>
</html>