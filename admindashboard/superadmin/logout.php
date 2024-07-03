<?php

session_start();

$logout = md5($_SESSION['username']);
$out = md5($logout);
$permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$quw = md5(rand(0, 3));
$lsk = substr(str_shuffle($permitted_chars), 0, 5);

unset($_SESSION['username']);

session_unset();
session_destroy();

echo "Logging out... Please wait...";

header('Location: ../?logout=' . $logout . "&&" . $lsk . "_" . $quw . "=" . $out);
exit();
