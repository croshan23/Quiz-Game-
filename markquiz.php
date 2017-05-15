<!DOCTYPE HTML>  
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Quiz Result" />
        <meta name="keywords" content="HTML5, tags" />
        <meta name="author" content="Pushkar Bhattarai"  />
        <title>Quiz Result</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>
    <article id="index">  
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
        }

        // Creating Table
        $sql = "CREATE TABLE attempts (
        attempt_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        date_time TIMESTAMP,
        firstname VARCHAR(20) NOT NULL,
        lastname VARCHAR(20) NOT NULL,
        student_id VARCHAR(10),
        no_of_attempts INT(1),
        score INT(1)
        )";

//        if ($conn->query($sql) === TRUE) {
//            echo "<>Table attempts created successfully";
//        } 

        // define variables and set to empty values
        $fname = $lname = $studentid = $radiobutton = $textquestion = $checkbox1 = $checkbox2 = $checkbox3 = $dropdown = "";
        $nameErr = $lnameErr = $sidErr = $radiobtnErr = $tqErr = $cbErr = $marksErr = "";
        $marks = 0;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //FOR FIRST NAME  
            if (empty($_POST["fname"])) {
                $nameErr = "First name is required";
            } 
            else {
                $fname = test_input($_POST["fname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z_-]*$/",$fname)) {
                    $nameErr = "Only letters and white space allowed in first name"; 
                }
                else if(strlen($fname)>20){
                    $nameErr = "First name should be of maximum 20 characters, yours is ".strlen($fname);
                }                
            }
            //FOR LAST NAME
            if (empty($_POST["lname"])) {
                $lnameErr = "Last name is required";
            } 
            else {
                $lname = test_input($_POST["lname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z_-]*$/",$lname)) {
                    $lnameErr = "Only letters and white space allowed in last name"; 
                }
                else if(strlen($lname)>20){
                    $lnameErr = "Last name should be of maximum 20 characters, yours is ".strlen($lname);
                }                
            }   
            //FOR STUDENT ID
            if (empty($_POST["studentid"])) {
                $sidErr = "Student ID is required";
            } 
            else {
                $studentid = test_input($_POST["studentid"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9]*$/",$studentid)) {
                    $sidErr = "Only numbers are allowed in student ID"; 
                }
                else if(strlen($studentid)<7 || strlen($studentid)>10){
                    $sidErr = "Student ID should be of 7 or 10 digit, yours is".strlen($studentid);
                }
            }
            //FOR TEXT QUESTION
            if (empty($_POST["textquestion"])) {
                $tqErr = "Answer Question 1";
            }
            else {
                $textquestion = test_input($_POST["textquestion"]);
            }             
            //FOR RADIO BUTTON
            if (empty($_POST["radiobutton"])) {
                $radiobtnErr = "Answer Question 2";
            }
            else {
                $radiobutton = test_input($_POST["radiobutton"]);
            }       
            //FOR CHECK BOX
            if (empty($_POST["checkbox1"]) && empty($_POST["checkbox2"]) && empty($_POST["checkbox3"])) {
                $cbErr = "Answer Question 3";
            }
            else {
                if(!empty($_POST["checkbox1"])) $checkbox1 = test_input($_POST["checkbox1"]);
                if(!empty($_POST["checkbox2"])) $checkbox2 = test_input($_POST["checkbox2"]);
                if(!empty($_POST["checkbox3"])) $checkbox3 = test_input($_POST["checkbox3"]);
            } 
            //FOR DROP DOWN
            $dropdown = test_input($_POST["dropdown"]);
            //FOR MARKING
            if($radiobutton == "Web 2.0")
                ++$marks;
            if($textquestion == "john" || $textquestion == "John")
                ++$marks;
            if($checkbox1 == "Ubiquitous Connectivity" && $checkbox2 == "Network Computing" && $checkbox3 == "Open Technologies")
                ++$marks;
            if($dropdown == "Distributed Computing")
                ++$marks;
            
        //VALIDATION STARTS FROM HERE    
            //IF NO ANY ERROR MESSAGE IS GENERATED
            if($nameErr == "" && $lnameErr == "" && $sidErr == "" && $radiobtnErr == "" && $tqErr == "" && $cbErr == ""){
                //IF MARKING IS GREATER THAN 0
                if($marks>0){
                    $attemptCount = 0; //to count number of attempts
                    
                    $sqlCheckAttempts = "SELECT no_of_attempts FROM attempts WHERE student_id=$studentid"; //Getting number of attempts for current student ID
                    $result = mysqli_query($conn, $sqlCheckAttempts);   //Generating query
                    
                    //IF EXISTING STUDENT ID IS USED TO PLAY QUIZ
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $row = $result->fetch_assoc();
                        $attemptCount = $row["no_of_attempts"];
//------------------------------------------------------------                        
                        //IF ATTEMPT IS LESS THEN 3
                        if($attemptCount < 3){
//--------------------------------------------------UPDATE IS REQ        
                            ++$attemptCount;
                            $sqlUpdate = "UPDATE attempts SET no_of_attempts='$attemptCount', score='$marks' WHERE student_id=$studentid";

                            if (mysqli_query($conn, $sqlUpdate)) {
                                echo "Record updated successfully";
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }                           

                            //DISPLAYING TO USER
                            echo "<h1 style=\"color:blue;padding-left:20px;font-size:28px;\"> Result! </h1>";
                            echo "<label>Name: $fname $lname<label><br>";
                            echo "<label>Student ID: $studentid<label><br>";
                            echo "<label>Score: $marks<label><br>";
                            echo "<label>Total Attempts: $attemptCount<label><br>";

                            if($attemptCount<3)echo "<label><a href=\"quiz.php\">PlayAgain</a></label><br>";
                        }
                        //IF ATTEMPT is GREATER THAN 3
                        else{
                            echo "<h1> Your Quiz attempts are finished! </h1>";
                            echo "<h1> Contact Quiz Supervisor! </h1>";
                            echo "<label><a href=\"quiz.php\">Go Back</a></label><br>";
                        }                        
                        
                    }
                    //IF DATA IS NEW WITH NEW STUDENT ID
                    else{
                        
                        $sqlInsert = "INSERT INTO attempts (firstname, lastname, no_of_attempts, score, student_id)
                        VALUES ('$fname', '$lname', '1', '$marks', '$studentid')";
                        
                        if (mysqli_query($conn, $sqlInsert)) {
                            echo "New record created successfully";
                            ++$attemptCount;
                        } else {
                            echo "New Rec Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
                        }  
         
                        //DISPLAYING TO USER
                        echo "<h1 style=\"color:blue;padding-left:20px;font-size:28px;\"> Result! </h1>";
                        echo "<label>Name: $fname $lname<label><br>";
                        echo "<label>Student ID: $studentid<label><br>";
                        echo "<label>Score: $marks<label><br>";
                        echo "<label>Total Attempts: $attemptCount<label><br>";
                        
                        if($attemptCount<3)echo "<label><a href=\"quiz.php\">PlayAgain</a></label><br>";                        
                    }
                          
                }
                //IF MARKING IS < 0
                else{
                    echo "<h1> Your Marks is 0, Please Retry! </h1>";
                    echo "<label><a href=\"quiz.php\">GoBack</a></label><br>";
                }
                //CLOSING MYSQL CONNECTION
                mysqli_close($conn);
                //echo "connection closed";                 
            }
            else{
                //IF ERROR MESSAGE IS GENERATED
                echo "<h1> Please Correct Below Issues... </h1>";
                echo "<label>$nameErr</label><br>";
                echo "<label>$lnameErr</label><br>";
                echo "<label>$sidErr</label><br>";
                echo "<label>$tqErr</label><br>";
                echo "<label>$radiobtnErr</label><br>";
                echo "<label>$cbErr</label><br>";
                echo "<label><a href=\"quiz.php\">GoBack</a></label><br>";
            }
        }
        //DATA SANITIZATION
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
    ?>
    </article>    
    </body>
</html>