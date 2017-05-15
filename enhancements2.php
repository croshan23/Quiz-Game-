<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="JavaScript Enhancements" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Pushkar Bhattarai"  />
    <title>JavaScript Enhancements in Website</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<!--*************HEADER***************-->     
    <?php include 'Inc_files/header.inc';?>
<!--*************NAVIGATION***************-->     
    <?php include 'Inc_files/menu.inc';?>
<!--*************ARTICLE***************-->    
    <article id="index">
        <h2>JavaScript Enhancements</h2>
        <ol>
            <li> Quiz Timer
                <ul>
                    <li>
                        The Timer is automatically loaded and started once we open quiz.html page.
                    </li>
                    <li>
                        For a programmer to implement counter in its page one should initialize variables like total number of time allowed in seconds. Later, convert it into minutes so display in the page. Further, a function is created that check time. Inside function two conditions is placed. First, if total time allowed is decremented to 0 then the form should automatically submit. Second, decrement a second from the total time in every instance of this function. Followed by calling the function itself for looping, so that it gives the essence of clock to the user. 
                    </li>
                    <li>Click following link to view its use in this website <a href="quiz.html">Quiz Timer</a></li>
                    <li>The code and technique was referred from the video tutorial by "Jiansen Lu" in following website. 
                        <a target="_blank" href="https://www.youtube.com/watch?v=VvBphozbias">Source Website</a>
                    </li>
                    
                </ul>
            </li>
            &nbsp;
            <li> Fading Image Slideshow
                <ul>
                    <li>The Fading Image Slideshow is automatically trigerred onece the webpage is loaded.</li>
                    <li>For a programmer to implement this in a website we have to list images that we want inside wrapper like
                        DIV with the help of "img" tag. Then assign an ID to the wrapper which can be called for
                        implementing animation. One can use CSS to design the location, alignment, margins, border, color 
                        and other features of the image. Finally, a JavaScript code is used to animate the slideshow like fade-in
                        and fade-out features, speed of fadding an image and others, which is present in enhancements2.js file. 
                        Also, the page should be linked to CSS file of w3school, where the sophisticated CSS code resides "http://www.w3schools.com/lib/w3.css".</li>
                    <li>Click following link to view its use in this website <a href="index.html#slideshow">SlideShow</a></li>
                    <li>The code and technique was referred from the w3schools website. 
                        <a target="_blank" href="http://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_slideshow_fading">Source Website</a>
                    </li>
                </ul>
            </li>            
        </ol>        
    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc';?>
</body>
</html>