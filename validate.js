function validateloginForm() {

    let email = document.forms["loginForm"]["email"].value;
    let password = document.forms["loginForm"]["password"].value;

    if (email == "" && password == "") {
        alert("Enter both E-mail and Password!");
        return false;
    }
    if (email == "") {
        alert("Enter Your E-mail!");
        document.loginForm.email.focus();
        return false;
    }
    if (password == "") {
        alert("Enter Your Password!");
        document.loginForm.password.focus();
        return false;
    } else if (/\s/g.test(password)) {
        alert("Password Can Not Contain WhiteSpace!");
        document.loginForm.password.focus();
        return false;
    }

}

function validateregisterForm() {

    let name = document.forms["registerForm"]["r_name"].value;
    let email = document.forms["registerForm"]["r_email"].value;
    let password = document.forms["registerForm"]["r_password"].value;
    let cpassword = document.forms["registerForm"]["r_cpassword"].value;

    if (name == "" && email == "" && password == "" && cpassword == "") {
        alert("Please Fill All Registration Data!");
        return false;
    }


    if (name == "" || name[0] == ' ') {
        alert("Enter Your Name!");
        document.registerForm.r_name.focus();
        return false;
    }

    if (email == "") {
        alert("Enter Your E-mail!");
        document.registerForm.r_email.focus();
        return false;
    } else if (/\s/g.test(email)) {
        alert("E-mail Can Not Contain WhiteSpace!");
        document.registerForm.r_email.focus();
        return false;
    }

    if (password == "") {
        alert("Enter Your Password!");
        document.registerForm.r_password.focus();
        return false;
    } else if (/\s/g.test(password)) {
        alert("Password Can Not Contain WhiteSpace!");
        document.registerForm.r_password.focus();
        return false;
    }

    if (cpassword == "") {
        alert("Confirm Your Password!");
        document.registerForm.r_cpassword.focus();
        return false;
    }


    const mailformat = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (!mailformat.test(email)) {
        alert("Invalid E-mail Address!");
        return false;
    }

    if (password != cpassword) {
        alert("Password doesn't Match!");
        return false;

    }

}

function showPassword(input) {

    var fieldType = document.getElementById(input);

    if (fieldType.type === "password") {
        fieldType.type = "text";
    } else {
        fieldType.type = "password";
    }
}

function validateaddcar() {

    let flag =0;
    var format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    var format1=/\d/;
    
    let plate = document.forms["add_car"]["Plate"].value;
    let manufacture = document.forms["add_car"]["manufacture"].value;
    let model = document.forms["add_car"]["model"].value;
    let off = document.forms["add_car"]["off"].value;
    
    if ( format.test(plate)  ) {
          alert("Insert valide plate id");
          return false;
    }
    if ( format.test(manufacture) || (/\d/.test(manufacture))) {
        alert("Enter Valide manufacture");
         return false;
    }
    if ( format.test(model)) {
        alert("Enter Valide Model");
         return false;
    }
    if ( format.test(off)  || (/\d/.test(off))) {
        alert("Enter Valid office name");
         return false;
       }
 
}
function validatecustomerdate() {
    var startDate = document.getElementById("start").value;
    var endDate = document.getElementById("last").value;
    if ((Date.parse(endDate) <= Date.parse(startDate))) {
        alert("End date should be greater than Start date");
        return false;
    }
    return true;
}