<?php
$config=[
    'host'=>'127.0.0.1',
    'port'=>'3306',
    'dbname'=>'shop',
    'user'=>'root',
    'pass'=>'root'
];

$dbh=new PDO("mysql:host={$config['host']};dbname={$config['dbname']}",$config['user'],$config['pass']);


$name=$_POST['u_name'];
$email=$_POST['u_email'];
$password=$_POST['u_pwd'];
$passwords=$_POST['u_pwds'];
if($password != $passwords){
    echo "密码图确认密码不一致";
    header("refresh:2,url='/user/reg.html'");die;
}
$wyx="select * from p_user where user_email="."'$email'";
$stmt=$dbh->prepare($wyx);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($res){
    echo "此邮箱已存在";
    header("refresh:2,url='/user/reg.html'");die;
}

$sql="INSERT INTO p_user (`user_name`,`user_email`,`password`) values ('{$name}','{$email}','{$password}')";
$stmt=$dbh->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "注册成功";
    header("refresh:2,url='/user/login.html'");die;

