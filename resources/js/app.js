import './bootstrap';
import Alpine from 'alpinejs';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import 'swiper/css';

window.Alpine = Alpine;
Alpine.start();

import { Navigation, Autoplay, Keyboard, FreeMode } from 'swiper/modules';
Swiper.use([Navigation, Autoplay, Keyboard, FreeMode]);

const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    spaceBetween: 20,
    loop: true,
    centeredSlides: true,
    pagination: { el: '.swiper-pagination', clickable: true },
    freeMode: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    keyboard: {
        enabled: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1280: {
            slidesPerView: 6,
            spaceBetween: 20,
        },
    },
});

swiper.on('slideChange', () => {
    document.querySelectorAll('#projects-swiper video').forEach((vid, i) => {
        i === swiper.realIndex ? vid.play() : vid.pause();
    });
});
swiper.emit('slideChange');


