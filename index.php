<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">

        <lable>First Name</label>
            <input type="text" name="fullname">

            <label> Roll No </label>
            <input type="text" name="rnum">

            <label>Phone Numberr</label>

            <input type="text" name="pnum">
            <input type="submit" name="submit">
    </form>

    <?php

    if (isset($_POST["submit"])) {
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "demo-form1";


        // setting new connection

        $conn = new mysqli($servername, $username, $password, $dbname);
        //checking error

        if ($conn->connect_error) {
            die("Connectyion Failed" . $conn->connect_error);
        }
        //setting form name attribute to database 
        //note use apaache and mysql --- number(bigint)  create table there
        $fullname = $_POST["fullname"];
        $rnum = $_POST["rnum"];
        $pnum = $_POST["pnum"];


        //inserting into table
        $sql = "INSERT INTO userinfo(fullname,pnum,rnum)VALUES('$fullname','$pnum','$rnum')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();
    }
    ?>
</body>

</html>
