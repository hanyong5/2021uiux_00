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

<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
	
   
<!-- 여기만 손대세요 start -->



    <div id="hd_wrapper">

        <div id="logo">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_IMG_URL ?>/logo01.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>
    
        <nav id="gnb">
        <h2>메인메뉴</h2>
        <div class="gnb_wrap" >
            <ul id="gnb_1dul">
                
                <?php
				$menu_datas = get_menu_db(0, true);
				$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                $i = 0;
                foreach( $menu_datas as $row ){
                    if( empty($row) ) continue;
                    $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
                ?>
                <li class="gnb_1dli <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                    <?php
                    $k = 0;
                    foreach( (array) $row['sub'] as $row2 ){

                        if( empty($row2) ) continue; 

                        if($k == 0)
                            echo '<span class="bg">하위분류</span><div class="gnb_2dul"><ul class="gnb_2dul_box">'.PHP_EOL;
                    ?>
                        <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                    <?php
                    $k++;
                    }   //end foreach $row2

                    if($k > 0)
                        echo '</ul></div>'.PHP_EOL;
                    ?>
                </li>
                <?php
                $i++;
                }   //end foreach $row

                if ($i == 0) {  ?>
                    <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                <?php } ?>
            </ul>
            
        </div>
    </nav>
        
    </div>



<!-- 여기만 손대세요 end -->

    
    
    
</div>
<!-- } 상단 끝 -->


<hr>

<? if(defined("_INDEX_")){?>

<!-- 메인시작 -->
<script>
	$(function(){
		$(".slider").bxSlider({auto:true})
	});
</script>
<div class="sliderWrap">

<ul class="slider">
	<li><img src="<? echo G5_THEME_IMG_URL ?>/pc01.jpg" alt="이미지1"></li>
	<li><img src="<? echo G5_THEME_IMG_URL ?>/pc02.jpg" alt="이미지1"></li>
	<li><img src="<? echo G5_THEME_IMG_URL ?>/pc03.jpg" alt="이미지1"></li>
</ul>

</div>


<!-- 메인끝 -->
<?}else{?>
<style>
	.container{
	height:230px;
	background-position: center;
	background-repeat: no-repeat;
	background-size:cover;
	display:flex;justify-content:center;align-items:center;
	flex-direction:column;
	font-size: 2em;color:white
	}
	.container .txtWrap{transform:translateY(-20px);text-align: center;text-shadow:0 0 10px black}
	.container .loc1D{margin-bottom: 5px;}
	.container .txt{font-size: 0.6em;}
	.container.subTopBg_01{
		background-image: url(<? echo G5_THEME_IMG_URL ?>/pc01.jpg);
	}
	.container.subTopBg_04{
		background-image: url(<? echo G5_THEME_IMG_URL ?>/pc02.jpg);
	}
</style>

	<div id="page_title" class="container sbtImg">
		<div class="txtWrap">
			<h2 class="loc1D"></h2>
			<div class="txt">&nbsp;</div>
		</div>
	</div>


	<script>
	window.onload = function(){
				console.log( $(".loc1D").html() );
				

				if ( $(".loc1D").html() == "회사소개"){
					$(".container .txt").html("안녕하세요")
				}
				if ( $(".loc1D").html() == "커뮤니티"){
					$(".container .txt").html("회사는 고객과 함께 합니다.")
				}	
					
	}
	
	</script>

<?}?>





<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container" <?php if (!defined("_INDEX_")) { ?>style="width:1240px;margin:0 auto"<?}?>>
        <?php if (!defined("_INDEX_")) { ?>

		<div class="loaction">
			<div class="loc"><a href="<?php echo G5_URL ?>">HOME</a> > <span class="loc1D"></span> > <?php echo get_head_title($g5['title']); ?></div>
		</div>
		<h2 id="container_title">
			<span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span>
		</h2>
		<?php }?>



		