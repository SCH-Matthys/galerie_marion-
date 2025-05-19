document.addEventListener("DOMContentLoaded", () => {
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = document.getElementById("lightbox-img");
    const closeBtn = document.getElementById("lightbox-close");
    const prevBtn = document.getElementById("prev");
    const nextBtn = document.getElementById("next");

    let currentImages = [];
    let currentIndex = 0;

    // Quand on clique sur une image
    document.querySelectorAll(".carousel .image img").forEach((img, i) => {
        img.addEventListener("click", () => {
            const parentSlider = img.closest(".slider");
            currentImages = Array.from(parentSlider.querySelectorAll("img"));
            currentIndex = currentImages.indexOf(img);
            openLightbox(currentImages[currentIndex].src);
        });
    });

    function openLightbox(src) {
        lightbox.style.display = "flex";
        lightboxImg.src = src;
    }

    function closeLightbox() {
        lightbox.style.display = "none";
    }

    function showImage(index) {
        if (index >= 0 && index < currentImages.length) {
            currentIndex = index;
            lightboxImg.src = currentImages[currentIndex].src;
        }
    }

    closeBtn.addEventListener("click", closeLightbox);
    nextBtn.addEventListener("click", () => showImage((currentIndex + 1) % currentImages.length));
    prevBtn.addEventListener("click", () => showImage((currentIndex - 1 + currentImages.length) % currentImages.length));

    // Fermer en cliquant en dehors de l'image
    lightbox.addEventListener("click", (e) => {
        if (e.target === lightbox) closeLightbox();
    });
});
