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

    $tablename = "dflynn_final_coursecomp";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<p>Connection failed: " . $conn->connect_error . "</p>");
    } else {
        echo "<p>Connection status: Connected</p>";

        $sql = "CREATE TABLE $tablename (
            sid CHAR(6),
            cid VARCHAR(9),
            c_name VARCHAR(30) NOT NULL,
            credits CHAR(1) NOT NULL,
            grade CHAR(2) NOT NULL,
            semester CHAR(4),
            required CHAR(1) NOT NULL,
            PRIMARY KEY (sid, cid, semester),
            CONSTRAINT FOREIGN KEY (sid) REFERENCES dflynn_final_students (sid) ON DELETE CASCADE
            );";

        echo "<p>Attempting to create table: $tablename</p>";

        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "<p>Table created successfully.</p>";
        } else {
            echo "<p>Failed to create table. Error: " . mysqli_error($conn) . "</p>";
        }
    }
    $conn->close();

    echo $goback;

    ?> 
    </main>
    
</body>
</html>