<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 373;
$thumb_height = 398;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<!-- <div class="pic_lt"> -->
    <!-- <h2 class="lat_title"><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h2> -->

    <ul>
    <?php for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['ori'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
        <li class="gallery_li">
            <a href="<?php echo $wr_href; ?>" class="lt_img"><?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?>
                <span><img src="/sjy/img/<?php echo $list[$i]['subject']; ?>" alt=""></span>
                <h3><?php echo $list[$i]['wr_content']; ?></h3>
            </a>
            
            <!-- <?php echo "<a href=\"".$wr_href."\"> ";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];
            echo "</a>";
            ?> -->

        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?><?php }  ?>
    </ul>




<!-- </div> -->
