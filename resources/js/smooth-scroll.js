import $ from "jquery";
window.$ = window.jQuery = $;

import "pagepiling.js";

document.addEventListener("DOMContentLoaded", function () {
    $("#pagepiling").pagepiling({
        menu: "#menu",
        anchors: ["hero", "about", "projects", "services", "team", "clients", "contact", "form"],
        navigation: {
            position: "right",
            tooltips: ["Start", "Wir", "Projekte", "Leistungen", "Das Team", "Kunden", "Kontakt", "Formular"],
        },
        scrollingSpeed: 700,
        loopTop: false,
        loopBottom: false,
    });
});
