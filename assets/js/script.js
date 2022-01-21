function hiddenPasswordX() {
    var x = document.getElementById("change_password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }