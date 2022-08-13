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

    $tablename = "dflynn_final_students";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<p>Connection failed: " . $conn->connect_error . "</p>");
    } else {
        echo "<p>Connection status: Connected</p>";

        // ON FORM SUBMIT
        if ($_POST) {
            $goback = "<p><a href='../index.html'>Go Back</a><p>";

            $sid = $_POST['sid'];
            $f_name = strtoupper($_POST['f_name']);
            $l_name = strtoupper($_POST['l_name']);
            $m_name = strtoupper($_POST['m_name']);
            $suffix = strtoupper($_POST['suffix']);
            $street = strtoupper($_POST['street']);
            $city = strtoupper($_POST['city']);
            $state = strtoupper($_POST['state']);
            $zip = $_POST['zip'];
            $email = strtoupper($_POST['email']);
            $h_phone = $_POST['h_phone'];
            $c_phone = $_POST['c_phone'];
            $dob = $_POST['dob'];
            $e_name = strtoupper($_POST['e_name']);
            $e_phone = $_POST['e_phone'];
            $e_rel = strtoupper($_POST['e_rel']);

            $record = "INSERT INTO $tablename (sid, f_name, l_name, m_name, suffix, street, city, state, zip, email, h_phone, c_phone, dob, e_name, e_phone, e_rel)" . 
            "VALUES ('$sid', '$f_name', '$l_name', '$m_name', '$suffix', '$street', '$city', '$state', '$zip', '$email', '$h_phone', '$c_phone', '$dob', '$e_name', '$e_phone', '$e_rel');";

            $result = $conn->query($record);

            if ($result === TRUE) {
                echo "<p>Records created successfully.</p>";
            } else {
                echo "<p>Failed to insert records. Error: " . mysqli_error($conn) . "</p>";
            }
        } else {
            // ADMIN RECORD ADD
            

            $sql = "INSERT INTO $tablename (sid, f_name, l_name, m_name, suffix, street, city, state, zip, email, h_phone, c_phone, dob, e_name, e_phone, e_rel) VALUES ('123456', 'DAVID', 'CROSBY', 'VICTOR', '', '123 FAKE STREET', 'SPRINGFIELD', 'IL', '02014', 'DCROSBY@GMAIL.COM', '5556667777', '8025558888', '1941-08-14', 'FLOYD CROSBY', '6667778888', 'FATHER');";
            $sql .= "INSERT INTO $tablename (sid, f_name, l_name, m_name, suffix, street, city, state, zip, email, h_phone, c_phone, dob, e_name, e_phone, e_rel) VALUES ('424242', 'STEPHEN', 'STILLS', 'ARTHUR', '', '456 HIGH STREET', 'DALLAS', 'TX', '93112', 'SSTILLS@GMAIL.COM', '9998887777', 'N/A', '1945-1-3', 'VERONIQUE SANSON', '1112223333', 'SPOUSE');";
            $sql .= "INSERT INTO $tablename (sid, f_name, l_name, m_name, suffix, street, city, state, zip, email, h_phone, c_phone, dob, e_name, e_phone, e_rel) VALUES ('098765', 'GRAHAM', 'NASH', 'WILLIAM', 'SR', '13 PRIVET DRIVE', 'ATLANTA', 'GA', '60344', 'GNASH@GMAIL.COM', 'N/A', '2223334444', '1942-2-2', 'JACKSON BROWNE', '7777777777', 'BROTHER')";

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