<?php require_once 'logic/controller.php';?>

<?php
$isError;
if (isset($_POST['submit']) AND $_POST['submit'] === 'formAspirasi') {
  send($_POST);
}
$categories = query('SELECT id, name FROM categories');
?>

<?php require_once 'templates/header.php'?>
<link rel="stylesheet" href="resource/css/formAspirasi.css">
</head>
  <body class="bg-light">
<?php require_once 'partials/navbar.php'?>

<div class="container">
  <?php 
    if (isset($_SESSION['success'])) {
      require_once 'partials/flashMessage.php';
    }else if (isset($_SESSION['error'])) {
      require_once 'partials/errorMessage.php';
    }
  ?>
  <main class=" container formAspirasi">
    <div class="row g-5 mt-1">
      <div class="col-md-8 col-lg-12">
        <form class="needs-validation" action="" method="POST" enctype="multipart/form-data">
          <div class="row g-3 mb-5">

            <div class="col-sm-6">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
            </div>

            <div class="col-sm-6">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" id="category" name="category">
                <?php foreach($categories as $c):?>
                  <option value="<?= $c['id']?>"><?= $c['name']?></option>
                <?php endforeach;?>
              </select>
            </div>

            <div class="col-12">
            <label for="address" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="" value="" required>
            </div>

            <div class="col-12">
              <label for="formFile" class="form-label">Foto</label>
              <input class="form-control" type="file" id="formFile" name="foto">
            </div>

            <div class="col-12">
              <label for="message">Message</label>
              <textarea class="form-control" placeholder="message" id="message" name="message" style="height: 160px"></textarea>
            </div>

          </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit" value="formAspirasi">Send</button>
        </form>
      </div>
    </div>
  </main>
</div>
<?php require_once 'partials/footer.php';
require_once 'partials/loginModal.php';
require_once 'templates/footer.php';
unset($_SESSION['success']);
unset($_SESSION['error']);
?>