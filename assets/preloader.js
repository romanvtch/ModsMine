  document.addEventListener("DOMContentLoaded", function () {
            const packman = document.querySelector(".packman");
            packman.style.opacity = "1";
            packman.style.visibility ='visible'
        });
    
        window.addEventListener("load", function () {
            const packman = document.querySelector(".packman");
            packman.style.opacity = "0";
            packman.style.visibility ='hidden'
        });