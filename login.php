<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to logbook page
                            header("location: LogBook.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 




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
            <div id="wrapper">
                <h2>Login</h2>
                <p>Please fill in your credentials to login.</p>
                <p>&nbsp;</p>

                <?php 
                if(!empty($login_err)){
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }        
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    <p>&nbsp;</p>
                    <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                </form>
            </div>
            
            
      </div>
   </div>
</body>
</html>