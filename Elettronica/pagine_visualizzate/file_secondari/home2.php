<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="visualizza.css">
</head>
<body>
<?php
// Visualizza il messaggio di successo se il parametro success è presente nell'URL
if (isset($_GET['success'])) {
    echo "<div class='alert alert-success'>Prezzo aggiornato con successo!</div>";
}
?>
<?php require './operazioni/VisualizzaProdotti.php';?>
</body>
</html>
