<?php
$config=[
    'host'=>'127.0.0.1',
    'port'=>'3306',
    'dbname'=>'shop',
    'user'=>'root',
    'pass'=>'root'
];

$dbh=new PDO("mysql:host={$config['host']};dbname={$config['dbname']}",$config['user'],$config['pass']);

$name=$_POST['user_name'];
$password=$_POST['user_pwd'];
$account="";
if (strpos($name, '@')) {
    $account="email";
} else {
    $account="user_name";
}
$sql="select * from p_user where "."$account="."'$name'".'    '.'and'.'    '."password="."'$password'";

    $stmt=$dbh->prepare($sql);
    $stmt->bindParam('user_name',$name);
    $stmt->bindParam('password',$pwd);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if($res){
        echo "登录成功";
        header("refresh:2,url='/test/list.html'");
    }else{
        echo "登录失败";
        header("refresh:2,url='/test/login.html'");
    }
