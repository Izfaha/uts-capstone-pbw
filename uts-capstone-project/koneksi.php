<?php
date_default_timezone_set('Asia/Jakarta');

$servername = "mariadb"; // ini harus pake nama service di docker compose nya
$username = "root";
$password = "";
$db = "webdailyjournal"; // harus inisialisasi db di docker compose nya 

$conn = new mysqli($servername,$username,$password,$db);

if($conn->connect_error){
    die("[ERR] connection failed : ".$conn->connect_error);
} // echo "connection successfully<hr>";
?>