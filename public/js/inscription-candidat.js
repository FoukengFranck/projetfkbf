const drop = document.getElementById("cv-dropzone");
const file = document.getElementById("cv");
const fileName = document.getElementById("cv-filename");

drop?.addEventListener("click", () => file?.click());
file?.addEventListener("change", () => {
    if (file.files && file.files[0]) {
        fileName.textContent = `Fichier sélectionné : ${file.files[0].name}`;
    } else {
        fileName.textContent = "";
    }
});
