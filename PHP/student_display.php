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
    <main class="container-fluid text-center p-3 mx-auto">
    <?php
    $goback = "<p><a href='../index.html'>Go Back</a><p>";

    include './credentials.php';

    $tablename = "dflynn_final_students";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<p>Connection failed: " . $conn->connect_error . "</p>");
    } else {
        $view = $conn->query("SELECT * FROM $tablename");

        echo "<h4>Records in <b>$tablename</b>:</h4>";
        echo "<table class='table table-striped table-hover table-small border border-1 rounded shadow'><thead>";
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
        <th>EC Name</th>
        <th>EC Phone</th>
        <th>EC Relation</th></tr></thead>";

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
            "</td><td>" . $row['e_name'] .
            "</td><td>" . $row['e_phone'] . 
            "</td><td>" . $row['e_rel'] .
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