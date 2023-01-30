<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

    <ul class="ft_info p-md-0 px-2">
    <?php for ($i=0; $i<$list_count; $i++) {  ?>
        <li>
            <?php echo $list[$i]['wr_content'] ?>
        </li>
    <?php }  ?>
    </ul>
