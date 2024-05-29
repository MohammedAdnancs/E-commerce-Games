const carouselRow = document.querySelector('.slides-row')
const carouselSlides = document.getElementsByClassName('slide')
const nextBtn = document.querySelector('.next')
const prevBtn = document.querySelector('.prev')
const dots = document.getElementsByClassName('dot')


let index = 1;
var width;


function slidewidth() {
    width = carouselSlides[0].clientWidth;
}

slidewidth()
window.addEventListener('resize', slidewidth)
carouselRow.style.transform = 'translateX(' + (- width * index) + 'px)';

nextBtn.addEventListener('click', nextSlide);

function nextSlide() {
    if (index >= carouselSlides.length - 1) { return };
    carouselRow.style.transition = 'transform 0.4s ease-out'
    index++;
    carouselRow.style.transform = 'translateX(' + (- width * index) + 'px)';
    dotslabel();
}

prevBtn.addEventListener('click', prevSlide);
function prevSlide() {
    if (index <= 0) { return };
    carouselRow.style.transition = 'transform 0.4s ease-out'
    index--;
    carouselRow.style.transform = 'translateX(' + (- width * index) + 'px)';
    dotslabel();
}

carouselRow.addEventListener('transitionend', function () {
    if (carouselSlides[index].id === 'firstimagedup') {
        carouselRow.style.transition = 'none';
        index = carouselSlides.length - index;
        carouselRow.style.transform = 'translateX(' + (- width * index) + 'px)';
        dotslabel();
    }

    if (carouselSlides[index].id === 'lastimagedup') {
        carouselRow.style.transition = 'none';
        index = carouselSlides.length - 2;
        carouselRow.style.transform = 'translateX(' + (- width * index) + 'px)';
        dotslabel();
    }
});

function dotslabel() {
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(' active', '');
    }
    dots[index - 1].className += ' active';
}


function autoslide() {
    deleteInterval = setInterval(timer, 4000);
    function timer() {
        nextSlide();
    }
}
autoslide();

const mainContainer = document.querySelector('.container');
mainContainer.addEventListener('mouseover', function () {
    clearInterval(deleteInterval);
})

mainContainer.addEventListener('mouseout', autoslide);