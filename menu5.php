<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Menu 5" />
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
        <h2>Menu 2 -> Delete all attempts for a particular student (given a student id). </h2>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $name = test_input($_POST["name"]); //user input data
//....................................................
                
                //CONNECTING TO MYSQL DATABASE USING MYSQLI CMDS
                $servername = "localhost";//server
                $username = "root";//username
                $password = "";//password
                $dbname = "pushkarDB";//database name

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Check connection
                if (!$conn){
                    die("Connection failed: " . mysqli_connect_error());
                }else{
                    //echo "Connection Successfull!";
                }
            //DELETE DATA QUERY
                $sql = "DELETE FROM attempts WHERE firstname='$name'";

                if (mysqli_query($conn, $sql)) {    //IF DELETE SUCCESSFULLY
                    echo "Attempt Record deleted successfully";
                } else {
                    echo "No Records Found ";
                }

                mysqli_close($conn);   //closing MYSQL connection             
            }
        //DATA SANITATION
            function test_input($data) {
                $data = strtolower($data);
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }                
        ?>
    <!------------FORM FOR USER INPUT--------------->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <label>First Name: </label><input type="text" name="name">
            <br><br>
            <input type="submit" name="submit" value="Submit">            
        </form>    
    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc'; ?>
</body>
</html>