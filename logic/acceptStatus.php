<?php
require_once 'controller.php';

if(!isset($_SESSION['isAdmin']) OR !isset($_GET['id'])){
    header('location: http://localhost/senntra-Bend1/dashboard/');
}
mysqli_query($conn,"UPDATE aspirasis
                        SET status = 1
                    WHERE id = {$_GET['id']}");

addLog("{$_SESSION['isAdmin']} telah mengupdate status aspirasi {$_GET['id']}", $_SESSION['isAdmin']);

header("location: http://localhost/senntra-Bend1/dashboard/#{$_GET['id']}");