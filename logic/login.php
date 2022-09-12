<?php
require_once "controller.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        .form-signin{
            width: 600px;
           
        }
    </style>
</head>
<body>
   
    <div class="container mt-5 ">
        <div class="container md-5 px-5"></div>
            <main class="form-signin outline-secondary mt-5 px-5 mx-5 ">
                <h1 class="h3 mb-3 text-center">Login</h1>
                <form action="/login" method="POST">
                    <div class="form-floating mb-3 mx-5">
                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="email" autofocus required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3 mx-5">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="buttonrslg w-100 btn btn-lg btn-primary " type="submit">Login</button>
                    <p class="mt-2 mb-3 text-muted text-center">Haven't an Account. <a href="/register">Register</a></p>
                </form>
            </main>
        </div>
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>