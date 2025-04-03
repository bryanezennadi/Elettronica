<?php
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Link al CSS personalizzato -->
    <link rel="stylesheet" href="styleLogin.css">
    <!-- Link a Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJfA1nM5Jxe1dnwNC2bqVyn89kw7w/J1t9KjzIVpVVJ7GDBa2lBOshlYnm0H" crossorigin="anonymous">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-5 shadow-lg custom-card">
        <h2 class="text-center mb-4">Benvenuto!</h2>
        <!-- Form di login -->
        <form action="./file_secondari/login_process.php" method="POST">
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control custom-input" id="email" name="email" placeholder="Inserisci la tua email" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control custom-input" id="password" name="password" placeholder="Inserisci la tua password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 custom-btn">Accedi</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS (opzionale) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0p7zL6qNCknmbrq+lPnb6PQQEkrmgt03zU8/qW1H30bKvP1x" crossorigin="anonymous"></script>

</body>
</html>
