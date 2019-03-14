// called to validate new admins signing up on admin.php page
function checkNewSignUp() 
{
    if (checkNewUsername() && checkNewPassword() && checkConfirmPassword()){
    	return true;
    } else {
    	return false;
    }
}


//regex on line 15 is to limit username to alphanumeric charaters of length 5 to 15 
function checkNewUsername() {
 var username=document.NewForm.NewUsername.value;
  var pattern=/^[a-z0-9]{5,15}$/;
  if (username=="") {
    alert ("Username can't be blank");
    document.NewForm.NewUsername.focus();
    return false;
  } else if (!pattern.test(username)) {
    alert ("Only username with length 5-15 & Alphanumeric characters allowed");
    document.NewForm.NewUsername.value="";
    document.NewForm.NewUsername.focus();
    return false;
  }
  return true;
}

//regex on line 32 is to limit password to numeric digits of length 4 
function checkNewPassword() {
var password=document.NewForm.NewPassword.value;
  var pattern=/^[0-9]{4}$/;
  if (password=="") {
    alert ("Password can't be blank");
    document.NewForm.NewPassword.focus();
    return false;
  } else if (!pattern.test(password)) {
    alert ("Only 4 numeric digits password allowed!");
    document.NewForm.NewPassword.value="";
    document.NewForm.NewPassword.focus();
    return false;
  }
  return true;
}

function checkConfirmPassword() {
var password=document.NewForm.NewPassword.value;
var confirmedPassword = document.NewForm.ConfirmedPassword.value;
  if (confirmedPassword=="") {
    alert ("Please confirm your password!");
    document.NewForm.ConfirmedPassword.focus();
    return false;
  } else if (password != confirmedPassword) {
    alert ("Password and Confirmed Password are not the same");
    document.NewForm.NewPassword.value="";
    document.NewForm.ConfirmedPassword.value="";
    document.NewForm.NewPassword.focus();
    return false;
  }
  return true;
}


// called to validate entries made for loggin in by existing admins
// validation in front end to avoid overhead of calling a server agan and again
function checkLogin() 
{
    if (checkUsername() && checkPassword()){
    	return true;
    } else {
    	return false;
    }
}

function checkUsername() {
 var username=document.jform.Username.value;
  var pattern=/^[a-z0-9]{5,15}$/;
  if (username=="") {
    alert ("Provide your username to login");
    document.jform.Username.focus();
    return false;
  } else if (!pattern.test(username)) {
    alert ("Provide your username i.e. 5-15 Alphanumeric characters");
    document.jform.Username.value="";
    document.jform.Username.focus();
    return false;
  }
  return true;
}

function checkPassword() {
	var password=document.jform.Password.value;
	  var pattern=/^[0-9]{4}$/;
	  if (password=="") {
	    alert ("Please provide your password to login");
	    document.jform.Password.focus();
	    return false;
	  } else if (!pattern.test(password)) {
	    alert ("Give your 4-digits numeric password");
	    document.jform.Password.value="";
	    document.jform.Password.focus();
	    return false;
	  }
	  return true;
}