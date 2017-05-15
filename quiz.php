<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Third part of the Website" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Pushkar Bhattarai"  />
    <title>Quiz on Web 3.0</title>
<!--    <script src="scripts/quiz.js"></script>
    <script src="scripts/enhancements.js"></script> -->
    <link rel="stylesheet" type="text/css" href="style/style.css">   
</head>
<body>
<!--*************HEADER***************-->     
    <?php include 'Inc_files/header.inc';?>
<!--*************NAVIGATION***************-->     
    <?php include 'Inc_files/menu.inc';?>
<!--*************ARTICLE***************-->    
    <article id="quiz">
        <div style="font-weight: bold; float: right; margin: 5px" id="quiz-time-left"></div>
        <h2>Quiz on Web 3.0</h2>
        <form id="form1" name="forms" method ="post" action="markquiz.php" novalidate="novalidate">
            <fieldset>
                <legend>Personal Details</legend>
                    <p>
                        <!--*************First Name***************--> 
                        <label for="fname">First Name</label> <input type="text" name="fname" id="fname" required="required"
                                                                     pattern="^[A-Za-z- ]+$" placeholder="Your First Name" >
                        <!--*************Last Name***************--> 
                        <label for="lname">Last Name</label> <input type="text" name="lname" id="lname" required="required"
                                                                    placeholder="Your Last Name">
                    </p>
                        <!--*************Student ID***************--> 
                    <p><label for="sid">Student ID</label> <input type="text" name="studentid" id="sid" required="required" placeholder="Your 7-10 Digit Student ID"></p>
            </fieldset>
            
            <fieldset>
                <legend>Questions</legend>
                    <!--*************Text Question***************--> 
                    <p><label for="tq">Who suggested the name Web 3.0?</label> <input type="text" name="textquestion" id="tq" maxlength="20" required="required" placeholder="Enter Your Answer">
                    </p>
                    
                    <!--*************Radio Button Question***************-->
                    <p class="buttons">What is current version of Web? <br>
                        <label for="rb1">Web 1.0<input type="radio" id="rb1" name="radiobutton" value="Web 1.0"/></label>
                        <label for="rb2">Web 2.0<input type="radio" id="rb2" name="radiobutton" value="Web 2.0"/></label>
                        <label for="rb3">Web 3.0<input type="radio" id="rb3" name="radiobutton" value="Web 3.0"/></label>
                    </p>           
                
                    <!--*************CheckBox Question***************-->
                    <p class="buttons">Choose all technologies supported by web 3.0. <br>
                        <label for="cb1">Ubiquitous Connectivity<input type="checkbox" id="cb1" name="checkbox1" value="Ubiquitous Connectivity"/></label>
                        <label for="cb2">Network Computing<input type="checkbox" id="cb2" name="checkbox2" value="Network Computing"/></label>
                        <label for="cb3">Open Technologies<input type="checkbox" id="cb3" name="checkbox3" value="Open Technologies"/></label>
                    </p>
                
                    <!--*************DropDown Question***************-->
                    <p>
                        <label for="dd">What is P2P and Grid Computing called?</label>
                        <select id="dd" name="dropdown">
                            <option value="Network Computing">Network Computing</option>
                            <option value="Distributed Computing">Distributed Computing</option>
                            <option value="Open Technolgies">Open Technolgies</option>
                        </select>
                    </p>
                
                    <!--*************Range Question***************-->
                    <p><label>Please scale this website from 0 to 10
                        <input type="number" name="Website Scale" min="0" max="10" step="1" value="5" />
                        </label>
                    </p>                
                
                    <!--*************Submit and Reset***************-->
                    <p>
                        <input type="submit" value="Submit Survey"/>
                        <input type="reset" value="Reset" />
                    </p>
            </fieldset>            
        </form>

    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc';?>
</body>
</html>