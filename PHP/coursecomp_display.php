<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMT241 Final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .table {
            font-size: .8rem !important;
        }
    </style>
</head>
<body>
    <main class="container text-center p-3 mx-auto">
    <?php
    
    $goback = "<p><a href='../index.html'>Go Back</a><p>";

    include './credentials.php';

    $tablename = "dflynn_final_coursecomp";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<p>Connection failed: " . $conn->connect_error . "</p>");
    } else {
        $sql = "SELECT * FROM $tablename";
        $view = $conn->query($sql);

        echo "<h4>Records in <b>$tablename</b>:</h4>";
        echo "<table class='table table-striped table-hover table-small border border-1 rounded shadow'><thead>
        <tr><th>Student ID</th>
        <th>Course ID</th>
        <th>Name</th>
        <th>Credits</th>
        <th>Grade</th>
        <th>Semester</th>
        <th>Required</th></tr></thead>";
    while($row = mysqli_fetch_assoc($view)) {
        
        echo "<tr><td>" . $row['sid'] . 
        "</td><td>" . $row['cid'] . 
        "</td><td>" . $row['c_name'] . 
        "</td><td>" . $row['credits'] .
        "</td><td>" . $row['grade'] . 
        "</td><td>" . $row['semester'] .
        "</td><td>" . $row['required'] . 
        "</td></tr>";
    };
        echo "</table>";

    };
    $conn->close();

    echo $goback;
    ?> 
    </main>

</body>
</html>