const navBtn = document.querySelector(".nav-menu");
const closeSideNavBtn = document.querySelector("#close-sidenav-btn");
const sideMenu = document.querySelector(".side-menu");
const accountBtn = document.querySelector("#account-st-btn");
const logoutBtn = document.querySelector("#logout-btn");
const elementBody = document.querySelector("body");
const mainContainer = document.querySelector(".main");

const mediaXs = window.matchMedia("(max-width: 767.99px)");
const mediaS = window.matchMedia(
    "(min-width: 768px) and (max-width: 1199.99px)"
);
const mediaM = window.matchMedia("(min-width: 1200px)");

function openSideNav() {
    if (mediaM.matches) {
        sideMenu.style.right = "70%";
    } else if (mediaS.matches) {
        sideMenu.style.right = "50%";
    } else {
        sideMenu.style.right = "0%";
    }
    sideMenu.classList.add("active");
    elementBody.style.overflow = "hidden";
    mainContainer.classList.add("side-active");
}

function closeSideNav() {
    elementBody.style.overflow = "auto";
    sideMenu.style.right = "100%";
    sideMenu.classList.remove("active");
    mainContainer.classList.remove("side-active");
}

[mediaM, mediaS, mediaXs].forEach((mq) => {
    mq.addEventListener("change", (e) => {
        if (e.matches) {
            closeSideNav();
        }
    });
});

navBtn.addEventListener("click", openSideNav);
closeSideNavBtn.addEventListener("click", closeSideNav);

document.addEventListener("click", (e) => {
    const isClickInsideSideMenu = sideMenu.contains(e.target);
    const isNotNavBtn = navBtn.contains(e.target);

    if (!isNotNavBtn &&
        !isClickInsideSideMenu &&
        sideMenu.classList.contains("active")
    ) {
        closeSideNav();
    }
});

// Dropdown Functions

document.addEventListener("click", (e) => {
    const isDropdownButton = e.target.matches("[data-dropdown-button]");

    if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return;

    let currentDropdown;
    if (isDropdownButton) {
        currentDropdown = e.target.closest("[data-dropdown]");
        currentDropdown.classList.toggle("active");
        // console.log(currentDropdown);
    }

    document.querySelectorAll("[data-dropdown].active").forEach((dropdown) => {
        if (dropdown === currentDropdown) return;
        dropdown.classList.remove("active");
    });
});

const thaiBtn = document.getElementById("thaiBtn");
const engBtn = document.getElementById("engBtn");
const thaiBtn2 = document.getElementById("thaiBtn2");
const engBtn2 = document.getElementById("engBtn2");

let currentLanguage = getCookie("selectedLanguage");
if (currentLanguage === null) {
    currentLanguage = "eng";
}

// Add click event listeners to language change buttons
thaiBtn.addEventListener("click", () => changeLanguage("th"));
engBtn.addEventListener("click", () => changeLanguage("eng"));
thaiBtn2.addEventListener("click", () => changeLanguage("th"));
engBtn2.addEventListener("click", () => changeLanguage("eng"));

// Function to change language
function changeLanguage(language) {
    currentLanguage = language;

    // Store selected language preference in cookie
    setCookie("selectedLanguage", currentLanguage, 365);
    location.reload();
}

function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 24 * 60 * 60 * 1000).toUTCString();
    document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=/`;
}

function getCookie(name) {
    const cookies = document.cookie.split("; ").map(cookie => cookie.split("="));
    const cookie = cookies.find(c => c[0] === name);
    return cookie ? decodeURIComponent(cookie[1]) : null;
}

var linksUnderline = document.querySelectorAll('.underline-our');
const activePage = window.location.pathname;
linksUnderline.forEach(function(item) {
    // console.log(activePage);
    if (activePage == '/edm-management/our-work') {
        // console.log(item.href.includes(`${activePage}`));
        item.classList.add('active')
    } else {
        item.classList.remove('active')
    }
});