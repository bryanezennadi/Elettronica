<?php
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Link al CSS personalizzato -->
    <link rel="stylesheet" href="styles.css">
    <!-- Link a Bootstrap (opzionale) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJfA1nM5Jxe1dnwNC2bqVyn89kw7w/J1t9KjzIVpVVJ7GDBa2lBOshlYnm0H" crossorigin="anonymous">
</head>
<body>



<h1 class="text-center my-4">Cosa vendiamo?</h1>

<!-- Sezione delle carte -->
<div class="container">
        <!-- Card 1: Elettrodomestici per la cucina -->

            <div class="card">
                <img src="../immagini/frigo.webp" class="card-img-top" alt="Frigo">
                <div class="card-body">
                    <h5 class="card-title">Elettrodomestici per la cucina</h5>
                    <p class="card-text">Acquista i migliori elettrodomestici per la tua cucina.</p>
                </div>

        </div>

        <!-- Card 2: Dispositivi per il gaming -->

            <div class="card">
                <img src="../immagini/cuffieGaming.webp" class="card-img-top" alt="Cuffie Gaming">
                <div class="card-body">
                    <h5 class="card-title">Dispositivi per il gaming</h5>
                    <p class="card-text">Per ogni gamer, abbiamo ciò che ti serve per dominare il gioco.</p>
                </div>

        </div>

        <!-- Card 3: Elettronica per il soggiorno -->

            <div class="card">
                <img src="../immagini/televisore.webp" class="card-img-top" alt="Televisore">
                <div class="card-body">
                    <h5 class="card-title">Elettronica per il soggiorno</h5>
                    <p class="card-text">Goditi una qualità di visione straordinaria con i nostri televisori.</p>
                </div>
            </div>

    </div>

    <h2 class="text-center my-4">E molto altro...</h2>
    <a href="login.php" class="btn btn-primary m-3">Login</a>
<a href="register.php" class="btn btn-secondary m-3">Registrati</a>
</div>

<!-- Bootstrap JS (opzionale) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0p7zL6qNCknmbrq+lPnb6PQQEkrmgt03zU8/qW1H30bKvP1x" crossorigin="anonymous"></script>

</body>
</html>
