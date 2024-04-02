function confirmCookies() {
    // Tu môžete pridať kód pre potvrdenie cookies, napríklad uloženie do localStorage
    document.getElementById('cookies-popup').style.display = 'none';
}

function rejectCookies() {
    // Tu môžete pridať kód pre odmietnutie cookies, napríklad neukladanie do localStorage
    document.getElementById('cookies-popup').style.display = 'none';
    
}

// Funkcia na zobrazenie popup okna pri načítaní stránky
window.onload = function () {
    document.getElementById('cookies-popup').style.display = 'block';
};

