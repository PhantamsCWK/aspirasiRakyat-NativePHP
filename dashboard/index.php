<?php

  require_once '../logic/controller.php';
    if(!isset($_SESSION['isAdmin'])) {
        header('location: http://localhost/senntra-Bend1/');
    }

    if (isset($_GET['id'])) {
      require_once 'templates/aspirasi.php';
      die;
    }
  $categories = mysqli_query($conn, "SELECT name FROM categories");

  $aspirasis = mysqli_query($conn,"SELECT a.id, a.message, a.status, c.name, a.created_at, a.image
                  FROM aspirasis AS a JOIN categories AS c ON (c.id = category_id) 
                  ORDER BY created_at DESC");

  if (isset($_POST['tampilkan'])) {
    if (!empty($_POST['month']) OR !empty($_POST['category'])) {
      // var_dump('ini ada');die;
      $aspirasis = searchingAspirasi($_POST);
    }
    if($_POST['status'] == 0 OR $_POST['status'] == 1){
      $aspirasis = mysqli_query($conn,"SELECT a.id, a.message, a.status, c.name, a.created_at, a.image
                                  FROM aspirasis AS a JOIN categories AS c ON (c.id = category_id) 
                                  WHERE a.status LIKE '%{$_POST['status']}%' 
                                  ORDER BY created_at DESC");
    }
  }
?>

<?php 
require_once '../templates/header.php';
?>
<link rel="stylesheet" href="../resource/css/dashboard.css">
</head>
<body>
<?php require_once 'partials/navbar.php';?>
<div class="container-fluid">
  <div class="row">
    <?php require_once 'partials/sidebar.php'?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Aspirasi</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <form action="" method="post">
            <div class="d-flex align-items-center justify-content-end gap-2">
              <select class="form-select form-select-sm" aria-label="Default select example" name="status">
                <option value="">Status</option>
                <?php
                  $status = ['0' => 'Not yet', '1' => 'Finnish'];
                  foreach ($status as $key => $s):
                  if($_POST['status'] == $key):
                ?>
                  <option value="<?=$key?>" selected><?=$s?></option>
                <?php else:?>
                  <option value="<?=$key?>"><?=$s?></option>
                <?php
                  endif;
                  endforeach;
                ?>
              </select>
              <select class="form-select form-select-sm" aria-label="Default select example" name="category">
                  <option value="">Category</option>
                <?php 
                  while ($c = $categories->fetch_assoc()):
                  if($_POST['category'] == $c['name']):
                ?>
                  <option value="<?=$c['name']?>" selected><?=$c['name']?></option>
                <?php else:?>
                  <option value="<?=$c['name']?>"><?=$c['name']?></option>
                <?php 
                  endif;
                  endwhile;
                ?>
              </select>
              <select class="form-select form-select-sm" aria-label="Default select example" name="month">
              <option value="">Bulan</option>
              <?php 
              $i=1;
              $bulan = [1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 5=>'Mei', 6=>'Juni', 7=>'Juli', 8=>'Agustus', 9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember'];
                  foreach ($bulan as $key => $b):
                  if($_POST['month'] == $key):
                ?>
                  <option value="<?=$i?>" selected><?=$b?></option>
                <?php else:?>
                  <option value="<?=$i?>"><?=$b?></option>
                <?php 
                  endif;
                  $i++;
                endforeach;
                ?>
              </select>
              <button type="submit" class="btn btn-sm btn-outline-primary" name="tampilkan">
                Tampilkan  
              </button>
            </div>
          </form>
        </div>
      </div>
      <p class="my-3">Jumlah data : <?= $aspirasis->num_rows?></p>
      <?php while($a = $aspirasis->fetch_assoc()): ?>
      <div class="list-group">
        <div class="list-group-item list-group-item-action mb-3 border border-<?= $a['status'] ? 'success' : 'danger' ?>" aria-current="true"  id="<?=$a['id']?>">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?= $a['name'] ?></h5>
            <small><?= $a['created_at'] ?></small>
          </div>
          <div class="d-<?= isset($a['image']) ? 'flex' : 'none'?>">
            <img class="img-fluid rounded" style="width: 15%; max-height:80px" src="../resource/img/<?=$a['image']?>" alt="">
          </div>
          <div class="d-flex w-100 justify-content-between">
            <p class="mb-1"><?= strlen($a['message']) < 80 ? $a['message'] : substr($a['message'],0,80).'...' ?></p>
            <div class="d-flex flex-row-reverse gap-2">
              <a style="max-height: 24px;" href="http://localhost/senntra-Bend1/logic/destroy.php?id=<?= $a['id']?>" class="badge bg-danger text-decoration-none"><span data-feather="trash-2"></span></a>
              <a style="max-height: 24px;" href="http://localhost/senntra-Bend1/dashboard/?id=<?= $a['id']?>" class="badge bg-primary text-decoration-none"><span data-feather="eye"></span></a>
              <a style="max-height: 24px;" href="http://localhost/senntra-Bend1/logic/acceptStatus.php?id=<?= $a['id']?>" class="badge bg-success text-decoration-none <?= $a['status'] ? 'd-none' : ''?>"><span data-feather="check"></span></a>
            </div>
          </div>
      </div>
      </div>
      <?php endwhile;?>
    </main>
  </div>
</div>
<?php
require_once '../templates/footer.php';
?>