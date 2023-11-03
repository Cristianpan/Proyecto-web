import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from "swiper/modules";

let swiper;

document.addEventListener("DOMContentLoaded", initPage);

function initPage() {
  saveFiles();
  createCarrusel();
}

function saveFiles() {
  const inputFile = document.querySelector("#image");
  inputFile.addEventListener("change", function (e) {; 

    const imageContainer = document.querySelector("#swiper-image");
    imageContainer.innerHTML = "";
    const maxFiles = this.files['length']; 
    let loadFiles = 0; 
    for (const key in this.files) {
      const reader = new FileReader();
      reader.onload = function (evt) {
        const img = document.createElement("img");
        img.src = evt.target.result;
        img.classList.add("swiper-slide");
        imageContainer.appendChild(img);
        loadFiles++; 

        if(loadFiles === maxFiles) {
            swiper.destroy(); 
            createCarrusel(); 
        }

      };

      if (typeof this.files[key] === "object") {
        reader.readAsDataURL(this.files[key]);
      }
    }
  });
}

function createCarrusel() {
  swiper = new Swiper(".swiper", {
    el: ".swiper-wrapper",
    slideClass: "swiper-slide",
    createElements: true,
    autoplay: {
      delay: 5000,
    },
    loop: true,
    modules: [Navigation, Pagination, Autoplay],
    navigation: true,
    pagination: true,
    spaceBetween: 20,
  });
}
