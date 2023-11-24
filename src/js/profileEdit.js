import { createPond } from "./_filepond";

document.addEventListener("DOMContentLoaded", initPage);
function initPage() {
  addEventListeners();
  createFiles();
}

function addEventListeners() {
  document
    .querySelector(".personals-block-edit__add")
    .addEventListener("click", showModal);
  document
    .querySelector(".buttons__button--cancelar")
    .addEventListener("click", showModal);
  const editBtns = document.querySelectorAll(
    ".personal-blocks-buttons__button--edit"
  );

  editBtns.forEach((element) => {
    element.addEventListener("click", (e) => {
      showModal();
      setData(e.target);
    });
  });
}

function showModal() {
  const modal = document.querySelector(".modal");
  modal.classList.toggle("modal--visible");
  modal.classList.toggle("modal--none");
}

function setData(target) {
  const id = target.getAttribute("data-id");
  const element = document.querySelector(`#block-${id}`);
  const blockName = element.querySelector(".personal-blocks__title").innerText;
  const blockDescription = element.querySelector(
    ".personal-blocks__text"
  ).innerText;

  document.querySelector(".modal #block-name").value = blockName;
  document.querySelector(".modal #block-description").value = blockDescription;
}

function createFiles() {
  const imageBackground = createPond(
    document.querySelector("#imageBackground"),
    JSON.parse(document.querySelector("#imageBackgroundConfig").value),
    "imageBackground"
  );
  
  imageBackground.labelIdle = 'Arrastra y suelta tu foto de portada o  <u style="cursor:pointer;">Selecciona</u>';
  
  const imageProfile = createPond(
    document.querySelector("#imageProfile"),
    JSON.parse(document.querySelector("#imageProfileConfig").value),
    "imageProfile"
    );
      imageProfile.labelIdle = 'Arrastra y suelta tu foto de perfil o  <u style="cursor:pointer;">Selecciona</u>';
}