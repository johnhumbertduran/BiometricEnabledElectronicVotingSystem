<?php

session_start();

$donevote = md5($_SESSION['idNumber']);
$logging = md5($donevote);
$charactssss = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$ksl = md5(rand(0, 3));
$oai = substr(str_shuffle($charactssss), 0, 5);

unset($_SESSION['idNumber']);

session_unset();
session_destroy();

echo "Logging out... Please wait...";

header('Location: ../?finished_voting=' . $donevote . "&&" . $oai . "_" . $ksl . "=" . $logging);
exit();
