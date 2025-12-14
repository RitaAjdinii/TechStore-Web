
   

         
     const leftBtn = document.querySelector("#left");
        const rightBtn = document.querySelector("#right");
        const mainSlider = document.querySelector("#main-slider");

        let images = [
            {
                name:"images/RazerNexus.webp"
            },
            {
                name:"images/gamingLaptop2.jpeg"
            },
            {
                name:"images/RazerMainSlider.webp"
            },{
                name:"images/razer-blade16-homepage.webp"
            },{
                name:"images/Razer.webp"
            } 

        ]


window.addEventListener("DOMContentLoaded",()=>{
    let randomIndex = Math.floor(Math.random()*images.length)

    mainSlider.style.backgroundImage = `url(${images[randomIndex].name})`;
    rightBtn.addEventListener("click",(e)=>{
        if(e.target.tagName==="IMG"){
    
            randomIndex++
            console.log(randomIndex)
            if(randomIndex>images.length-1){
                randomIndex=0
            }
             mainSlider.style.backgroundImage = `url(${images[randomIndex].name})`;
               

           
        }
    });
     
    
    
    leftBtn.addEventListener("click",(e)=>{
        if(e.target.tagName==="IMG"){

            --randomIndex
            if(randomIndex<0){
                randomIndex = images.length-1
            }
             mainSlider.style.backgroundImage = `url(${images[randomIndex].name})`;
            
               


    }});
    
    


});
    