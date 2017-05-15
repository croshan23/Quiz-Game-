/*
@author: Pushkar Bhattarai
@Ver: 1.0
@Date: 9/9/2016
@Info: The script is used to implement counter for Quiz and produce slide show with help of google ajaxapi.
*/
"use strict";
var total_seconds = 180; //number of seconds allowed to fill the form
var c_minutes = parseInt(total_seconds / 60);   //converting in minutes and display
var c_seconds = parseInt(total_seconds%60); //to display number of seconds

    function CheckTime(){
        document.getElementById("quiz-time-left").innerHTML
        = 'Time Left: ' + c_minutes + 'minutes' + c_seconds + 'seconds';    //displaying time left to auto submit
       
        if(total_seconds <= 0){ //If time is up then...
            
            var marks = 0;    //to store marks value            
            var counter = sessionStorage.getItem("count");  //is used to refer number of times same ID is being used
            var attempt = sessionStorage.getItem("attem");    //number of attempts used by any ID
            var id = sessionStorage.getItem("id");          //to assure same ID has attempted another try 
            
            // To check if same user has attempted next time
            if (id === document.getElementById("sid").value) {
                counter++;
                //alert("same user "+counter);
            }
            else {
                //If not same user, counter and attempt is reset
                counter = 0;
                attempt = 0;
            }
            // If same user has attempted 3 times, don't allow to participate
            if (attempt >= 3 && counter >= 2) {
                alert("Your attempts are Finished! Use different ID");
                document.getElementById("form1").reset();
                return false;
            }

            attempt++;  //For first attempt   

        //To obtain marks from quiz started
            var ans1 = document.getElementById("tq").value; //answer for 1st Q
            var ans2 = document.getElementById("rb2").checked; //answer for 2nd Q

            var ans31 = document.getElementById("cb1").checked; //answers for 3rd Q
            var ans32 = document.getElementById("cb2").checked;
            var ans33 = document.getElementById("cb3").checked;

            var ans4 = document.getElementById("dd").value; //answer for 4th Q   
            
        /*---------calculating marks for questions 1-4-----------*/
            if (ans2)
                marks++;
            if (ans1=="john")
                marks++;
            if (ans31 && ans32 && ans33)
                marks++;      
            if (ans4=="Distributed Computing")
                marks++;
            
        //data are sent to session storage to get used by results.html page 
            sessionStorage.setItem("first",document.getElementById("fname").value);
            sessionStorage.setItem("last",document.getElementById("lname").value);
            sessionStorage.setItem("id",document.getElementById("sid").value);
            sessionStorage.setItem("score",marks);
            sessionStorage.setItem("attem",attempt);
            sessionStorage.setItem("count",counter);    //counter is used to track the attempt of same user            
            
            setTimeout('document.forms.submit()',1);    // Auto submitting the form 
        }
        else{
            //Deducting a second time every seconds | To behave like Timer 
            total_seconds = total_seconds - 1;
            c_minutes = parseInt(total_seconds/60);
            c_seconds = parseInt(total_seconds%60);
            setTimeout("CheckTime()",1000);
        }
    }
setTimeout("CheckTime()",1000);