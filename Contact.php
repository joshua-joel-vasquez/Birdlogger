<?php
session_start();
?>
<!DOCTYPE >
<html >
<head>

<link rel="stylesheet" type="text/css" href="style.css" />
<title>BirdLogger | Bird database</title>
</head>

<body>
<div id="container">
        <div id="mainpic">
            <h1>BirdLogger</h1>
            <h2>The best bird database</h2>
            <?php  if (isset($_SESSION["loggedin"])) : ?>
                <h3> <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h3>
            <?php endif ?>
        </div>
        
        <div id="menu">
            <ul>
                <li class="menuitem"><a href="Home.php">Home</a></li>
                <li class="menuitem"><a href="BirdTool.php">Search</a></li>
                <li class="menuitem"><a href="LogBook.php">LogBook</a></li>
                <li class="menuitem"><a href="Contact.php">Contact</a></li>
                <?php  if (!isset($_SESSION["loggedin"])) : ?>
                    <li class="menuitem"><a href="login.php">Login</a></li>
                <?php endif ?>

                <?php  if (isset($_SESSION["loggedin"])) : ?>
                    <li class="menuitem"> <a href="logout.php">Logout</a> </li>
                <?php endif ?>
            </ul>
        </div>
        
        <div id="content">
            <h2>Please reach out to us with any questions or comments about our website</h2>
            <p>...just dont expect us to reply</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          <h3>Green Kingfisher Inc.</h3>
            <p>Visit our project webpage at <a href="https://green-kingfishers.github.io/">green-kingfishers.github.io</a> to view our work and keep up with our progress.</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
      </div>
   </div>
</body>
</html>
