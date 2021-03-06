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
        	<h1>BirdLogger<span class="off">Mountain</span></h1>
            <h2>The best bird database</h2>
            <p>&nbsp;</p>
            <?php  if (isset($_SESSION["loggedin"])) : ?>
                <h3> <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h3>
            <?php endif ?>
        </div>   
        
        <div id="menu">
            <ul>
                <li class="menuitem"><a href="Home.php">Home</a></li>
                <li class="menuitem"><a href="About.php">About</a></li>
                <li class="menuitem"><a href="BirdTool.php">BirdTool</a></li>
                <li class="menuitem"><a href="LogBook.php">LogBook</a></li>
                <li class="menuitem"><a href="Contact.php">Contact</a></li>
                <?php  if (!isset($_SESSION["loggedin"])) : ?>
  	                <li class="menuitem"><a href="login.php">Login</a></li>
                <?php endif ?>

                <?php  if (isset($_SESSION["loggedin"])) : ?>
                    <li class="menuitem"> <a href="logout.php">logout</a> </li>
                <?php endif ?>
            </ul>
        </div>
        
		<div id="content">
        	<h2>You may use this template in any manner you like. All I ask is that you leave the link back to my site at the bottom of the page. </h2>
        	<p>&nbsp;</p>
           	<p>&nbsp;</p>
       	  <h3>Template Notes</h3>
        	<p>The main image can be changed by either replacing the current image with another one of the same size (900x402), or using a new one of what ever dimensions you'd like.  If you choose the latter, you must open up style.css and change the dimensions of #mainpic, as well as the file name if that is different. If you would like to move the heading around in the above image, find &quot;#mainpic h1&quot; in style.css and modify it's &quot;left&quot; and &quot;top&quot; properties, this is also true for the h2 tag.</p>
        	<p>&nbsp;</p>
<h3>More information</h3>
        	<p>I decided to leave the content portion open for the templates users to do as they wish with a blank canvas. I don't like to restrict my users too much, and for this reason I leave the defining of any content related styles to you.</p>
        	<p>&nbsp;</p>
        	<h3>Template Notes</h3>
            <p>The main image can be changed by either replacing the current image with another one of the same size (900x402), or using a new one of what ever dimensions you'd like.  If you choose the latter, you must open up style.css and change the dimensions of #mainpic, as well as the file name if that is different. If you would like to move the heading around in the above image, find &quot;#mainpic h1&quot; in style.css and modify it's &quot;left&quot; and &quot;top&quot; properties, this is also true for the h2 tag.</p>
            <p>&nbsp;</p>
        	<h3>More information</h3>
            <p>I decided to leave the content portion open for the templates users to do as they wish with a blank canvas. I don't like to restrict my users too much, and for this reason I leave the defining of any content related styles to you.</p>
            <p>&nbsp;</p>
        	<p>&nbsp;</p>
        	<p>&nbsp;</p>
            <p>&nbsp;</p>
            
            <div id="footer"><h3>Bird database</div>
      </div>
   </div>
</body>
</html>
