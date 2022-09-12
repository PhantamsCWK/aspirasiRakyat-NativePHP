<?php require_once 'templates/header.php'?>
<link rel="stylesheet" href="resource/css/isAdmin.css">
</head>
<body>

<main class="form-signin text-center">
  <form>
    <h1 class="h3 mb-3 fw-normal">Please Login</h1>

    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


<?php require_once 'templates/footer.php'?>