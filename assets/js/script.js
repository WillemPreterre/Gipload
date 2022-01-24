function hiddenPasswordX() {
  var x = document.getElementById("change_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

const buttonAbout = document.getElementById('btn_about');
const buttonProfile = document.getElementById('btn_profile');

buttonAbout.addEventListener('click', event => {
  isActiveAbout()

});

buttonProfile.addEventListener('click', event => {
  isActiveProfile()

});


function isActiveAbout() {
  const menuderoulant = document.querySelector('.deroulantAbout')
  console.log(menuderoulant)
  menuderoulant.classList.toggle('activeAbout')

} 

function isActiveProfile() {
  const menuderoulant = document.querySelector('.deroulantProfile')
  console.log(menuderoulant)
  menuderoulant.classList.toggle('activeProfile')
}