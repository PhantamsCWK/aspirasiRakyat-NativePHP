<?php
require_once 'controller.php';

if(!isset($_SESSION['isAdmin']) OR !isset($_GET['id'])){
    header('location: http://localhost/senntra-Bend1/dashboard/');
}
mysqli_query($conn,"DELETE FROM aspirasis WHERE id = {$_GET['id']}");
mysqli_query($conn,"DELETE FROM penduduks WHERE id = {$_GET['id']}");
mysqli_query($conn,"DELETE FROM feedback WHERE aspirasi_id IN({$_GET['id']})");

header('location: http://localhost/senntra-Bend1/dashboard/');