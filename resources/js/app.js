import './bootstrap';
import Alpine from 'alpinejs';
import "pagepiling.js";

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    $("#pagepiling").pagepiling({
        menu: "#menu",
        anchors: ["hero", "about", "projects", "services", "team", "clients", "contact", "form"],
        navigation: {
            position: "right",
            tooltips: ["Start", "Wir", "Projekte", "Leistungen", "Das Team", "Kunden", "Kontakt", "Formular"],
        },
        scrollingSpeed: 50,
        loopTop: false,
        loopBottom: false,
    });
});
