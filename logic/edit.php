<?php
require_once 'controller.php';

if (!isset($_GET['id'])) {
    echo"<script>
            window.location = 'index.php';
        </script>";
        die;
}

if (isset($_POST['submit'])){
    if(update($_POST)>0){
        echo"<script>
                alert('update data succesful');
                window.location = 'index.php';
            </script>";
    }else{
        echo"<script>
                alert('update data failed');
            </script>";
        // echo mysqli_error($DB);
    }
}

$oldData = query("SELECT * FROM buku WHERE id = {$_GET['id']}");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<div class="container">
<?php foreach($oldData as $old): ?>
    <form class="row" action="" method="post">
        <h1 class="my-5">Create Data</h1>
        <input type="hidden" name="id" value="<?=$old['id']?>">
        <div class="col-md-6">
          <label for="jenis" class="form-label">Jenis</label>
          <input type="text" class="form-control" name="jenis" id="jenis"  value="<?=$old['jenis_buku']?>">
        </div>

        <div class="col-md-6">
          <label for="isbn" class="form-label">NO.ISBN</label>
          <input type="text" class="form-control" name="isbn" id="isbn"  value="<?=$old['no_isbn']?>">
        </div>

        <div class="col-12 mt-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul"  value="<?=$old['judul_buku']?>">
        </div>
            
        <div class="col-md-6">
          <label for="pengarang" class="form-label">Pengarang</label>
          <input type="text" class="form-control" name="pengarang" id="pengarang"  value="<?=$old['pengarang']?>">
        </div>

        <div class="col-md-6">
          <label for="penerbit" class="form-label">Penerbit</label>
          <input type="text" class="form-control" name="penerbit" id="penerbit"  value="<?=$old['penerbit']?>">
        </div>

        <div class="col-1 mt-3">
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </div>
                
        <div class="col-1 mt-3">
            <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    
        </form>
<?php endforeach;?>
</div>
</body>
</html>