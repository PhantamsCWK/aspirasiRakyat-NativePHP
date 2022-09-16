<?php
  require_once '../logic/controller.php';
    if(!isset($_SESSION['isAdmin'])) {
        header('location: http://localhost/senntra-Bend1/');
    }

    if (isset($_GET['id'])) {
      require_once 'templates/aspirasi.php';
      die;
    }

  $aspirasis = query("SELECT a.id, a.message, a.status, c.name, a.created_at, a.image
                  FROM aspirasis AS a JOIN categories AS c ON (c.id = category_id) 
                  ORDER BY created_at DESC");
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
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <h2>Section title</h2>
      <?php foreach($aspirasis as $a): ?>
      <div class="list-group">
        <div class="list-group-item list-group-item-action mb-3 border border-<?= $a['status'] ? 'success' : 'danger' ?>" aria-current="true"  id="<?=$a['id']?>">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?= $a['name'] ?></h5>
            <small><?= $a['created_at'] ?></small>
          </div>
          <div class="d-<?= isset($a['image']) ? 'flex' : 'none'?>">
            <img class="img-fluid rounded" style="width: 15%; height:auto" src="../resource/img/<?=$a['image']?>" alt="">
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
      <?php endforeach;?>
    </main>
  </div>
</div>
<?php
require_once '../templates/footer.php';
?>