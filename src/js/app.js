addEventListener("DOMContentLoaded", ()=>{
    slder();
})


// function autoSubmit(){
//     let radio = document.querySelectorAll(".radio");
//     let form = document.getElementById("form");
//     form.preventDefault();

//     radio.forEach(element => {
//         element.addEventListener("change", () =>{
//             form.submit();
//         })
//     })
// }

document.querySelectorAll('input[name="color"]').forEach(input => {
    input.addEventListener('change', function() {
        const params = new URLSearchParams(window.location.search);
        const id = params.get("id");
        let gallery = document.querySelector(".gallery");
        let img_container = document.querySelector(".productMain_container_slider_slides");

        let form = document.getElementById("form");
        let formData = new FormData(form);

        fetch(`prueba.php?id=${id}`, {
            method: 'POST',
            
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            img_container.innerHTML = "";
            gallery.innerHTML = "";

            data.imagenes.forEach(element => {
                let img = document.createElement("img");
                img.src = element;
                img_container.appendChild(img);
            })

            data.imagenes.forEach(element =>{
                let imgG = document.createElement("img");
                imgG.src = element;
                imgG.classList.add("img_gall");
                gallery.appendChild(imgG);
            })
            slder();
        })
        .catch(error => console.error('Error:', error));
    });
});



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