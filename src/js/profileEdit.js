document.addEventListener("DOMContentLoaded", initPage);

function initPage() {
  saveImages();
  addEventListeners(); 
}

function addEventListeners(){
    document.querySelector(".personals-block-edit__add").addEventListener('click', showModal); 
    document.querySelector(".buttons__button--cancelar").addEventListener('click', showModal); 
    const editBtns = document.querySelectorAll(".personal-blocks-buttons__button--edit"); 

    editBtns.forEach(element => {
      element.addEventListener('click', (e) => {showModal(); setData(e.target)}); 
    });
}

function showModal() {
    const modal = document.querySelector(".modal"); 
    modal.classList.toggle('modal--visible');
    modal.classList.toggle('modal--none');
}

function setData(target){
  const id = target.getAttribute("data-id"); 
  const element = document.querySelector(`#block-${id}`); 
  const blockName = element.querySelector('.personal-blocks__title').innerText; 
  const blockDescription = element.querySelector('.personal-blocks__text').innerText; 

  document.querySelector(".modal #block-name").value = blockName; 
  document.querySelector(".modal #block-description").value = blockDescription; 
}

function saveImages() {
  const inputFiles = document.querySelectorAll(".profile-form__input--hidden");

  inputFiles.forEach((inputFile) => {
    inputFile.addEventListener("change", function (e) {
      const file = this.files[0];

      console.log(file);
      if (file) {
        const reader = new FileReader();
        reader.onload = function (evt) {
          const imageContainer = document.querySelector(
            `#${e.target.id}-image`
          );
          const img = document.createElement("img");
          img.src = evt.target.result;
          imageContainer.innerHTML = "";
          imageContainer.classList.remove("profile__image--none");
          imageContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
      }
    });
  });
}
