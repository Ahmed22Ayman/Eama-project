function validateForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username == "") {
        document.getElementById("error").innerHTML = "Please enter your username";
        return false;
    }

    if (password == "") {
        document.getElementById("error").innerHTML = "Please enter your password";
        return false;
    }

    if (username != "user" || password != "12345") {
        document.getElementById("error").innerHTML = "Incorrect username or password";
        return false;
    }

    return true;
}