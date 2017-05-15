<!doctype html>
<?php
    // Start the session
    ob_start();
    session_start();

    // Check to see if actually logged in. If not, redirect to login page
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header("Location: login.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Home Page of Quiz Supervisor" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Pushkar Bhattarai"  />
    <title>Quiz Supervisor</title>
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
        <!-----------FOR LOGGING OUT--------------->
        <form method="post" action="logout.php" style="padding-left:600px;padding-top:10px;">
            <input type="submit" value="Logout">
        </form>        
        <h2>Welcome Quiz Supervisor</h2>
        <p>Below are the description of Menu listed above</p>
        <ul>
            <li>Menu 1 -> List all attempts.</li>  
            <li>Menu 2 -> List all attempts for a particular student (given a student id OR name).</li> 
            <li>Menu 3 -> List all students (id, first and last name) who got 100% on their first attempt.</li> 
            <li>Menu 4 -> List all students (id, first and last name) got less than 50% on their third attempt.</li> 
            <li>Menu 5 -> Delete all attempts for a particular student (given a student id).</li> 
            <li>Menu 6 -> Change the score for a quiz attempt (given a student id).</li>        
        </ul>
    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc'; ?>
</body>
</html>