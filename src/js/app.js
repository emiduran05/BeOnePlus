addEventListener("DOMContentLoaded", ()=>{
    slder();
    autoSubmit();
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

function autoSubmit(){
    let radio = document.querySelectorAll(".radio");
    let form = document.getElementById("form");

    radio.forEach(element => {
        element.addEventListener("change", () =>{
            form.submit();
        })
    })
}

// document.querySelectorAll('input[name="color"]').forEach(input => {
//     input.addEventListener('change', function() {
//         let form = document.getElementById("form");
//         let formData = new FormData(form);

//         fetch('prueba.php', {
//             method: 'POST',
//             body: formData
//         })
//         .then(response => response.text())
//         .then(data => {
//             document.getElementById("respuesta").innerHTML = data;
//         })
//         .catch(error => console.error('Error:', error));
//     });
// });