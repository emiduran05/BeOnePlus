addEventListener("DOMContentLoaded", ()=>{
    slder();
})

function slder(){
    let images = document.querySelectorAll(".img_gall");
    let images_length = images.length;
    let slides = document.querySelector(".productMain_container_slider_slides");

    for(let i = 0; i < images_length; i++){
        
        images[i].addEventListener("mouseover", () =>{
            images.forEach(elements =>{
                elements.style.opacity = "0.7";
            })

            images[i].style.opacity = "1";
            slides.style.transform = `translateX(calc(-${i*100}%))`
        })
        
    }
    


}
