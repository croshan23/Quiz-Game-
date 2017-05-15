/*
@author: Pushkar Bhattarai
@Ver: 1.0
@Date: 9/9/2016
@Info: The script is used to display faded slideshow in index page.
*/

"use strict";
/*-------Slide Show Code--------------*/
var myIndex = 0;

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides"); //getting images by class name
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none"; //initially doesn't display images
    }
    myIndex++;  //increases after each recursion
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block"; //displaying images finally
    setTimeout(carousel, 9000); //recursion of function and speed of fadding
}

window.onload = carousel; //upon loading function is called
