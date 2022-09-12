<?php
  if(!isset($_SESSION['isAdmin']) OR !isset($_GET['id']) ) {
      header('location: http://localhost/senntra-Bend1/');
  }
  
  $aspirasi = query("SELECT a.id AS aspirasi_id, c.id AS category_id, a.message, a.status, c.name AS category_name, p.name AS penduduk_name, p.address, a.created_at, a.image
                      FROM aspirasis AS a 
                      INNER JOIN categories AS c ON c.id = category_id
                      INNER JOIN penduduks AS p ON p.id = penduduk_id
                      WHERE a.id = {$_GET['id']}
                      ORDER BY created_at DESC");
?>

<?php 
require_once '../templates/header.php';
?>
<link rel="stylesheet" href="../resource/css/dashboard.css">
</head>
<body>
<?php require_once 'partials/navbar.php'?>
<div class="container-fluid mb-5">
  <div class="row">
    <?php require_once 'partials/sidebar.php'?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container-fluid my-5">
      <div class="container px-5">
        <h1 class="mb-5">AspirasiRakyat</h1>
        <table>
          <?php foreach($aspirasi as $a)?>
          <tbody>
            <tr>
              <td style="padding-right:4rem">Nomor</td>
              <td><?= makeEpoch($a['created_at']) . $a['category_id'] . $a['aspirasi_id']?></td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td><?= date("j F Y",makeEpoch($a['created_at']))?></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td><?= $a['penduduk_name']?></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <table class="table table-striped table-sm">
          <tbody>
            <tr class="table-<?= $a['status'] ? 'success' : 'danger'?>">
              <td>Status</td>
              <td><?= $a['status'] ? 'Sudah selesai' : 'Belum selesai'?></td>
              <td></td>
            </tr>
            <tr>
              <td>Tempat Kejadian</td>
              <td><?= $a['address']?></td>
              <td></td>
            </tr>
            <tr>
              <td>Jenis Masalah</td>
              <td><?= $a['category_name']?></td>
              <td></td>
            </tr>
            <tr>
              <td>Message</td>
              <td colspan="2"><?= $a['message']?></td>
            </tr>
          </tbody>
        </table>
        <div style="max-height: 350px; overflow: hidden">
          <img src="../resource/img/<?=$a['image']?>" class="card-img-top" alt="Asriel Dreamur">
        </div>
        <a id="back" href="http://localhost/senntra-Bend1/dashboard/#<?=$a['aspirasi_id']?>" class="btn btn-primary mt-4">Back</a>
        <a id="print" class="btn btn-primary mt-4" onclick="printPage()">Print</a>
      </div>
</div>
    </main>
  </div>
</div>
<script>
  function printPage () {
    document.getElementById('back').style.display = "none";
    document.getElementById('navbar').style.display = "none";
    document.getElementById('sidebarMenu').style.display = "none";
    document.getElementById('print').style.display = "none";

    window.print();

    document.getElementById('back').style.display = "inline-block";
    document.getElementById('print').style.display = "inline-block";
    document.getElementById('navbar').style.display = "flex";
  }
</script>
<?php require_once '../templates/footer.php'?>