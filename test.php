<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- 根据图片尺寸自定义width -->
<div style="width: 400px;float: left;">
	
<?php

// 选择图片
$i = imagecreatefromjpeg("g4.jpg");

// 选择目标RGB值
$newsas = pa(245,237,9);

// 遍历获取所有像素点 
for ($x = 0; $x < imagesx($i); $x++) {
	echo '<div style="width:100%;float:left">';
    for ($y = 0; $y < imagesy($i); $y++) {
        $rgb = imagecolorat($i, $x, $y);
        $r   = ($rgb >> 16) & 0xFF;
        $g   = ($rgb >> 8) & 0xFF;
        $b   = $rgb & 0xFF;
        // RGB中加权平均值，其他比例 0.3：0.59：0.1
        $gray = 0.299 * $r + 0.578 * $g + 0.114 * $b;
        // 输出目标值
        echo '<span style="width:1px;height:1px;background-color:rgba('.$gray*$newsas[0].','.$gray*$newsas[1].','.$gray*$newsas[2].',1);float:left;"></span>';

    }
    echo "</div>";
}
function pa($a, $b, $c) {
	$total = $a + $b + $c;
	return [$a/$total, $b/$total, $c/$total];
}
?>
</div>
</body>
</html>