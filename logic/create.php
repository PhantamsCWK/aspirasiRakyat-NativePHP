<?php
require_once 'controller.php';

if(isset($_POST['submit'])){
    if(store($_POST) > 0){
        echo"<script>
                alert('create data succesful');
                window.location = 'index.php';
            </script>";
    }else{
        echo"<script>
                alert('create data failed');
            </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <form class="row" action="" method="post">
        <h1 class="my-5">Create Data</h1>
        <div class="col-md-6">
          <label for="jenis" class="form-label">Jenis</label>
          <input type="text" class="form-control" name="jenis" id="jenis">
        </div>

        <div class="col-md-6">
          <label for="isbn" class="form-label">NO.ISBN</label>
          <input type="text" class="form-control" name="isbn" id="isbn">
        </div>

        <div class="col-12 mt-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul">
        </div>
            
        <div class="col-md-6">
          <label for="pengarang" class="form-label">Pengarang</label>
          <input type="text" class="form-control" name="pengarang" id="pengarang">
        </div>

        <div class="col-md-6">
          <label for="penerbit" class="form-label">Penerbit</label>
          <input type="text" class="form-control" name="penerbit" id="penerbit">
        </div>

        <div class="col-1 mt-3">
            <button type="submit" class="btn btn-primary" name="submit">Create</button>
        </div>
                
        <div class="col-1 mt-3">
            <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    
        </form>
</div>
</body>
</html>