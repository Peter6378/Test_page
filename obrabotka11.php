<?php

$db_host = 'localhost'; 
$db_user = 'login'; 
$db_password = '123'; 
$database = 'testbd1'; 

$link = mysql_connect($db_host, $db_user, $db_password);
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
    die ("Не удалось выбрать базу $database: " . mysql_error());
}

if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['newlogin']) || empty($_POST['newpassword']) || empty($_POST['confirmnewpassword'])) {
    exit ("Vi ne vveli info v polya!");
}

if (isset($_POST['login']) && $_POST['login'] != '') {
	$login = mysql_real_escape_string(trim($_POST['login'])); 
}

	$max_simbols = 25;
	$var = strip_tags($login);
	$count_var = count(preg_split("//u",$var,-1,PREG_SPLIT_NO_EMPTY));

	if($count_var > $max_simbols) {
	die ("Everything BAD");
}

if (isset($_POST['newlogin']) && $_POST['newlogin'] != '') {
	$newlogin = mysql_real_escape_string(trim($_POST['newlogin'])); 
}

	$max_simbols = 25;
	$var = strip_tags($newlogin);
	$count_var = count(preg_split("//u",$var,-1,PREG_SPLIT_NO_EMPTY));

	if($count_var > $max_simbols) {
	die ("Everything BAD");
}

if  (!preg_match('/([a-zA-Z])?/',$newlogin)) {
	die ("Everything bad");	
}

if (isset($_POST['password']) && $_POST['password'] != '') {
	$password = trim($_POST['password']);
}

$max_simbols1 = 20;
$min_simbols1 = 9;
$var1 = strip_tags($password);
$count_var1 = count(preg_split("//u",$var1,-1,PREG_SPLIT_NO_EMPTY));
		
if($count_var1 > $max_simbols1 || $count_var1 < $min_simbols1){
	die ("Everything BAD1");
}

if (isset($_POST['newpassword']) && $_POST['newpassword'] != '') {
	$newpassword = trim($_POST['newpassword']);
}

$var1 = strip_tags($newpassword);
$count_var1 = count(preg_split("//u",$var1,-1,PREG_SPLIT_NO_EMPTY));

if($count_var1 > $max_simbols1 || $count_var1 < $min_simbols1){
	die ("Everything BAD2");
}

if (isset($_POST['confirmnewpassword']) && $_POST['confirmnewpassword'] != '') {
	$confirmnewpassword = trim($_POST['confirmnewpassword']);
}

$var1 = strip_tags($confirmnewpassword);
$count_var1 = count(preg_split("//u",$var1,-1,PREG_SPLIT_NO_EMPTY));

if($count_var1 > $max_simbols1 || $count_var1 < $min_simbols1){
	die ("Everything BAD3");
}
  
if ($newpassword !== $confirmnewpassword) {
	exit ("Sorry Bitch, check your info");
}

$sql = "UPDATE `users` SET `login`='$newlogin', `password`=MD5('$newpassword') WHERE `login`='$login' AND `password`=MD5('$password')";

$result = mysql_query($sql, $link);
$result1 = mysql_affected_rows();
if ($result && $result1 == 1) {
	echo "Everything is pek vadrya";
} else {
	echo "Houston, we have a problem!";
}
	
mysql_close($link);
?>