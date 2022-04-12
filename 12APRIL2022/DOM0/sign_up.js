//document.getElementById("myform").onsubmit = validate;

// function validate() {
//   console.log("validate");
//   return false;
// }

//Name validation
document.getElementById("name").onblur = validateName;

function validateName() {
  var name = document.getElementById("name").value;

  // check wheter the name is empty or not
  if (name == "") {
    alert("Name cannot be empty");
    return false;
  } else {
    //check pattern firstname middlename lastname
    var pos = name.search(/^[A-Za-z]{2,}(\s[A-Za-z]{2,}\.)?\s[A-Za-z]{2,}$/);
    if (pos == -1) {
      alert("Name should be in the format of Firstname Middlename Lastname");
      return false;
    } else {
      alert("name is valid");
      return true;
    }
  }
}

// email validation
document.getElementById("email").onchange = validateEmail;

function validateEmail() {
  // check if the email is empty or not
  var email = document.getElementById("email").value;
  if (email == "") {
    alert("Email cannot be empty");
    return false;
  }
  // check if the email is valid or not
  else {
    var pos = email.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
    if (pos == -1) {
      alert("Email is not valid");
      return false;
    } else {
      alert("Email is valid");
      return true;
    }
  }
}

//validate password
document.getElementById("confirm_password").onblur = validatePassword;

function validatePassword() {
  //check if the passwords are empty or not
  var password = document.getElementById("password").value;
  var confirm_password = document.getElementById("confirm_password").value;
  if (password == "" || confirm_password == "" || password.length < 6) {
    alert("Passwordmust be minimum 6 characters");
    return false;
  } else {
    //check if the passwords are same or not
    if (password !== confirm_password) {
      alert("Passwords do not match");
      return false;
    } else {
      alert("Passwords match");
      return true;
    }
  }
}
