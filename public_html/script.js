document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const slides = document.querySelectorAll('.slider');

    let activeSlideIndex = Array.from(slides).findIndex(slide => slide.classList.contains('active-slide'));

    prevButton.addEventListener('click', function() {
        changeSlide(-1);
    });

    nextButton.addEventListener('click', function() {
        changeSlide(1);
    });

    function changeSlide(direction) {
        const oldActiveIndex = activeSlideIndex;
        activeSlideIndex = (activeSlideIndex + direction + slides.length) % slides.length;
        
        slides[oldActiveIndex].classList.add('fade-out');
        setTimeout(() => {
            slides[oldActiveIndex].classList.remove('active-slide', 'fade-out');
            slides[activeSlideIndex].classList.add('active-slide');
        }, 300); // 500 ms für den Fade-Effekt, wie in CSS definiert
    }
});


document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.getElementById('menu-toggle');
    var mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', function() {
        var display = mobileMenu.style.display;

        if (display === 'none' || display === '') {
            mobileMenu.style.display = 'block';
        } else {
            mobileMenu.style.display = 'none';
        }
    });
});


