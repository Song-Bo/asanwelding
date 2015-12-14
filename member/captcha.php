<?
	session_start();
	header("Content-type: image/jpeg");
	$random_str=substr(md5(rand()),0,6);
	$_SESSION['captcha']=$random_str;
	$newImage = imagecreatefromjpeg("cap_bg.jpg");
	$txtColor = imagecolorallocate($newImage, 250, 40, 40);
	imagestring($newImage, 6, 6, 6, $random_str, $txtColor);
	imagejpeg($newImage);
?>
