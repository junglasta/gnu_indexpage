<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 380; // 400
$thumb_height = 240; // 300
?>
<!-- 스와이퍼 cdn -->
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/dist/css/swiper.min.css">
<script src="<?php echo $latest_skin_url ?>/dist/js/swiper.min.js"></script>

<div class="swiper-button-prev" style="display: inline-block;"></div>

<div class="swiper-container swiper1">
    <div class="swiper-wrapper">

        <?php
        for ($i=0; $i<count($list); $i++) {
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

        if($thumb['src']) {
            $img = $thumb['ori'];
        } else {
            $img = $latest_skin_url.'/img/noimg.png';
            $thumb['alt'] = '등록된 이미지가 없습니다.';
        }
        //$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
        $img_content = $img;
        ?>
<style>
.swiper-button-prev{
    background: url(/sjy/img/prev_arrow.png) no-repeat 0 0; left: 256px;
    width: 44px; height: 84px; top: 50%;
}
.swiper-button-next{
    background: url(/sjy/img/next_arrow.png) no-repeat 0 0; right: 256px;
    width: 44px; height: 84px; top: 50%;
}
.swiper-button-prev::after, .swiper-button-next::after { content: ''; }
</style>

        <div class="swiper-slide" onclick="location.href='<?php echo $list[$i]['href'] ?>';" style="cursor: pointer; width: 100%; border-top-right-radius: 40px;">
            <!-- <div class="sw_date d-none">
                <?php echo $list[$i]['name'] ?>　
                
                <?php if($list[$i]['ca_name']) { ?>
                    <?php echo $list[$i]['ca_name'] ?>　
                <?php } ?>
                
                <?php echo $list[$i]['datetime'] ?>　
                
                <?php if($list[$i]['wr_comment']) { ?>
                    <?php echo $list[$i]['wr_comment'] ?>　
                <?php } ?>
                
                <?php if ($list[$i]['icon_new']) echo "<span style=\"color:#FF6666\">NEW<span class=\"sound_only\">새글</span></span>"; ?>
            </div> -->

            <a href="" style="text-decoration : none; color:black;">
                <div class="sw_img" style="background-image: url('<?php echo $img_content; ?>');">
                </div>
                
                <div class="sw_text">
                    <div class="sw_tit">
                        <?php echo $list[$i]['subject'] ?>
                    </div>
                    
                    <div class="sw_sub">
                        <?php echo cut_str(strip_tags($list[$i]['wr_content']), 80)?>
                    </div>

                    <span>제품 바로가기</span>
                </div>
            </a>
        </div>

        <?php }  ?>
        <?php if (count($list) == 0) { //게시물이 없을 때  ?>
        <div class="swiper-slide">
            <div class="sw_sub">
                등록된 게시물이 없습니다.
            </div>
        </div>
        <?php }  ?>

    </div>
    <!-- 페이징 -->
    <!-- <div class="swiper-pagination swiper-pagination1"></div> -->
</div>
<div class="swiper-button-next" style="display: inline-block;"></div>

<script>
    var swiper1 = new Swiper('.swiper1', {
        pagination: '.swiper-pagination1',
        slidesPerView: 3,
        spaceBetween: 15,
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        loop: true, // 루프(반복)옵션 활성화시 주석해제
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        centeredSlides: true,
    });
</script>