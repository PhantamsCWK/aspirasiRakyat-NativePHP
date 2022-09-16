<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");

$conn = mysqli_connect('localhost','root','','aspirasirakyat');

function query($query) {
    global $conn;

    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function send($data) {
    global $conn;

    $name = $data['name'];
    $address = $data['address'];
    $categoryId = $data['category'];
    $message = $data['message'];
    $time = date("Y-m-d H:i:s");

    $category = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM categories WHERE id=$categoryId"));

    $gambar = "{$category['name']}.jpg";

    if ($_FILES['foto']['error'] !== 4) {
        $gambar = sendFile();
    }

    mysqli_query($conn, "INSERT INTO penduduks (name,address,created_at,updated_at) 
                        VALUES ('$name','$address','$time','$time')");

    $data = query("SELECT id FROM penduduks WHERE name='$name' AND address='$address' AND created_at='$time'");

    mysqli_query($conn, "INSERT INTO aspirasis (category_id,penduduk_id,message,image,created_at,updated_at) 
                        VALUES ($categoryId,{$data[0]['id']},'$message','$gambar',NOW(),NOW())");

    if (mysqli_affected_rows($conn) > 0) {
        return $_SESSION['success'] = 'berhasil';
    }
    return $_SESSION['error'] = 'salah';
}

function sendFile() {
    $nameFile =$_FILES["foto"]["name"];
    $sizeFile =$_FILES["foto"]["size"];
    $tmpName =$_FILES["foto"]["tmp_name"];

    $ekstensiFile = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiFile)){
        echo"<script>
                alert('Yang Anda bukan Upload Gambar!!!')
            </script>";
        return false;
    }
  
    if($sizeFile > 3000000 ){
        echo"<script>
              alert('Ukuran Gambar Terlalu Besar!!!')
        </script>";
        return false;
    }
  
      $nameFileNew = uniqid();
      $nameFileNew .= '.';
      $nameFileNew .= $ekstensiGambar;
  
      move_uploaded_file($tmpName,'resource/img/'.$nameFileNew);
      return $nameFileNew;
}

function sendFeedback($data){
    global $conn;

    $feedback =  $data['feedback'];
    $isAdmin = isset($_SESSION['isAdmin']) ? 1 : 0;
    $aspirasiId = $data['aspirasi_id'];
    $time = date("Y-m-d H:i:s");
    mysqli_query($conn, "INSERT INTO feedback (aspirasi_id,feedback,isAdmin,created_at,updated_at)
                            VALUES ($aspirasiId,'$feedback',$isAdmin,'$time','$time')");

    $feedbackId = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM feedback WHERE feedback = '$feedback' AND created_at = '$time'"));
    if(mysqli_affected_rows($conn) > 0) {
        if (routeName() == 'index.php') {
            return header("location: http://localhost/senntra-Bend1/dashboard/?id=$aspirasiId#{$feedbackId['id']}");
        }elseif (routeName() == 'aspirasis.php') {
            return header("location: http://localhost/senntra-Bend1/aspirasis.php?id=$aspirasiId#{$feedbackId['id']}");
        }

    }
    return "salah";
}

function isAdmin($data){
    global $conn;

    $name = $data['name'];
    $password = $data['password'];

    $adminRaw = mysqli_query($conn, "SELECT username, password FROM admins WHERE username = '$name' AND password = '$password'");

    $admin = mysqli_fetch_assoc($adminRaw);

    if(!mysqli_num_rows($adminRaw) > 0) {
        return false;
    }

    if($admin['username'] === $name AND $admin['password'] === $password) {
        $_SESSION['isAdmin'] = 'qwertyu';

        return true;
    }

    return false;
}

function routeName() {
    $route = $_SERVER['PHP_SELF'];
    $route = explode('/',$route);
    return end($route);
}

function makeEpoch($data) {
    $result = explode(' ',$data);
    $date = explode('-',$result[0]);
    $time = explode(':',$result[1]);
    $result = mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
    return $result;
}