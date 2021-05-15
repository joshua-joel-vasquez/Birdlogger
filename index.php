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
        	<h2>Welcome to The BirdLogger Website!</h2>
            <h3>Powered by Green Kingfisher Inc.</h3>
        	<p>&nbsp;</p>
       	        <h3>How to Use</h3>
        	<p>Our site is an all-in-one tool to identify, and log birds you find in the wild! With a database of nearly one thousand North American birds, the possibilities for birding enthusiasts are endless. Search for birds by name on our Search page, and discover all kinds of neat information about them like their habitat and feeding habits. Even listen to their unique bird calls!</p>
        	<p>&nbsp;</p>
                <h3>Your Own Account</h3>
        	<p>Create an account and log-in to have access to your very own logbook, where you can add sightings of birds you spot in the wild. Keep tally of how many birds of each species you see in your birding ventures.</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
      </div>
   </div>
</body>
</html>
