<?php
session_start();

$_SESSION['is_login'] = 0;
#接受提交过来的用户名及密码
$password = trim($_POST['password']);//密码
if($password == '123'){
  //重定向浏览器 
$_SESSION['is_login']=1;
header("Location:show.php?zxvf=source"); 
//确保重定向后，后续代码不会被执行 
exit;
 
}else{
$_SESSION['is_login']=0;
header("Location:index.php"); 
//确保重定向后，后续代码不会被执行 
exit;
}
?>