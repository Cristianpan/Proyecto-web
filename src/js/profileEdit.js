document.addEventListener('DOMContentLoaded', initPage)

function initPage() {
    const inputFiles = document.querySelectorAll(".profile-form__input--hidden"); 
    
    inputFiles.forEach(inputFile => {
        inputFile.addEventListener('change', function (e) {
            const file = this.files[0];

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