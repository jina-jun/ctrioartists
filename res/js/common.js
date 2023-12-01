'use strict';

// s: open menu
let menuIcon = document.querySelector('.ic_menu');
let homeVideo = document.querySelector('.wrap_video video');
let menuWindow = document.querySelector('.close_menu_window');
let gnb = document.querySelector('.gnb');
let gnbLinkTwitter = document.querySelector('.gnb .ic_twitter');
let gnbLinkInstagram = document.querySelector('.gnb .ic_instagram');
let gnbLinkYoutube = document.querySelector('.gnb .ic_youtube');
let gnbLogo = document.querySelector('.gnb .logo');
let body = document.querySelector('body');
let pageTitleInGnb = document.querySelector('.page_title-inGnb');
let subPageTitleInGnb = document.querySelector('.subDetail .page_title-inGnb');

function playPause() { 
    if (homeVideo.paused)
        homeVideo.play();
    else
        homeVideo.pause();
};

function menuControlHome() {
    menuIcon.classList.toggle('ic_close');
    menuIcon.classList.toggle('white');
    menuWindow.classList.toggle('open_menu_window');
    playPause();
};
function menuControl() {
    menuIcon.classList.toggle('ic_close');
    menuWindow.classList.toggle('open_menu_window');
    gnb.classList.toggle('open_menu');
    gnbLinkTwitter.classList.toggle('white');
    gnbLinkInstagram.classList.toggle('white');
    gnbLinkYoutube.classList.toggle('white');
    gnbLogo.classList.toggle('white');
    body.classList.toggle('open_menu');
    pageTitleInGnb.classList.toggle('open_menu');
};
// e: open menu

// s: scrolling
let gnbHeight = gnb.getBoundingClientRect().height;
document.addEventListener('scroll', function() {
    if (window.scrollY > gnbHeight) {
        pageTitleInGnb.style.opacity = '1';
        subPageTitleInGnb.style.opacity= '1';
    } else {
        pageTitleInGnb.style.opacity = '0';
        subPageTitleInGnb.style.opacity= '1';
    }
});

let bodyHeight = window.innerHeight;
console.log(bodyHeight);

document.addEventListener('scroll', function() {
    if (window.scrollY > bodyHeight / 4) {
        topIcon.classList.add('scrolling');
    } else {
        topIcon.classList.remove('scrolling');
    }
});
// e: scrolling

// s: history back
let backIcon = document.querySelector('.ic_arrow.back');
let topIcon = document.querySelector('.ic_arrow.top');
topIcon.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});
backIcon.addEventListener('click', function() {
    window.history.back();
});
// e: history back
