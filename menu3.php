<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Menu 3" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Pushkar Bhattarai"  />
    <title>Menu 1</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<!--*************HEADER***************-->     
    <?php include 'Inc_files/header.inc';?>
<!--*************NAVIGATION***************-->     
    <?php include 'Inc_files/menusuper.inc';?>
<!--*************ARTICLE***************-->  
    <article id="index">
    <!--************* article ***************-->   
        <!--------For Logging Out----------->
        <form method="post" action="logout.php" style="padding-left:600px;padding-top:10px;">
            <input type="submit" value="Logout">
        </form>         
        <h2>Menu 3 -> List all students (id, first and last name) who got 100% on their first attempt. </h2>
        <?php
            //CONNECTING TO MYSQL DATABASE USING MYSQLI CMDS
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pushkarDB";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn){
                die("Connection failed: " . mysqli_connect_error());
            }else{
                //echo "Connection Successfull!";
            }
        
            $sql = "SELECT student_id, firstname, lastname FROM attempts WHERE no_of_attempts='1' AND score='4'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<label> Student ID: " . $row["student_id"]." - First Name: ". $row["firstname"]." - Last Name: ". $row["lastname"]. "</label><br>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);        
        ?>
    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc'; ?>
</body>
</html>