<?php
session_start();

if (!isset($_SESSION["loggedin"]))
{
    header("location: login.php");
}

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
            <p>&nbsp;</p>
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
            <div id="logbook">
        	<?php

                $UserID =  $_SESSION["id"];

                $conn = mysqli_connect("localhost", "phpmyadmin", "Depaul123","phpmyadmin");

                // Check connection
                if (!$conn){
                die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM Logbook WHERE UserID ='$UserID'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){

                    echo '<h1> Logbook </h1><ul>';

                
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <li>
                            <span class="log"><a href="birdpage.php?bird='.$row['BirdID'].'">'.$row['BirdName'].'</a></span>
                            sightings: '.$row['CountSeen'].'
                            <a href="addBird.php?birdID='.$row['BirdID'].'&bird='.$row['BirdName'].'">Add Bird</a> &emsp;
                            <a href="deleteBird.php?birdID='.$row['BirdID'].'&bird='.$row['BirdName'].'">Remove Bird</a>
                        </li>';
                    }

                    echo '</ul>';
                }
                else{
                echo "0 results";
                
                }

                
                // Close connection
                mysqli_close($conn);
            
            ?>
            </div>
            &nbsp;
        </div>
    </div>
</body>
</html>