<?php
require_once '../../includes/functions.php';
require_once '../../includes/database.php';
require_once '../../includes/user.php';
require_once '../../includes/session.php';

 $message="";

if($session->is_logged_in()) {
    redirect_to("index.php");
  }
  
  // Remember to give your form's submit tag a name="submit" attribute!
  if (isset($_POST['submit'])) { // Form has been submitted.
  
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Check database to see if username/password exist.
      $found_user = User::authenticate($username, $password);
      
    if ($found_user) {
      $session->login($found_user);
        //   log_action('Login', "{$found_user->username} logged in.");
      redirect_to("index.php");
    } else {
      // username/password combo was not found in the database
      $message = "Username/password combination incorrect.";
    }
    
  } else { // Form has not been submitted.
    $username = "";
    $password = "";
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Photo Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="../stylesheets/main.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <div id="header">
        <h1>Photo Gallery</h1>
    </div>
    <div id="main">
        <h2>Staff login</h2>
        <?php echo output_message($message); ?>
        
        <form action="login.php" method="post">
            <table>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" maxlength="30" value=<?php echo htmlentities($username); ?> >
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" id="password" maxlength="30" value=<?php echo htmlentities($password); ?>>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="login" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="footer">Copyright <?php echo date("Y", time()) ?></div>
</body>
</html>

<?php if(isset($database)) { $database->close_connection(); } ?>