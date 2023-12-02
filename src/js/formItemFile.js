import { createPond } from "./_filepond";

document.addEventListener("DOMContentLoaded", createFiles);

function createFiles() {
  const artItemFiles = createPond(
    document.querySelector("#artItemFile"),
    JSON.parse(document.querySelector("#artItemFilesConfig").value),
    "artItemFile"
  );

  artItemFiles.imagePreviewHeight = 500;
  artItemFiles.stylePanelLayout = "integrated";
  artItemFiles.labelIdle =
    'Arrastra y suelta una foto para tu obra o <u style="cursor:pointer;">Selecciona</u>';
}
