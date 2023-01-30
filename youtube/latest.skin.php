<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

    <?php for ($i=0; $i<$list_count; $i++) {  ?>
        <iframe width="590" height="394" src="https://www.youtube.com/embed/<?php echo $list[$i]['subject']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>

    <?php }  ?>
    