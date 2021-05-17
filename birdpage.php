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
        

            <?php
                $birdid= $_GET['bird'];
                $servername = "localhost";
                $username = "phpmyadmin";
                $password = "Depaul123";
                $dbname = "phpmyadmin";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) 
                {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "select * FROM BIRDS where BIRDID ='$birdid'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) 
                {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        if (isset($_SESSION["loggedin"]))
                        {
                            echo '
                                     <h3><a href="addBird.php?birdID='.$row['BIRDID'].'&bird='.$row['NAME'].'">Add Bird to Logbook</a> &emsp; &emsp;
                                     <a href="deleteBird.php?birdID='.$row['BIRDID'].'&bird='.$row['NAME'].'">Remove Bird</a></h3>
                                ';
                        }

                        echo '</tr>
                        <td>
                            <img class="a" src="images\Birds\pictures\_'.$row['BIRDID'].'.jpg" alt="'.$row['NAME'].'" width="576" height="700"/>
                        
                        </td>
                        <tr>
                        <tr>
                        <td><h1>'.$row['NAME'].'</h1>
                        </td>
                        </tr>
                        <tr>
                            <td>'.$row['SCINAME'].'</td> <p>&nbsp;</p>
                
                        
                            <h3>Overview</h3> <td>'.$row['OVERVIEW'].'</td> <p>&nbsp;</p>
                
                        </tr>
                        <tr>
                            <h3>Range and Habitat</h3> <td>'.$row['HABITAT'].'</td> <p>&nbsp;</p>
                
                        </tr>
                        <tr>
                            <h3>Foraging and Feeding</h3>  <td>'.$row['FEED'].'</td> <p>&nbsp;</p>
                
                        </tr>
                        <tr>
                            <h3>Vocalization</h3> <td>'.$row['SOUND'].'</td> <p>&nbsp;</p>
                
                        </tr>
                        <tr>
                        <audio controls>
                            
                            <source src="images\Birds\audio\_'.$row['BIRDID'].'.mp3" type="audio/mpeg">
                             Your browser does not support the audio element. 
                        </audio>
                           
                
                        </tr>';
                        
                    }
                } 
                else 
                {
                echo "0 results";
                }

                mysqli_close($conn);
            ?>

        	<p>&nbsp;</p>
        	<p>&nbsp;</p>
            <p>&nbsp;</p>
            
      </div>
   </div>
</body>
</html>
