
<div id="main-slider">
        <h1>MEET THE ALL-NEW RAZER-BLADE 16</h1>
        <p>SLIMMER.SMARTER.SHARPER</p>
        <div class="spanz">
            <a href="" >Learn more<span class="green">></span></a>
            <a href="" >Notify me<span class="green">></span></a>
        </div>
        <div class="controls">
            <button id ="left"><img src="Images/arrow_back_ios_24dp_666666_FILL0_wght400_GRAD0_opsz24.svg" alt=""></button>
            <button id="right"><img src="Images/arrow_forward_ios_24dp_666666_FILL0_wght400_GRAD0_opsz24.svg"></button>
        </div>

    </div>
</div>

     
     
     <script>

         
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
     </script>
