<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Menu 6" />
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
        <h2>Menu 6 -> Change the score for a quiz attempt (given a student id). </h2>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $name = test_input($_POST["name"]); //user input data
                $marks = test_input($_POST["marks"]);
                if($marks>4)    //IF USER ENTER MARKS > 4
                    $marks=4;
                
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
                $sql = "UPDATE attempts SET score='$marks' WHERE firstname='$name'";

                if (mysqli_query($conn, $sql)) {    //IMPLEMENTING DATA QUERY
                    echo "Marks updated successfully";
                } else {
                    echo "Error updating Marks: " . mysqli_error($conn);
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
            <label>Enter Marks: </label><input type="text" name="marks"> max allowed '4'
            <br><br>
            <input type="submit" name="submit" value="Submit">            
        </form>    
    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc'; ?>
</body>
</html>