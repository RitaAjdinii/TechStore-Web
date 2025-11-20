    const hamburger = document.querySelector(".hamburger-menu");
      const navList = document.querySelector(".nav-list");
      const clickMenu = document.querySelector(".click-menu-addition");

    hamburger.addEventListener("click",()=>{
      clickMenu.classList.toggle("on");
      hamburger.classList.toggle("rotate");
    });