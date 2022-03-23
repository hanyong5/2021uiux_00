<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$list_count = (is_array($list) && $list) ? count($list) : 0;

$thumb_width = 210;
$thumb_height = 150;


?>


	<div class="mySkin">
        <div class="title">
            <h3><a href="<? echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h3>
            <a class="icon" href="<? echo get_pretty_url($bo_table); ?>">
                more
            </a>
        </div>
        <ul class="content">
           <?php for ($i=0; $i<$list_count; $i++) {  
			  $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

				if($thumb['src']) {
					$img = $thumb['src'];
				} else {
					$img = G5_IMG_URL.'/no_img.png';
					$thumb['alt'] = '이미지가 없습니다.';
				}
				$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >'; 
			   
			  ?>
			<li>
                <a href="<? echo get_pretty_url($bo_table, $list[$i]['wr_id'])?>">
                    <div class="txtWrap">
                        <div class="imgWrap">
                            <img src="<? echo $img ?>" alt="">
                        </div>
                        <h4><? echo $list[$i]['subject']; ?></h4>
                    </div>
                    <p class="date"><?php echo $list[$i]['datetime2'] ?></p>
                </a>
            </li>
			<? } ?>
            
        </ul>
    </div>



