<?php
  require_once '../logic/controller.php';
    if(!isset($_SESSION['isAdmin'])) {
        header('location: http://localhost/senntra-Bend1/');
    }

  $penduduks = query("SELECT id, name, address FROM penduduks
                      ORDER BY created_at DESC");
?>

<?php 
require_once '../templates/header.php';
?>
<link rel="stylesheet" href="../resource/css/dashboard.css">
</head>
<body>
<?php require_once 'partials/navbar.php'?>
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
      <div class="table-responsive">
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach($penduduks as $p): 
            ?>
            <tr>
              <td><?= $i ?></td>
              <td><?= $p['name'] ?></td>
              <td><?= $p['address'] ?></td>
            </tr>
            <?php
            $i++;
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?php require_once '../templates/footer.php'?>