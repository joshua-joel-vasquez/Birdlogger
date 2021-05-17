<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */



$UserID =  $_SESSION["id"];
$birdID= $_GET['birdID'];
$bird= $_GET['bird'];

$conn = mysqli_connect("localhost", "phpmyadmin", "Depaul123","phpmyadmin");

 // Check connection
 if (!$conn){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM Logbook WHERE UserID ='$UserID' AND BirdID = '$birdID'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    
    $sql_in ="UPDATE Logbook SET CountSeen = CountSeen +1 WHERE UserID ='$UserID' AND BirdID = '$birdID'"; 
}
else{
    // Attempt insert query execution
    $sql_in = "INSERT INTO Logbook (UserID, BirdID, BirdName, CountSeen) VALUES ('$UserID', '$birdID', '$bird', 1)";
    
}

if (mysqli_query($conn, $sql_in)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
// Close connection
mysqli_close($conn);
 


header("location: LogBook.php");

?>

 
