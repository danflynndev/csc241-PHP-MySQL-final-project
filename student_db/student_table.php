<?php
$b = "<br/>";


include '../PHP/credentials.php';


$tablename = "all_students";

$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
	
  die("Connection failed: " . $conn->connect_error);
}
else {	

echo "Connected successfully<br/><br/>";

$sql = "CREATE TABLE $tablename (
	sid CHAR(6) PRIMARY KEY,
    f_name VARCHAR(30) NOT NULL,
    l_name VARCHAR(30) NOT NULL,
    m_name VARCHAR(25),
    suffix VARCHAR(3),
    street VARCHAR(35) NOT NULL,
    city VARCHAR(35) NOT NULL,
    state CHAR(2) NOT NULL,
    zip CHAR(5) NOT NULL,
    email VARCHAR(30) NOT NULL,
    h_phone CHAR(10),
    c_phone CHAR(10),
    dob DATE NOT NULL, /* check date format coming from index */
    guardian VARCHAR(55),
    e_name VARCHAR(55),
    e_phone VARCHAR(10),
    e_rel VARCHAR(15) /* relationship (mother, spouse, etc) */
    );";

    
    $result = $conn->query($sql);
        
    if ($result === TRUE) {
        echo "Table created successfully." . $b;
    } else {
        echo "Something went wrong. Error: " . mysqli_error($conn) . $b;
    }

/* ***** DESCRIBE TABLE - uncomment this section to view a diagram of the table ***** */
    //query to describe table
    $describe = $conn->query("DESCRIBE maindata.$tablename");
    // display results
    echo $b . $b;
    echo "Structure of table '$tablename':";
    echo "<table>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    while($row = mysqli_fetch_assoc($describe)) {
        echo "<tr><td>" . $row['Field'] . "</td><td>" . $row['Type'] . "</td><td>" . $row['Null'] . "</td><td>" . $row['Key'] . "</td><td>" . $row['Default'] . "</td></tr>";
        
    }
    echo"</table>";


/* ***** DROP TABLE - if you need to re-create the table, uncomment this section and run the script ***** */
    // $drop = $conn->query("DROP TABLE $tablename");
    // if ($drop === TRUE) {
    //     echo "Table dropped successfully.";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }

}

$conn->close();	

?>