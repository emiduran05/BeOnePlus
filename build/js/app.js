function slder(){let e=document.querySelectorAll(".img_gall"),t=e.length,o=document.querySelector(".productMain_container_slider_slides");for(let n=0;n<t;n++)e[n].addEventListener("mouseover",(()=>{e.forEach((e=>{e.style.opacity="0.7"})),e[n].style.opacity="1",o.style.transform=`translateX(calc(-${100*n}%))`}))}function autoSubmit(){let e=document.querySelectorAll(".radio"),t=document.getElementById("form");e.forEach((e=>{e.addEventListener("change",(()=>{t.submit()}))}))}addEventListener("DOMContentLoaded",(()=>{slder(),autoSubmit()}));