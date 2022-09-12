<?php 
if (isset($_POST['submit']) AND $_POST['submit'] === 'ini Admin') {
  if (isAdmin($_POST)) {
    header('location: http://localhost/senntra-Bend1/dashboard/');
  } else {
    echo 'gagal';
  }
}
?>

<div class="modal fade" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Are you admin <span>&#129320;</span></h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" method="POST">
          <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" name="submit" value="ini Admin">Login</button>
          <small class="text-muted">By clicking Login, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
</div>
    