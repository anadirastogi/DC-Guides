
// helps in validating all the entries of contact us form before heading to server
function checkForm() 
{
  var name;
  if (checkName() && checkPhone() && checkEmail() && checkBirth() && checkMessage()){
    name = document.jform.fullname.value;
    return true;
  } else {
    return false;
  }
}


function checkName()  {
  var fullName=document.jform.fullname.value;
  var pattern=/[0123456789~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/;
  if (fullName=="") {
    alert ("Please type in your name.");
    document.jform.fullname.focus();
    return false;
  } else if (pattern.test(fullName)) {
    alert ("No numbers or special characters are allowed in name.");
    document.jform.fullname.value="";
    document.jform.fullname.focus();
    return false;
  }
  return true;
}


function checkBirth() {
  var birthDate=document.jform.birthdate.value;
  var minDate=new Date("1/1/1900");
  var todayDate=new Date();
  if (birthDate=="") {
    alert ("Please enter your birthdate between 1/1/1900 and today i.e " + todayDate.toLocaleDateString());
    document.jform.birthdate.focus();
    return false;
  } 
  else {
    birthDate=new Date(birthDate);
    if (isNaN(birthDate.valueOf())) {
      alert ("Please enter a valid birthdate between 1/1/1900 and today i.e " + todayDate.toLocaleDateString());
      document.jform.birthdate.value="";
      document.jform.birthdate.focus();
      return false; 
    } else if (birthDate<minDate || birthDate>todayDate){
      alert ("Please enter your birthdate between 1/1/1900 and today i.e " + todayDate.toLocaleDateString());
      document.jform.birthdate.value="";
      document.jform.birthdate.focus();
      return false; 
    }
  }
  return true;
}


function checkEmail () {

  var email = document.jform.email.value; 
  if(email.length == 0) {
    alert ("Please enter your email");
    document.jform.email.focus();
    return false;
  }
  if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
    alert("Please enter a valid email")
    document.jform.email.value="";
    document.jform.email.focus();
    return false;

  }
  return true;
}

function checkPhone() {
  var phone = document.jform.phone.value;

  if(phone.length == 0) {
    alert('Phone number is required');
    document.jform.phone.focus();
    return false;
  }

  if(phone.length != 10) {
    alert('Phone number cannot be more or less than 10 digits');
    document.jform.email.value="";
    document.jform.phone.focus();
    return false;
  }

  if(!phone.match(/^[0-9]{10}$/)) {
    alert('Only digits in phone number please');
    document.jform.email.value="";
    document.jform.phone.focus();    
    return false;
  }
  return true;
}



function checkMessage() {
  var message = document.jform.message.value;

  if (message.length == 0) {
    alert('Your message cannot be empty');
    document.jform.message.focus();
    return false;
  }

  return true;

}


