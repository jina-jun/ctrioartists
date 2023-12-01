// s: window resizing
document.querySelector('.profile').style.minHeight = document.querySelector('.profile_img-main').offsetHeight + 'px';
window.addEventListener("resize", function() {
    document.querySelector('.profile').style.minHeight = document.querySelector('.profile_img-main').offsetHeight + 'px';
    
})
// e: window resizing