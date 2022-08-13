<?php
include '../PHP/credentials.php';


$tablename = "all_students";
$b = "<br/>";

$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
	
  die("Connection failed: " . $conn->connect_error);
}
else {	

echo "Connected successfully<br/><br/>";

echo $b . $b;

$sql = "SELECT * FROM $tablename";
$view = $conn->query($sql);

echo "Records in $tablename:";
    echo "<table border='1px'>";
    echo "<tr><th>ID</th>
    <th>First</th>
    <th>Last</th>
    <th>Middle</th>
    <th>Suffix</th>
    <th>Street</th>
    <th>City</th>
    <th>State</th>
    <th>Zip</th>
    <th>Email</th>
    <th>Home</th>
    <th>Cell</th>
    <th>DoB</th>
    <th>Guardian</th>
    <th>EC Name</th>
    <th>EC Phone</th>
    <th>EC Relation</th></tr>";

    while($row = mysqli_fetch_assoc($view)) {
        echo "<tr><td>" . $row['sid'] . 
        "</td><td>" . $row['f_name'] . 
        "</td><td>" . $row['l_name'] . 
        "</td><td>" . $row['m_name'] .
        "</td><td>" . $row['suffix'] . 
        "</td><td>" . $row['street'] .
        "</td><td>" . $row['city'] . 
        "</td><td>" . $row['state'] . 
        "</td><td>" . $row['zip'] . 
        "</td><td>" . $row['email'] . 
        "</td><td>" . $row['h_phone'] . 
        "</td><td>" . $row['c_phone'] . 
        "</td><td>" . $row['dob'] . 
        "</td><td>" . $row['guardian'] . 
        "</td><td>" . $row['e_name'] .
        "</td><td>" . $row['e_phone'] . 
        "</td><td>" . $row['e_rel'] .
        "</td></tr>";
    };
    echo"</table>";

}
$conn->close();
    ?>