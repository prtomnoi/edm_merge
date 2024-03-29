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

// document.addEventListener("mouseover", (e) => {
//   const isDropdownButton = e.target.matches("[data-dropdown-button]");

//   if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return;

//   let currentDropdown;
//   if (isDropdownButton) {
//     currentDropdown = e.target.closest("[data-dropdown]");
//     currentDropdown.classList.toggle("active");
//   }

// //   document.querySelectorAll("[data-dropdown].active").forEach((dropdown) => {
// //     if (dropdown === currentDropdown) return;
// //     dropdown.classList.remove("active");
// //   });
// });

document.addEventListener("click", (e) => {
    const isDropdownButton = e.target.matches("[menus-dropdown-btn]");

    if (!isDropdownButton && e.target.closest("[menus-dropdown]") != null) return;

    let currentDropdown;
    if (isDropdownButton) {
        currentDropdown = e.target.closest("[menus-dropdown]");
        currentDropdown.classList.toggle("active");
    }

    document.querySelectorAll("[menus-dropdown].active").forEach((dropdown) => {
        if (dropdown === currentDropdown) return;
        dropdown.classList.remove("active");
    });
});

document.addEventListener("click", (e) => {
    const collapseButton = e.target.closest("[collapse-button]");
    const collapseContent = e.target.closest("[collapse-content]");

    if (!collapseButton && !collapseContent) {
        document.querySelectorAll("[collapse-content].open").forEach((collapse) => {
            collapse.classList.remove("open");
        });
        document.querySelectorAll("[collapse-button].active").forEach((button) => {
            button.classList.remove("active");
        });
        return;
    }

    if (collapseButton) {
        const targetId = collapseButton.getAttribute("collapse-button");
        const targetContent = document.querySelector(
            `[collapse-content="${targetId}"]`
        );
        if (!targetContent) return;

        const isOpen = targetContent.classList.contains("open");

        document.querySelectorAll("[collapse-content].open").forEach((collapse) => {
            if (collapse !== targetContent) {
                collapse.classList.remove("open");
                const correspondingButton = document.querySelector(
                    `[collapse-button="${collapse.getAttribute("collapse-content")}"]`
                );
                if (correspondingButton) {
                    correspondingButton.classList.remove("active");
                }
            }
        });

        targetContent.classList.toggle("open", !isOpen);

        collapseButton.classList.toggle("active", !isOpen);
    }
});

var linksUnderline = document.querySelectorAll('.underline');
const activePage = window.location.pathname;
linksUnderline.forEach(function(item) {
    // console.log(activePage);
    if (activePage == '/news-activity') {
        // console.log(item.href.includes(`${activePage}`));
        item.classList.add('active')
    }
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
// engBtn.addEventListener("click", () => changeLanguage("eng"));
thaiBtn2.addEventListener("click", () => changeLanguage("th"));
// engBtn2.addEventListener("click", () => changeLanguage("eng"));

// Function to change language
function changeLanguage(language) {
    currentLanguage = language;

    // Store selected language preference in cookie
    setCookie("selectedLanguage", currentLanguage, 365);
    location.reload();
}

function setCookie(name, value, days) {
    const expires = new Date(
        Date.now() + days * 24 * 60 * 60 * 1000
    ).toUTCString();
    document.cookie = `${name}=${encodeURIComponent(
    value
  )}; expires=${expires}; path=/`;
}

function getCookie(name) {
    const cookies = document.cookie
        .split("; ")
        .map((cookie) => cookie.split("="));
    const cookie = cookies.find((c) => c[0] === name);
    return cookie ? decodeURIComponent(cookie[1]) : null;
}

window.addEventListener("scroll", () => {
    const navBar = document.querySelector("nav");
    navBar.classList.toggle("sticky", window.scrollY > 0);
});