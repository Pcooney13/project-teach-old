document.addEventListener('DOMContentLoaded', function () {
    var secondarySlider = new Splide('#secondary-slider', {
        fixedWidth: 300,
        height: '10rem',
        cover: true,
        type: 'loop',
        rewind: true,
        gap: 10,
        isNavigation: true,
        focus: 'center',
        breakpoints: {
            '600': {
                fixedWidth: 150,
                height: '6rem',
            }
        },
    }).mount();

    var primarySlider = new Splide('#primary-slider', {
        type: 'fade',
        pagination: false,
        arrows: false,
        cover: true,
    }); // do not call mount() here.

    primarySlider.sync(secondarySlider).mount();

    var slideImage = document.querySelectorAll('.splide__slide');
    addEventListener(slideImage, function () {
        this.classList.add('is-active');
    });
});