<?php
require_once 'controller.php';

if(!isset($_SESSION['isAdmin']) OR !isset($_GET['id'])){
    header('location: http://localhost/senntra-Bend1/dashboard/');
}
$image = query("SELECT image FROM aspirasis WHERE id = {$_GET['id']}");

mysqli_query($conn,"DELETE FROM aspirasis WHERE id = {$_GET['id']}");
mysqli_query($conn,"DELETE FROM penduduks WHERE id = {$_GET['id']}");
mysqli_query($conn,"DELETE FROM feedback WHERE aspirasi_id IN({$_GET['id']})");
unlink("../resource/img/{$image[0]['image']}");

addLog("{$_SESSION['isAdmin']} telah menghapus aspirasi dengan id {$_GET['id']}",$_SESSION['isAdmin']);

header('location: http://localhost/senntra-Bend1/dashboard/');