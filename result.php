<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Quiz Result" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Pushkar Bhattarai"  />
    <title>Quiz Result</title>
    <script src="scripts/result.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<!--*************HEADER***************-->     
    <?php include 'Inc_files/header.inc';?>
<!--*************NAVIGATION***************-->     
    <?php include 'Inc_files/menu.inc';?>
<!--*************ARTICLE***************-->    
    <article id="index">
        <h2>Result</h2>
        <label id="name">Your Name: </label><br>
        <label id="yourID">Your ID: </label><br>
        <label id="yourScore">Your Score: </label><label>out of 4</label>
        <label id="yourAttempt">on </label><label>attempt</label><br>
        <span id="note">Would you like to play quiz again? <a href="quiz.html">Click Me!</a></span>
    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc';?>
</body>
</html>