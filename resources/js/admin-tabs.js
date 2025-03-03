import 'bootstrap';
import { Tab } from 'bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    let url = new URL(window.location);
    let activeTab = url.searchParams.get("tab") || "general"; // Standardwert

    // Bootstrap-Tabs korrekt aktivieren
    let tabElement = document.querySelector(`#mainTabs a[href="#${activeTab}"]`);
    if (tabElement) {
        new Tab(tabElement).show();
    }

    // Falls sich der Nutzer durchklickt, URL aktualisieren + verstecktes Feld setzen
    document.querySelectorAll("#mainTabs a").forEach(tab => {
        tab.addEventListener("click", function () {
            let selectedTab = this.getAttribute("href").substring(1);

            // URL aktualisieren
            url.searchParams.set("tab", selectedTab);
            window.history.pushState({}, "", url);

            // 👇 Verstecktes Input-Feld aktualisieren
            let hiddenInput = document.querySelector("#activeTab");
            if (hiddenInput) {
                hiddenInput.value = selectedTab;
            }
        });
    });
});

