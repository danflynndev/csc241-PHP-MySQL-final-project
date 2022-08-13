<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMT241 Final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container text-center">
    <?php

    $goback = "<p><a href='../admin.html'>Go Back</a><p>";

    include './credentials.php';

    $tablename = "dflynn_final_coursecomp";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<p>Connection failed: " . $conn->connect_error . "</p>");
    } else {
        echo "<p>Connection status: Connected</p>";

        // ON FORM SUBMIT
        if ($_POST) {

            $goback = "<p><a href='../index.html'>Go Back</a><p>";

            $sid = $_POST['sid'];
            $cid = $_POST['cid'];
            $c_name = strtoupper($_POST['c_name']);
            $credits = $_POST['credits'];
            $grade = $_POST['grade'];
            $semester = strtoupper($_POST['semester']);
            $required = $_POST['required'];

            $record = "INSERT INTO $tablename (sid, cid, c_name, credits, grade, semester, required)" . 
            "VALUES ('$sid', '$cid', '$c_name', '$credits', '$grade', '$semester', '$required');";

            $result = $conn->query($record);

            if ($result === TRUE) {
                echo "<p>Records created successfully.</p>";
            } else {
                echo "<p>Failed to insert records. Error: " . mysqli_error($conn) . "</p>";
            };

        } else {
            // ADMIN RECORDS

            $sql = "INSERT INTO $tablename (sid, cid, c_name, credits, grade, semester, required) VALUES ('424242', 'CMT111-WB', 'HTML5 & DREAMWEAVER', '3', 'A', 'FA20', 'Y');";
            $sql .= "INSERT INTO $tablename (sid, cid, c_name, credits, grade, semester, required) VALUES ('424242', 'CMT117-01', 'XML', '3', 'A-', 'SP20', 'Y');";
            $sql .= "INSERT INTO $tablename (sid, cid, c_name, credits, grade, semester, required) VALUES ('424242', 'CMT225-HB', 'JQUERY', '3', 'B+', 'FA21', 'Y')";

            $result = $conn->multi_query($sql);

            do {
                if ($result = $conn->store_result()) {
                    var_dump($result->fetch_all(MYSQLI_ASSOC));
                    $result->free();
                }
            } while ($conn->next_result());

            // if ($result === TRUE) {
            //     echo "<p>Records created successfully.</p>";
            // } else {
            //     echo "<p>Failed to insert records. Error: " . mysqli_error($conn) . "</p>";
            // };

            if (mysqli_error($conn)) {
                echo "<p>Failed to insert records. Error: " . mysqli_error($conn) . "</p>";
            } else {
                echo "<p>Records created successfully.</p>";
            }
        };
    };
    $conn->close();

    echo $goback;
    ?> 
    </main>
    
</body>
</html>