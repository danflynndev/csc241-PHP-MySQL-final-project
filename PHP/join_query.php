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
        <form action="join_query.php" method="POST" class="border p-3 mb-3 rounded shadow">
            <label for="sid">Student ID:</label>
            <input type="text" id="sid" name="sid" max-length="6">
            <input type="submit" value="Search">
        </form>
    <?php
    
    $goback = "<p><a href='../index.html'>Go Back</a><p>";

    include './credentials.php';

    $tablename = "dflynn_final_coursecomp";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($_POST) {

        if ($conn->connect_error) {
            die("<p>Connection failed: " . $conn->connect_error . "</p>");
        } else {

            $sid = $_POST['sid'];

            $sql = "SELECT CONCAT(f_name, ' ', l_name) AS name, c_name, cid, semester, grade, credits, required FROM dflynn_final_students JOIN dflynn_final_coursecomp USING (sid) WHERE sid = $sid;";


            $view = $conn->query($sql);

            echo mysqli_error($view);

            echo "<h4>Showing course records for student <b>$sid</b>:</h4>";
            echo "<table class='table table-striped table-hover table-small shadow border border-1 rounded'><thead>
            <tr><th>Name</th>
            <th>Course Name</th>
            <th>Course ID</th>
            <th>Semester</th>
            <th>Grade</th>
            <th>Credits</th>
            <th>Required</th></tr></thead>";

            while($row = mysqli_fetch_assoc($view)) {
                
                echo "<tr><td>" . $row['name'] . 
                "</td><td>" . $row['c_name'] . 
                "</td><td>" . $row['cid'] . 
                "</td><td>" . $row['semester'] .
                "</td><td>" . $row['grade'] . 
                "</td><td>" . $row['credits'] .
                "</td><td>" . $row['required'] . 
                "</td></tr>";
            };

                echo "</table>";
    
        };
        $conn->close();
    };
    

    echo $goback;
    ?> 
    </main>

</body>
</html>