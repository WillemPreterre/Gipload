function hiddenPasswordX() {
  var x = document.getElementById("change_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

// Menu déroulant
const buttonAbout = document.getElementById('btn_about');
const buttonProfile = document.getElementById('btn_profile');

buttonAbout.addEventListener('click', event => {
  isActiveAbout()

});


// condition si pas trouvé ne rien faire
if(buttonProfile != null) {
  buttonProfile.addEventListener('click', event => {
    isActiveProfile()
  
  });
}

// Menu déroulant
function isActiveAbout() {
  const menuderoulant = document.querySelector('.deroulantAbout')
  console.log(menuderoulant)
  menuderoulant.classList.toggle('activeAbout')

} 

// Menu déroulant
function isActiveProfile() {
  const menuderoulant = document.querySelector('.deroulantProfile')
  console.log(menuderoulant)
  menuderoulant.classList.toggle('activeProfile')
}




// Case à cocher pour formulaire
var createAccountCheckBox = document.querySelector('.checkboxCreateAccount');
var createAccountSubmit = document.querySelector('.submitCreateAccount');

console.log(createAccountCheckBox);
createAccountCheckBox.onchange = function() {
  if(createAccountCheckBox.checked) {
    createAccountSubmit.disabled = false;
  } else {
    createAccountSubmit.disabled = true;
  }
};