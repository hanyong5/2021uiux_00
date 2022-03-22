<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>
<script>
	$(function(){
		$(".slider").bxSlider()
	});
</script>
<ul class="slider">
	<li><img src="<? echo G5_THEME_IMG_URL ?>/pc01.jpg" alt="이미지1"></li>
	<li><img src="<? echo G5_THEME_IMG_URL ?>/pc02.jpg" alt="이미지1"></li>
	<li><img src="<? echo G5_THEME_IMG_URL ?>/pc03.jpg" alt="이미지1"></li>
</ul>

<?php
include_once(G5_THEME_PATH.'/tail.php');