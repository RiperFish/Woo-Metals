// Get the modal
var modal = document.querySelector(".product_img-modal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.querySelector(".product_img-small");
var modalImg = document.querySelector("#product_img-medium");
var zoomIn = document.querySelector('.zoom_in-icon');
var modal__caption = document.querySelector(".modal__caption");
zoomIn.addEventListener('click',()=> {
    modal.style.display = "block";
    modalImg.src = img.src;
    modal__caption.innerHTML = img.alt;
});


// get Close button
var closeBtn = document.querySelector(".close_modal");

// When the user clicks on <span> (x), close the modal
closeBtn.addEventListener('click',()=> {
    modal.style.display = "none";
});