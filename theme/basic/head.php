<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="application-name" content="CTRIO ENTERTAINMENT">
    <meta name="msapplication-tooltip" content="CTRIO ENTERTAINMENT">
    <meta property="og:url" content="https://www.ctrioent.co.kr/">
    <meta property="og:image" content="https://www.ctrioent.co.kr/res/imgs/thumbnail.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="CTRIO ENTERTAINMENT">
    <meta property="og:locale" content="ko">
    <meta property="og:title" content="CTRIO ENTERTAINMENT">
    <meta property="og:description" content="씨트리오 엔터테인먼트는 대중문화를 리드할 재능 있는 예술인과 연기자 발굴 및 육성을 목표로 다양한 사업을 시행 및 도전하고 있는 종합 엔터테인먼트입니다.">
    <link rel="canonical" href="https://www.ctrioent.co.kr/">
    <link rel="shortcut icon" href="/favicon/favicon.ico" type="image/ico">
    <link rel="apple-touch-icon" href="./res/imgs/favicon/apple-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="./res/imgs/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./res/imgs/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./res/imgs/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./res/imgs/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./res/imgs/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./res/imgs/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./res/imgs/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./res/imgs/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./res/imgs/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./res/imgs/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./res/imgs/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./res/imgs/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./res/imgs/favicon/favicon-16x16.png">

    <link rel="stylesheet" href="./res/css/common.css">
    <link rel="stylesheet" href="./res/css/responsive.css">
    <script src="./res/js/common.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiko:wght@400;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>CTRIO ENTERTAINMENT</title>
</head>
<body>
    <nav class="gnb">
    <a href="https://www.ctrioent.co.kr/" class="wrap_logo">
        <h1>CTRIO ENT.</h1>
        <div class="logo"></div>
    </a>
    <p class="page_title-inGnb"><?php echo get_head_title($g5['title']); ?></p>
    <div class="wrap_icon">
        <a onclick="menuControl()" class="icon ic_menu"></a>
        <a href="javascript:alert('준비중입니다.');" onfocus="this.blur()" class="icon ic_twitter"></a>
        <a href="javascript:alert('준비중입니다.');" onfocus="this.blur()" class="icon ic_instagram"></a>
        <a href="javascript:alert('준비중입니다.');" onfocus="this.blur()" class="icon ic_youtube"></a>
    </div>
</nav>
<div class="page_title">
    <p><?php echo get_head_title($g5['title']); ?></p>
</div>
<!-- s: menu -->
<div class="close_menu_window">
    <div class="container_menu_window">
        <div class="menu_content-top">
            <p>COURTESY</p>
            <ul class="wrap_menu-items">
                <li class="menu-item">
                    <a href="https://www.ctrioent.co.kr/about_ctrio">ABOUT C-TRIO</a>
                </li>
                <li class="menu-item">
                    <a href="https://www.ctrioent.co.kr/artists">ARTIST</a>
                </li>
                <li class="menu-item">
                    <a href="https://www.ctrioent.co.kr/casting">CASTING</a>
                </li>
                <li class="menu-item">
                    <a href="https://www.ctrioent.co.kr/news">NEWS</a>
                </li>
                <li class="menu-item">
                    <a href="https://www.ctrioent.co.kr/contact">CONTACT</a>
                </li>
            </ul>
            <p>CONSIDERATION</p>
        </div>
        <div class="menu_content-bottom">
            <p>COMMUNICATION</p>
        </div>
    </div>
</div>
<!-- e: menu -->

<script>
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
</script>

<hr>

<!-- 콘텐츠 시작 { -->
<section id="wrapper">
    <div id="container_wr">
        <div id="container">
            <?php if (!defined("_INDEX_")) { ?><?php }