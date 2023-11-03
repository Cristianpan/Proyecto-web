/* const fileInput = document.getElementById('myFileInput');
const imagePreview = document.getElementById('imagePreview');

fileInput.addEventListener('change', function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      const img = document.createElement('img');
      img.src = e.target.result;
      img.style.maxWidth = '300px'; // Establece el ancho máximo de la imagen para evitar estiramientos
      imagePreview.innerHTML = ''; // Limpia el contenedor de vista previa de imágenes
      imagePreview.appendChild(img); // Agrega la imagen al contenedor de vista previa
    }
}
});
*/
document.addEventListener('DOMContentLoaded', initPage)

function initPage() {
    const inputFiles = document.querySelectorAll(".profile-form__input--hidden"); 
    
    inputFiles.forEach(inputFile => {
        inputFile.addEventListener('change', function (e) {
            const file = this.files[0];

            console.log(file); 
            if (file) {
                const reader = new FileReader(); 
                reader.onload = function (evt) {
                    const imageContainer = document.querySelector(`#${e.target.id}-image`);
                    const img = document.createElement('img');
                    img.src = evt.target.result;
                    imageContainer.innerHTML = ''; 
                    imageContainer.classList.remove('profile__image--none'); 
                    imageContainer.appendChild(img); 
                }
                reader.readAsDataURL(file);
            }
        })
    })
}