// Initializing variables
var modal = document.querySelector(".modal");
var modelImage = document.querySelector(".modal-content");



Array.from(document.querySelectorAll(".image")).forEach( item => {
    item.addEventListener("click", event => {
        modal.style.display = "block";
        modelImage.src = event.target.src;
    });
});

document.querySelector(".close").addEventListener("click", () => {
    modal.style.display = "none";
 });