<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fourth Page of the Website" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Pushkar Bhattarai"  />
    <title>Enhancements in Website</title>
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
            <li> Psuedo Classes
                <ul>
                    <li>
                        Psuedo Classes is used to attract users about the elements used in website.
                        For instance, an anchor tag makes the link underlined by default. Which doesn't
                        look good. Hence, we remove underline from it. The result makes the link look as
                        other text in website. Hence, using psuedo class we can highlight the links accordingly
                        to make user know about the links.
                    </li>
                    <li>
                        The use of psuedo class to change the appearance of Links and highlight it makes the site
                        more user friendly. It can distint links from other texts.
                    </li>
                    <li>I have used psuedo class in navigation menus and email links in footer. Click the following
                        to view. <a href="#Home">Navigation Menu</a> &nbsp;&nbsp; <a href="#Footer">Footer</a>
                    </li>
                    
                </ul>
            </li>
            &nbsp;
            <li> PlaceHolder Attribute
                <ul>
                    <li>Place Holder attributes helps new users of web to interact with the input forms to collect data.</li>
                    <li>The website uses this feature to felicitate users to insert required data in form elements</li>
                    <li>Click following link to view its use in this website <a href="quiz.html#fname">PlaceHolder</a></li>
                    
                </ul>
            </li>            
        </ol>
    </article>
<!--*************FOOTER***************-->      
    <?php include 'Inc_files/footer.inc';?>
</body>
</html>