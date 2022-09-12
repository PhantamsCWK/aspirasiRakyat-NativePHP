<?php
  if(!isset($_GET['id']) ) {
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
require_once 'header.php';
?>
<link rel="stylesheet" href="../resource/css/dashboard.css">
</head>
<body>
<?php require_once 'partials/navbar.php'?>
<div class="container-fluid mb-5">
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
            <tr>
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
          <img src="resource/img/<?=$a['image']?>" class="card-img-top" alt="<?=$a['category_name']?>">
        </div>
        <a id="back" href="http://localhost/senntra-bend1/aspirasis.php#<?=$a['aspirasi_id']?>" class="btn btn-primary mt-4">Back</a>
      </div>
</div>
<?php require_once 'footer.php'?>