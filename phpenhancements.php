<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="PHP Enhancements" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Pushkar Bhattarai"  />
    <title>PHP Enhancements in Website</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<!--*************HEADER***************-->     
    <?php include 'Inc_files/header.inc';?>
<!--*************NAVIGATION***************-->     
    <?php include 'Inc_files/menu.inc';?>
<!--*************ARTICLE***************-->    
    <article id="index">
        <h2>Enhancements Used</h2>
        <ol>
            <li> Secure Login to Quiz Supervisor Page
                <ul>
                    <li>
                        As the Quiz Supervisor has access to all the records of quiz and can also modify or change it
                        , it is indispensable to make it secure. Or else, a player can access the page and exploit it
                        accordingly.
                    </li>
                    <li>
                        In order to implement it, one should have knowledge about managing sessions in PHP language.
                        In login page username and password text field is created for users. when user enter data and
                        click submit button, at the backend php will extract elegible username and password from 'admin'
                        table in database. user entered credentials is validated with database credentials. If matched,
                        quizsupervisor page is opened and session is maintained. One can disconnect the session using
                        'logout' tab.
                    </li>
                    <li>The code and technique was referred from the video tutorial by "Good Pie Tutorials" in following website. 
                        <a target="_blank" href="https://www.youtube.com/watch?v=1UA6vC3kRYQ">Source Website</a>
                    </li>
                    
                </ul>
            </li>
            &nbsp;
            <li> View All Records in Single Page
                <ul>
                    <li>
                        This functionality will display all the records that are contained in "attempts" table in single page.
                        One can view name, time stamp, student id, score and number of attempts of every user that have logged
                        in in a single page in well manner. This function is required as coursework has not included in its
                        requirements. Using this Supervisor can view full detailed information of everyone which other requirements
                        has not fulfilled.
                    </li>
                    <li>
                        It is implemented by following steps. First a connection to database is maintained. Then using MySQLI query
                        all records inside "attempts" table is extracted and is "echoed" in the webpage in well formed manner. Then
                        the database connection is closed.
                    </li>
                    <li>The code and technique was referred from w3schools in following website. 
                        <a target="_blank" href="http://www.w3schools.com/php/php_mysql_intro.asp">Source Website</a>
                    </li>                    
                </ul>
            </li>             
        </ol>
    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc';?>
</body>
</html>