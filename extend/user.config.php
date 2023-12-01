<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가;

if(!isset($_SERVER["HTTPS"])) { 
	header('Location: https://www.ctrioent.co.kr');
}
