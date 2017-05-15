<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="View All" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Pushkar Bhattarai"  />
    <title>View All</title>
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
        <h2>View All Records</h2>
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
        
            $sql = "SELECT no_of_attempts, date_time, firstname, lastname, student_id, score FROM attempts";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<label> - Date: " . $row["date_time"]. "</label><br>";
                    echo "<label> - Student ID: " . $row["student_id"]. "</label><br>";
                    echo "<label> - Firstname: " . $row["firstname"]. "</label><br>";
                    echo "<label> - Lastname: " . $row["lastname"]. "</label><br>";
                    echo "<label> - Marks: " . $row["score"]. "</label><br>";
                    echo "<label> - No of Attempts: " . $row["no_of_attempts"]. "</label><br>";
                    echo "-----------------------------------------------------------<br>";
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