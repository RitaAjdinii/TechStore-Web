const leftBtn = document.querySelector("#left");
const rightBtn = document.querySelector("#right");
const mainSlider = document.querySelector("#main-slider");

let images = [
    {
        name:"images/gamingLaptop1.jpeg"
    },
    {
        name:"images/gamingLaptop2.jpeg"
    },
    {
        name:"images/headphones1.jpg"
    },{
        name:"images/razer-blade16-homepage.webp"
    },{
        name:"images/Razer.webp"
      } 

]




let indexNumber =0



rightBtn.addEventListener("click",(e)=>{
    if(e.target.tagName==="IMG"){
    
        if(indexNumber>images.length-1){
            indexNumber= 0
            mainSlider.style.backgroundImage = `url(${images[indexNumber].name})`;
        }else{
                mainSlider.style.backgroundImage = `url(${images[++indexNumber].name})`;
        
        }
    }
});



leftBtn.addEventListener("click",(e)=>{
    if(e.target.tagName==="IMG"){
    



      //mainSlider.style.backgroundImage = `url(${images[indexNumber].name})`;
    }
});












