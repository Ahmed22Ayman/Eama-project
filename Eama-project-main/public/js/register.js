function validateForm() {
    var password = document.getElementById("inputpass").value;
    var confirmPassword = document.getElementById("inputcpass").value;
    if (password != confirmPassword) {
      alert("Passwords do not match!");
      return false;
    }
    return true;
  }