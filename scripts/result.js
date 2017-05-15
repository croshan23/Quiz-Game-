/*
@author: Pushkar Bhattarai
@Date: 9/9/2016
@Info:
Loading variables from the current session
Use it to display in results.html
It is necessary to track attempt of user
Plus, necessary to send data from
one page to another
*/
"use strict";
var init=function(){
    
 /*------Getting name,id,score and attempts from session storage---------*/    
    var fname = sessionStorage.getItem("first");
    var lname = sessionStorage.getItem("last");
    var scores = sessionStorage.getItem("score");
    var id = sessionStorage.getItem("id");
    var attem = sessionStorage.getItem("attem");
    
    //referring label from HTML page and displaying firstname and lastname
    var name = document.getElementById("name");
    name.appendChild(document.createTextNode(fname+" "+lname));
    
    //referring label from HTML page and displaying ID
    var yourID = document.getElementById("yourID");
    yourID.appendChild(document.createTextNode(id));
    
    //referring label from HTML page and displaying obtained scores
    var yourScore = document.getElementById("yourScore");
    yourScore.appendChild(document.createTextNode(scores));
    
    //referring label from HTML page and number of attempts 
    var yourAttempt = document.getElementById("yourAttempt");
    yourAttempt.appendChild(document.createTextNode(attem)); 
    
}

window.onload = init;