import * as FilePond from "filepond";

import FilePondPluginImagePreview from "filepond-plugin-image-preview";

import FilePondPluginImageExifOrientation from "filepond-plugin-image-exif-orientation";

import FilePondPluginFileEncode from "filepond-plugin-file-encode";

import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePonPluginImageValidateSize from "filepond-plugin-image-validate-size";

document.addEventListener("DOMContentLoaded", initPage);

function initPage() {
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

FilePond.registerPlugin(
  FilePondPluginFileEncode,
  FilePondPluginImageExifOrientation,
  FilePondPluginImagePreview,
  FilePondPluginFileValidateType,
);


FilePond.setOptions({
  labelIdle:
    'Arrastra y suelta tu imagen o  <u style="cursor:pointer;">Selecciona</u>',
  imagePreviewHeight: 240,
  imageCropAspectRatio: "1:1",
  imageResizeTargetWidth: 200,
  imageResizeTargetHeight: 200,
  acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
  labelFileTypeNotAllowed: "Archivo no valido",
  fileValidateTypeLabelExpectedTypes: `Se espera {allTypes}`,
  chunkUploads: true,
  chunkSize: 100000, 
});


const imageProfile = FilePond.create(document.querySelector("#imageProfile"));
const imageBackground = FilePond.create(document.querySelector("#imageBackground"));

const filesImageBackground = JSON.parse(document.querySelector("#fileImageBackground").value);
const filesImageProfile = JSON.parse(document.querySelector("#fileImageProfile").value);


imageProfile.server = getServerOptions('imageProfile');
imageProfile.files = filesImageProfile;
imageBackground.server = getServerOptions('imageBackground');
imageBackground.files = filesImageBackground;



function getServerOptions(nameInput, baseUrl = "/api/files"){
  return {
    url: baseUrl,
    process: {
      url: '/process',
      method: 'POST',
      headers: {
        input: nameInput,
      },
      onload: (response) => {
        const result =
          response instanceof XMLHttpRequest
            ? JSON.parse(response.responseText)
            : JSON.parse(response);
        return result.key;
      },
    },
    patch: {
      url: '/process?patch=',
      headers: {
        input: nameInput,
      },
    },
    restore: '/restore?file=',
    revert: '/delete',
    load: '/load?file=',
    remove: (source, load) => {
      addFileToDelete(nameInput, source);
      load();
    },
  }
}

function addFileToDelete(nameInput, source) {
  const deleteFileContainer = document.querySelector(`#delete-${nameInput}`);
  const fileToDelete = document.createElement('INPUT');
  fileToDelete.name = `delete-${nameInput}`;
  fileToDelete.type = 'hidden';
  fileToDelete.value = source;
  deleteFileContainer.appendChild(fileToDelete);
}
