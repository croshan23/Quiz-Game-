<!doctype html>
<?php

    // Start the session
    session_start();

    $username = "";
    $password = "";

    // Error message
    $error = "";

    //CONNECTING TO MYSQL DATABASE USING MYSQLI CMDS
    $servername = "localhost";
    $susername = "root";
    $spassword = "";
    $dbname = "pushkarDB";

    // Create connection
    $conn = mysqli_connect($servername, $susername, $spassword, $dbname);

    // Check connection
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo "Connection Successfull!";
    }

    $sql = "SELECT username, password FROM admin WHERE id='1'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $username = $row["username"];
            $password =$row["password"];
            
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
//---------------------------

    // Checks to see if the user is already logged in. If so, refirect to correct page.
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $error = "success";
        header('Location: quizsupervisor.php');
    } 
        
    // Checks to see if the username and password have been entered.
    // If so and are equal to the username and password defined above, log them in.
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == $username && $_POST['password'] == $password) {
            $_SESSION['loggedIn'] = true;
            header('Location: quizsupervisor.php');
        } else {
            $_SESSION['loggedIn'] = false;
            $error = "Invalid username and password!";
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Login Page" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Pushkar Bhattarai"  />
    <title>Introduction: Web 3.0</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<!--*************HEADER***************-->     
    <?php include 'Inc_files/header.inc';?>
<!--*************NAVIGATION***************-->     
    <?php include 'Inc_files/menu.inc';?>
<!--*************ARTICLE***************-->  
    <article id="index">
    <!--************* article ***************-->          
        <h2>Login</h2>
        <!-- form for login -->
        <form method="post" action="login.php">
            <label for="username">Username: </label>
            <input type="text" name="username" id="username"><br/>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password"><br/>
            <label><input type="submit" value="Log In!"></label>
        </form>
        <!-- Output error message if any -->
        <?php echo $error; ?>
                
    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc'; ?>
</body>
</html>