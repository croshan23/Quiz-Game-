/*
@author: Pushkar Bhattarai
@Ver: 1.0
@Date: 9/9/2016
@Info: The script is used to validate the form with respect to following,
    - All questions should be answered
    - At least one right answer should be there
    - Calculate total marks obtained
    - A user can only attempt 3 times
    - Storing user data to session storage
*/
"use strict";

/*------------Initializing Variables-----------------*/
var gErrorMsg = ""; //to display error msgs via alert
var marks = 0;    //to store marks value
var counter = sessionStorage.getItem("count");  //is used to refer number of times same ID is being used
var attempt = sessionStorage.getItem("attem");    //number of attempts used by any ID
var id = sessionStorage.getItem("id");          //to assure same ID has attempted another try 

/*------------Form Validation Starts Here-------------------*/
function validateForm() {
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
        return false;
    }
    
/*-----------If a user is eligible to participate---------------*/
    attempt++;  //For first attempt    
    var isAllOK = false;   //by default, form can't be submitted
    gErrorMsg = ""; // to rest error message for next session
    marks = 0;    //marks is 0 initially
    
    //getting boolean value from RadioButton and Checkbox checking function
    var radioButtonOK = isRadioButtonChecked();
    var checkBoxOK = isCheckBoxChecked();              
    
    if (radioButtonOK && checkBoxOK) {   //if both question 2 and 3 are answered
        
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
               
      
    /*---------Check If Marks is Greater Than Zero or Not?-------------------*/    
        if (marks>0) {
            //if marks is greater than zero
            //data are sent to session storage to get used by results.html page 
            sessionStorage.setItem("first",document.getElementById("fname").value);
            sessionStorage.setItem("last",document.getElementById("lname").value);
            sessionStorage.setItem("id",document.getElementById("sid").value);
            sessionStorage.setItem("score",marks);
            sessionStorage.setItem("attem",attempt);
            sessionStorage.setItem("count",counter);    //counter is used to track the attempt of same user
   
            isAllOK = true; //if everything is good, form is submited because of true value
        }
        else {
            marks = 0; //value of marks is reset for another attempt
            alert("Your Marks is 0. Please redo the Test"); // Direct user to atleast give one right answer
        }
    }
    
    else {
        alert(gErrorMsg);   //if radiobutton and Checkbox is not checked, alert message is shown
        gErrorMsg = "";     //value of error message is reset
        marks = 0;          //marks obtained is reset for another try
        isAllOK = false;    //false means, can't send the form
    }
    return isAllOK; //sends true/false control submission of the form
}
/*
To check whether any of the checkbox is checked or not
*/
function isCheckBoxChecked() {
	var selected = false;
	var ischeck1 = document.getElementById("cb1").checked;
    var ischeck2 = document.getElementById("cb2").checked;
    var ischeck3 = document.getElementById("cb3").checked;
    
    if (ischeck1 || ischeck2 || ischeck3) {//if anyone is checked, it is ok!
        selected = true;
    }
    else {
		selected = false; //if not checked, feedback is given to answer Q3
		gErrorMsg = gErrorMsg + "Please Answer Question 3\n";        
    }
   return selected;
}

/*
To check whether any of the radio buttons is checked or not
*/
function isRadioButtonChecked() {
	var selected = false;
	var isWeb1 = document.getElementById("rb1").checked;
    var isWeb2 = document.getElementById("rb2").checked;
    var isWeb3 = document.getElementById("rb3").checked;
	
	if (isWeb1 || isWeb2 || isWeb3) {//if anyone is checked, it is ok!
        selected = true;   
    }
	else {
		selected = false; //if not checked, feedback is given to answer Q2
		gErrorMsg = gErrorMsg + "Please Answer Question 2\n";
	}
   return selected;
}
/*
This function gets the form element by ID
and when the element is submited validateForm()
function is called
*/
function init() {
    var form1 = document.getElementById("form1");
    form1.onsubmit = validateForm;
}
//When the page is laoded init() is called
window.onload = init; 

