<?php 
session_start();
    if($_SESSION['is_login'] != 1){
    header("Location:gate.php");
    }             
?>
<!DOCTYPE html>
<html lang="zh-hans">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>share</title>
<link rel="stylesheet" href="css/fluidity.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.7.2.min.js"></script>
</head>
<body>
    <?php
//文件类型
function is_img($file_name, $pass_type = array('jpg','jpeg','gif','bmp','png') )
{
    // 允许文件类型的后缀组成的数组
    $file = $pass_type;
    // 截取上传文件的文件名的后缀
    $kzm  = substr(strrchr($file_name,"."),1);
    // 判断此后缀是否在数组中
    $is_file = in_array(strtolower($kzm),$file);
    if($is_file)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function is_video($file_name, $pass_type = array('mp4','wmv','ogg','flv','mkv') )
{
    // 允许文件类型的后缀组成的数组
    $file = $pass_type;
    // 截取上传文件的文件名的后缀
    $kzm  = substr(strrchr($file_name,"."),1);
    // 判断此后缀是否在数组中
    $is_file = in_array(strtolower($kzm),$file);
    if($is_file)
    {
        return true;
    }
    else
    {
        return false;
    }
}
//字符处理
function str_split_utf8($str) { 
    // place each character of the string into and array 
    $split = 1; 
    $array = array(); $len = strlen($str);
    for ( $i = 0; $i < $len; ){ 
        $value = ord($str[$i]); 
        if($value > 0x7F){ 
            if($value >= 0xC0 && $value <= 0xDF) 
                $split = 2; 
            elseif($value >= 0xE0 && $value <= 0xEF) 
                $split = 3; 
            elseif($value >= 0xF0 && $value <= 0xF7) 
                $split = 4;
            elseif($value >= 0xF8 && $value <= 0xFB) 
                $split = 5; 
            elseif($value >= 0xFC) 
                $split = 6; 
                 
        } else {
            $split = 1; 
        } 
        $key = ''; 
        for ( $j = 0; $j < $split; ++$j, ++$i ) { 
            $key .= $str[$i]; 
        } 
        $array[] = $key;
    } 
    return $array; 
}

//文件遍历
 function traverse($path = 'source/') {
    $current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
    while(($file = readdir($current_dir)) !== false) {    //readdir()返回打开目录句柄中的一个条目
        $sub_dir = $path . DIRECTORY_SEPARATOR . $file;    //构建子目录路径
        if($file == '.' || $file == '..') {
            continue;
        } else if(is_dir($sub_dir)) {    //如果是目录,进行递归
            echo '<hr><a onclick="getUrl(this)" class="dir">' ."/".iconv("GBK", "UTF-8", $file). '</a>';
			//.substr($path,7).'/'.
            //traverse($sub_dir);
        } else { //如果是文件,直接输出
            if(is_img($file)){
            echo '<img src=" ' . iconv("GBK", "UTF-8", $path) .'/'.iconv("GBK", "UTF-8", $file) . '">';
                }
            else if(is_video($file)){
                echo '<video src=" ' .iconv("GBK", "UTF-8", $path) .'/'.iconv("GBK", "UTF-8", $file) . '" controls>Cannot play the video</video><hr>';
            }
        }
    }
}

$source = $_GET['zxvf'];
echo $source;

traverse(iconv("UTF-8","GBK",$source));
?>


<script>

<?php 
echo 'function getUrl(obj){';


echo 'window.location.href="show.php?zxvf='.$source .'" + obj.innerText';


echo '}';

?>


</script>
     </body>
	 
 </html>