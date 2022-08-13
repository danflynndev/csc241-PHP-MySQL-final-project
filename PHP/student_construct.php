<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMT241 Final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        
    </style>
</head>
<body>
    <main class="container text-center border border-1 border-secondary rounded">
    <?php

    $goback = "<p><a href='../admin.html'>Go Back</a><p>";

    include './credentials.php';

    $tablename = "dflynn_final_students";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<p>Connection failed: " . $conn->connect_error . "</p>");
    } else {
        echo "<p>Connection status: Connected</p>";

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
            e_name VARCHAR(55),
            e_phone VARCHAR(10),
            e_rel VARCHAR(15) /* relationship (mother, spouse, etc) */
            );";

        echo "<p>Attempting to create table: <b>$tablename</b></p>";

        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "<p>Table created successfully.</p>";
        } else {
            echo "<p>Something went wrong. Error: " . mysqli_error($conn) . "</p>";
        }
    }
    $conn->close();

    echo $goback;

    ?> 
    </main>
    
</body>
</html>