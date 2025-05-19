
// ODD
const observer = new IntersectionObserver((entries) =>{
    entries.forEach((entry) =>{
        if (entry.isIntersecting) {
            entry.target.classList.add("animationScrollShow");
        }else{
            entry.target.classList.remove("animationScrollShow");
        }
    }) 
});

const hiddenElements = document.querySelectorAll(".animationScrollHidden");
hiddenElements.forEach((el) => observer.observe(el));
