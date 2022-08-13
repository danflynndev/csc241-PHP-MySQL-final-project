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

    include('./PHP/credentials.php');

    $tablename = "dflynn_final_students";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<p>Connection failed: " . $conn->connect_error . "</p>");
    } else {
        echo "<p>Connection status: Connected</p>";
    }

    echo $goback;
    ?> 
    </main>
    
</body>
</html>