'use strict';

jQuery(document).ready(function () {

    /*
     Fullscreen background
     */
    $.backstretch([
        "public/images/backgrounds/2.jpg",
        "public/images/backgrounds/3.jpg",
        "public/images/backgrounds/1.jpg"
    ], {duration: 3000, fade: 750});
});

/**
 * Handles admin log in
 * @param {type} e
 * @returns {undefined}
 */
loginForm.onsubmit = function(e){
    e.preventDefault();
    
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    
    if(!email || !password){
        var errMsg = !email ? "Enter your email" : "Enter your password";
        
        document.getElementById('errMsg').innerHTML = errMsg;
    }
    
    else{
        document.getElementById('errMsg').innerHTML = "Authenticating......";
	
	//call function to handle log in and get the returned data through a callback
	handleLogin(email, password, function(returnedData){
	   if(returnedData.status === 1){
                document.getElementById('errMsg').innerHTML = "Authenticated. Redirecting....";
                
                handleLoginRedirect();
            }

            else{
                //display error message
                document.getElementById('errMsg').innerHTML = returnedData.msg;
            }
        });
    }
};




function handleLoginRedirect(){
    //get the current url to check whether "red_uri" is set. Red_uri is suppose to hold details about the url user was trying to access
    //before been redirected to log in
    
    var currentUrl = window.location.href;
    
    //split the url using "red_uri", then get the 1st part after the red_uri (i.e. key 1)
    var uriToRedirectTo = currentUrl.split("red_uri=")[1] || "dashboard";
    
    //redirect to dashboard
    window.location.replace(appRoot+uriToRedirectTo);    
}
