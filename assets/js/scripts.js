// Click Nav Links
const navLinks = document.querySelectorAll(".nav-link");

navLinks[0].classList.add("active");

navLinks.forEach(link => {
    link.addEventListener("click",clickLink)
});

function clickLink(e){
    navLinks.forEach(link => link.classList.remove("active"));
    e.target.classList.add("active");
}

const header = document.querySelector(".header");
const headerHeight = header.offsetHeight;

window.addEventListener("scroll", () => {
    if(window.scrollY > 300 - headerHeight){ 
        header.classList.add("sticky");
    }else{
        header.classList.remove("sticky");
    }
})

// Open Color Select Menu
function showMenu(clickLabel) {
    const colorPicker = document.querySelector(".color-picker");
    colorPicker.classList.add("show");
    document.addEventListener("click", e => {
        if(e.target != clickLabel) {
            colorPicker.classList.remove("show");
        }
    });
}

// Change Theme
let themeMode;
const modeBtn = document.querySelector(".mode-btn");
if(localStorage.getItem("theme")){
    themeMode = localStorage.getItem("theme")
}else{
    localStorage.setItem("theme","light");
    themeMode = localStorage.getItem("theme");
}
modeBtn.classList.add(themeMode);
document.querySelector("body").className = themeMode;
function changeTheme(){

    if(themeMode == "light"){
        localStorage.setItem("theme","dark");
    }else{
        localStorage.setItem("theme","light");
    }
    themeMode = localStorage.getItem("theme");
    document.querySelector("body").className = themeMode;

    if(modeBtn.classList.contains("dark")){
        modeBtn.classList.remove("dark");
    }else{
        modeBtn.classList.add("dark");
    }
    
    // Değerlere göre CV linki ayarla
    cvLink();
}

// Poject Open Popup
function showPopup(popupId,popupType){
    const popupArea = document.querySelector("#show-popup-" + popupType + "-" + popupId);
    popupArea.classList.add("show");

    document.addEventListener("click", e => {
        if(e.target.className === "project-popup-area show") {
            popupArea.classList.remove("show");
        }
    });
}

// Open Mobile Menu
function mobileMenu(){
    const linksMenu = document.querySelector(".links");
    const MenuClose = document.querySelector(".mobile-menu-close-area");
    linksMenu.classList.add("open");
    MenuClose.classList.add("show");

    document.addEventListener("click", e => {
        if(e.target.className === "mobile-menu-close-area show") {
            linksMenu.classList.remove("open");
            MenuClose.classList.remove("show");
        }
    });
} 
