function validateForm(form) {
    var message, fieldValue, success = true;
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    // Name validation
    message = document.getElementById("msgName");
    fieldValue = document.getElementById("txtName").value;

    if(fieldValue.trim().length == 0) {
        message.innerHTML = "Name is required";
        success = false;
    }
    else if(/^[a-zA-Z ]*$/.test(fieldValue) == false) {
        message.innerHTML = "Only letters and white space are allowed";
        success = false;
    }
    else {
        message.innerHTML = "";
    }


    // Email validation
    message = document.getElementById("msgEmail");
    fieldValue = document.getElementById("txtEmail").value;

    if(fieldValue.trim().length == 0) {
        message.innerHTML = "Email is required";
        success = false;
    }
    else if (reg.test(fieldValue) == false) {
        message.innerHTML = "Invalid Email";
        success = false;
    }
    else {
        message.innerHTML = "";
    }

    // Date validation
    message = document.getElementById("msgDate");
    fieldValue = document.getElementById("dtmDate").value;

    if(fieldValue.trim().length == 0) {
        message.innerHTML = "Date is required";
        success = false;
    }
    else {
        message.innerHTML = "";
    }

    return success;
}
