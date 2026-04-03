const hamburger = document.querySelector(".hamburger");
const navContent = document.querySelector(".nav-content");
const navList = document.querySelector(".nav-list");
let isOpen = false;

hamburger.addEventListener("click", () => {
  isOpen = !isOpen;
  hamburger.classList.toggle("toggle-hamburger");
  if (isOpen == true) {
    navContent.classList.add("toggle-sidebar");
  } else {
    navContent.classList.remove("toggle-sidebar");
  }
});
