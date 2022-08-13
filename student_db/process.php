<?php
$b = "<br/>";

//form variables
$sid = $_POST['sid'];
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$m_name = $_POST['m_name'];
$suffix = $_POST['suffix'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$email = $_POST['email'];
$h_phone = $_POST['h_phone'];
$c_phone = $_POST['c_phone'];
$dob = $_POST['dob'];
$guardian = $_POST['guardian'];
$e_name = $_POST['e_name'];
$e_phone = $_POST['e_phone'];
$e_rel = $_POST['e_rel'];
// Bizland connection
	
include '../PHP/credentials.php';


 $conn = new mysqli($servername, $username, $password, $database);

  $record = "INSERT INTO all_students (sid, f_name, l_name, m_name, suffix, street, city, state, zip, email, h_phone, c_phone, dob, guardian, e_name, e_phone, e_rel)" . 
  "VALUES ('$sid', '$f_name', '$l_name', '$m_name', '$suffix', '$street', '$city', '$state', '$zip', '$email', '$h_phone', '$c_phone', '$dob', '$guardian', '$e_name', '$e_phone', '$e_rel')";

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . $b);
  }
  else {
      echo "Connected..." . $b;
      echo $b;
  
      $insert = $conn->query($record);

      if ($insert === TRUE) {
          echo "1 row inserted." . $b;
      } else {
          echo "Failed to insert record. Error: " . mysqli_error($conn) . $b;
      }
      echo $b;
    }

// $dbc = mysqli_connect($servername, $username, $password, $database) // connection
//   or die('Error: Could not connect to MySQL server.');

// $result = mysqli_query($dbc, $query)
//   or die('Error querying database.');

//   mysqli_close($dbc);
// if ($result === TRUE) {
//   echo '<h1>Data uploaded successfully!</h1>';
// }
  

  // "VALUES ('123456789','Mr','Filburt', 'D','Shellback','42','Somerville' ,'MA', '02143','filbert@turtle.au','8675309','8675309','1987-04-12','Mr. Bighead','Mrs. Bighead','8675309','lala')";
?>