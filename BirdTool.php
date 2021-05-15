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
        
            <form action="" method="post">
                <table>
                    <tr>
                        <td><input type="text" name="search"  placeholder="Enter your search keywords" autocomplete="off" ></td>
                        <td><input type="submit" name="submit" value="Search" ></td>
                    </tr>
                </table>
            </form>
            <div id="scrollbox">
            <?php
                $search_value=$_POST["search"];
                $con=new mysqli("localhost", "phpmyadmin", "Depaul123", "phpmyadmin");
                if($con->connect_error)
                {
                    echo 'Connection Faild: '.$con->connect_error;
                }else
                    {
                        $sql="select * FROM BIRDS where NAME like '%$search_value%'";

                        $res=$con->query($sql);

                        while($row=$res->fetch_assoc())
                        {
                            echo '<tr>
                                            <td><h3 style="padding-left:10px;"><a href="birdpage.php?bird='.$row['BIRDID'].'">'.$row['NAME'].'</a></h3></td>
                                    </tr>';
                        }       

                    }
            ?>
            </div>
            
            <p>&nbsp;</p>

        </div>
   </div>
</body>
</html>


