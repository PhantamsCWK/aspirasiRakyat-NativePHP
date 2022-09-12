<?php
  require_once '../logic/controller.php';
    if(!isset($_SESSION['isAdmin'])) {
        header('location: http://localhost/senntra-Bend1/');
    }

  $categories = query("SELECT id, name ,created_at FROM categories
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
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
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
      <h2 class="my-3">Categories List</h2>
      <button type="button" class="btn btn-primary">Add Category</button>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Created at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach($categories as $c): 
            ?>
            <tr>
              <td><?= $i ?></td>
              <td><?= $c['name'] ?></td>
              <td><?= $c['created_at'] ?></td>
              <td class="d-flex justify-content-start gap-2">
                <a class="badge bg-danger text-decoration-none"><span data-feather="trash-2"></span></a>
                <a class="badge bg-info text-decoration-none"><span data-feather="edit"></span></a>
              </td>
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