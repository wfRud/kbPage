const galleryItems = document.querySelectorAll(".gallery-item");
const lightboxImage = document.querySelector(".lightbox_image");
const lightboxTitle = document.querySelector(".lightbox_title");
const lightboxDescription = document.querySelector(".lightbox_description");
const nextBtn = document.querySelector(".next");
const prevBtn = document.querySelector(".prev");
const closeBtn = document.querySelector(".closeBtn");

let index;
let imageSrc;

galleryItems.forEach((galleryItem, i) => {
  galleryItem.addEventListener("click", () => {
    index = i;
    changeImage();
    showLightbox();
  });
});

function showLightbox() {
  lightbox.classList.toggle("active");
}

function next() {
  if (index === galleryItems.length - 1) {
    index = 0;
  } else {
    index++;
  }
  changeImage();
}
function prev() {
  if (index <= 0) {
    index = galleryItems.length - 1;
  } else {
    index--;
  }
  changeImage();
}

function changeImage() {
  currentImage = galleryItems[index].querySelector("img");

  imageSrc = currentImage.dataset.imagelarge;
  imageTitle = currentImage.dataset.title;
  imageDescription = currentImage.dataset.description;

  lightboxImage.src = imageSrc;
  lightboxTitle.textContent = imageTitle;
  lightboxDescription.textContent = imageDescription;
}

nextBtn.addEventListener("click", next);
prevBtn.addEventListener("click", prev);

lightbox.addEventListener("click", (e) => {
  if (e.target !== e.currentTarget) return;
  lightbox.classList.remove("active");
});
closeBtn.addEventListener("click", () => {
  lightbox.classList.remove("active");
});
