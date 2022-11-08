<?php
  if(!isset($_SESSION['isAdmin']) OR !isset($_GET['id']) ) {
      header('location: http://localhost/senntra-Bend1/');
  }

  if (isset($_POST['send'])) {
    sendFeedback($_POST);
  }

  $aspirasi = query("SELECT a.id AS aspirasi_id, c.id AS category_id, a.message, a.status, c.name AS category_name, p.name AS penduduk_name, p.address, a.created_at, a.image
                      FROM aspirasis AS a 
                      INNER JOIN categories AS c ON c.id = category_id
                      INNER JOIN penduduks AS p ON p.id = penduduk_id
                      WHERE a.id = {$_GET['id']}
                      ORDER BY created_at DESC");
  
  $feedbacks = query("SELECT id, feedback, isAdmin, created_at FROM feedback 
                        WHERE aspirasi_id IN({$_GET['id']}) 
                        ORDER BY created_at");
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
        </div>
      </div>
      <div class="container-fluid my-5" id="feedback-box">
      <div class="container d-flex justify-content-center">
        <div class="col-md-8 col-lg-9 col-xl-10">
          <ul class="list-unstyled <?=$a['status'] ? '' : 'd-none'?>">
<?php 
  foreach($feedbacks as $f):
  if (!$f['isAdmin']):
?>
              <li class="d-flex justify-content-start mb-4" id="<?=$f['id']?>">
                <img src="../resource/img/Admin.png" alt="Admin"
                  class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="40">
                <div class="card">
                  <div class="card-header d-flex justify-content-between p-3">
                    <p class="fw-bold mb-0">Rakyat Sipil</p>
                    <p class="text-muted small mb-0"><i class="far fa-clock"><?= date("j F Y",makeEpoch($a['created_at']))?></i> </p>
                  </div>
                  <div class="card-body" style="min-width: 700px;">
                    <p class="mb-0">
                      <?=$f['feedback']?>
                    </p>
                  </div>
                </div>
              </li>
<?php else: ?>
              <li class="d-flex justify-content-end mb-4" id="<?=$f['id']?>">
                <div class="card w-100">
                  <div class="card-header d-flex justify-content-between p-3">
                    <p class="fw-bold mb-0">Admin</p>
                    <p class="text-muted small mb-0"><i class="far fa-clock"><?= date("j F Y",makeEpoch($a['created_at']))?></i> </p>
                  </div>
                  <div class="card-body">
                    <p class="mb-0">
                      <?=$f['feedback']?>
                    </p>
                  </div>
                </div>
                <img src="../resource/img/Admin.png" alt="Admin"
                  class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="40">
              </li>
<?php
  endif;
  endforeach;
?>
              <form action="" method="post">
                <input type="hidden" name="aspirasi_id" value="<?=$a['aspirasi_id']?>">
                <li class="bg-white mb-3">
                  <div class="form-outline">
                    <textarea class="form-control" id="textAreaExample2" rows="4" name="feedback" required></textarea>
                  </div>
                </li>
                <button type="submit" class="btn btn-primary mt-4 btn-rounded float-end" name="send">Send</button>
              </form>
            </ul>
            <a id="back" href="http://localhost/senntra-bend1/dashboard/#<?=$a['aspirasi_id']?>" class="btn btn-primary mt-4">Back</a>
            <a id="print" onclick="printPage()" class="btn btn-primary mt-4">Print</a>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<script>
  function printPage () {
    document.getElementById('navbar').style.display = "none";
    document.getElementById('sidebarMenu').style.display = "none";
    document.getElementById('feedback-box').style.display = "none";

    window.print();

    document.getElementById('feedback-box').style.display = "inline-block";
    document.getElementById('navbar').style.display = "flex";
  }
</script>
<?php require_once '../templates/footer.php'?>