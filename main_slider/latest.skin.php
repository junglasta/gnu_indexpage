<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$thumb_width = 1920;
$thumb_height = 680;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/slick/slick.css">', 0);
add_javascript('<script src="'.$latest_skin_url.'/slick/slick.min.js"></script>', 0);
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$list_count = (is_array($list) && $list) ? count($list) : 0;
?>
<div class="main_slider">
    <?php
    for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['ori'];
    } else {
        $img = $latest_skin_url.'/img/no_img.png';
    }

	$txt_big = $list[$i]['wr_subject'];
	$txt_small = $list[$i]['wr_content'];

	$list[$i]['href'] = ($list[$i]['wr_link1'])?$list[$i]['wr_link1']:$list[$i]['href'];

    ?>
	<div style="background-color:<?php echo $txt_big;?>">
		<div class="slide" style="background:#1f202a url(<?php echo $img;?>) no-repeat 50% 0;">
			<div class="wrap">
				<!-- <div class="txt_box">
					<strong class="txt_big"><?php echo $txt_big;?></strong>
					<span><?php echo $txt_small;?></span>
				</div>
				<a href="<?php echo $list[$i]['href'] ?>" class="ico_more">더보기</a> -->
			</div>
		</div>
	</div>
    <?php }  ?>
    <?php
	if (count($list) == 0) { //게시물이 없을 때
		for ($i=1; $i<=3; $i++) {
	?>
	<div class="slide" style="background:#1f202a url(<?php echo $latest_skin_url;?>/img/bg_visual_0<?php echo $i;?>.jpg) no-repeat 50% 0;">
		<div class="wrap">
			<div class="txt_box">
				<strong class="txt_big">IMAGE 0<?php echo $i;?></strong>
				<span>쉽게 관리하는 배너스킨</span>
			</div>
			<a href="#" class="ico_more">더보기</a>
		</div>
	</div>
	<?php
		} //for
	}  //if
	?>
</div>

<script type="text/javascript">
	$(function(){
		$(".main_slider").slick({
			dots: false,
			arrows:true,
			infinite: true,
			autoplay:true,
			autoplaySpeed:2000,//2초
			prevArrow: "<button type='button' class='btn_arrow btn_prev'>PREV</button>",
			nextArrow: "<button type='button' class='btn_arrow btn_next'>NEXT</button>"
		});
	});
	$('.slick-dots, .slick-arrow').on('click', function() {
		$('.main_slider').slick('slickPlay');
	});
</script>