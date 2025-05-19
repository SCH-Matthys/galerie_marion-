document.addEventListener("DOMContentLoaded", () => {
    const carousels = document.querySelectorAll(".carousel");

    carousels.forEach((carousel) => {
        const slider = carousel.querySelector(".slider");
        const images = slider.querySelectorAll(".image"); 

        if (images.length === 0) return;

        const total = images.length;
        let index = 0;
        
        // slider.style.width = `${total * 100}%`;
        slider.style.transform = `translateX(-${index * slider.clientWidth}px)`;

        setInterval(() => {
            index = (index + 1) % total;
            slider.style.transform = `translateX(-${index * 100}%)`;
            console.log(`Défilement: ${slider.style.left}`);
        }, 8000); 
    });
});