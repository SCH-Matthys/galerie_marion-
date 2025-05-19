
// ODD
const observerOdd = new IntersectionObserver((entries) =>{
    entries.forEach((entry) =>{
        if (entry.isIntersecting) {
            entry.target.classList.add("oddAnimationScrollShow");
        }else{
            entry.target.classList.remove("oddAnimationScrollShow");
        }
    }) 
});

const hiddenElementsOdd = document.querySelectorAll(".oddAnimationScrollHidden");
hiddenElementsOdd.forEach((el) => observerOdd.observe(el));

// NOTODD
const observerNotOdd = new IntersectionObserver((entries) =>{
    entries.forEach((entry) =>{
        if (entry.isIntersecting) {
            entry.target.classList.add("notOddAnimationScrollShow");
        }else{
            entry.target.classList.remove("notOddAnimationScrollShow");
        }
    }) 
});

const hiddenElementsNotOdd = document.querySelectorAll(".notOddAnimationScrollHidden");
hiddenElementsNotOdd.forEach((el) => observerNotOdd.observe(el));