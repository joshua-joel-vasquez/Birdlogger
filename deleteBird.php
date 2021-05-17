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
$sql = "SELECT * FROM Logbook WHERE UserID ='$UserID' AND BirdID = '$birdID' AND CountSeen > 1";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
  //Update the count to be 1 less than its current value
    
  $sql_in ="UPDATE Logbook SET CountSeen = CountSeen -1 WHERE UserID ='$UserID' AND BirdID = '$birdID'"; 

  if (mysqli_query($conn, $sql_in)) {
    echo "record deleted successfully";
    } 
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else{
  $sql = "SELECT * FROM Logbook WHERE UserID ='$UserID' AND BirdID = '$birdID'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){

    // Delete the whole record
    $sql_in = "DELETE FROM Logbook WHERE UserID ='$UserID' AND BirdID = '$birdID' ";

    if (mysqli_query($conn, $sql_in)) {
      echo "record deleted successfully";
      } 
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  }
  else{
    //do nothing
  }
    
}


// Close connection
mysqli_close($conn);
 


header("location: LogBook.php");

?>

 
