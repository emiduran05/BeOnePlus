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

let buttonS = document.querySelectorAll(".btn-size");
let hidden_input = document.querySelector(".talla");

for(let i = 0; i < buttonS.length; i++){
    buttonS[i].addEventListener("click", () =>{
        hidden_input.value = `${i}`;
        console.log(hidden_input.value);
    })
}


document.querySelectorAll('input[type="radio"]').forEach(input => {
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

            console.log(data);
            if(data.stock > 0){
                document.querySelector(".stock").style.color = "green";
                document.querySelector(".stock").innerHTML = `Stock: <b> ${data.stock} available </b>` ;
            }else{
                document.querySelector(".stock").style.color = "red";
                document.querySelector(".stock").innerHTML = `Stock: <b> ${data.stock} available </b>` ;
             
            }
            document.querySelector(".color").innerHTML = `<strong> Color: ${data.colorName}</strong>`;
            document.querySelector(".sizeName").innerHTML =  `<strong> Selected Size: ${data.sizeName} </strong>`

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