<?php
session_start();

// Verifica se l'utente ha il livello di accesso corretto
$isAdmin = isset($_SESSION['level']) && $_SESSION['level'] == 2;

// Gestisci l'aggiornamento del prezzo se è stata inviata una richiesta POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isAdmin) {
    if (isset($_POST['update_price'])) {
        try {
            // Crea la connessione al database
            $db = new PDO('mysql:host=localhost;dbname=Elettronica', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            // Ottieni il codice del prodotto e il nuovo prezzo
            $codice = $_POST['codice'];
            $newPrice = str_replace(',', '.', $_POST['new_price']); // Sostituisci la virgola con il punto per il formato numerico

            // Verifica che il nuovo prezzo sia un valore numerico valido
            if (!is_numeric($newPrice)) {
                throw new Exception("Il prezzo inserito non è valido.");
            }

            // Prepara e esegui la query per aggiornare il prezzo
            $stmt = $db->prepare("UPDATE prodotti SET costo = :newPrice WHERE codice = :codice");
            $stmt->execute(['newPrice' => $newPrice, 'codice' => $codice]);

            // Aggiungi un controllo per verificare se la query è stata eseguita correttamente
            if ($stmt->rowCount() > 0) {
                $successMessage = "Prezzo aggiornato con successo!";
            } else {
                throw new Exception("Nessun prodotto trovato con il codice fornito.");
            }
        } catch (PDOException $e) {
            $error = "Errore nel database: " . $e->getMessage();
        } catch (Exception $e) {
            $error = "Errore: " . $e->getMessage();
        }
    }

    // Gestisci la rimozione di un prodotto
    if (isset($_POST['delete_product'])) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=Elettronica', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            // Ottieni il codice del prodotto da rimuovere
            $codice = $_POST['codice'];

            // Rimuovi il prodotto dal database
            $stmt = $db->prepare("DELETE FROM prodotti WHERE codice = :codice");
            $stmt->execute(['codice' => $codice]);

            // Se il prodotto è stato rimosso, mostra un messaggio di successo
            if ($stmt->rowCount() > 0) {
                $successMessage = "Prodotto rimosso con successo!";
            } else {
                $error = "Nessun prodotto trovato con il codice fornito.";
            }
        } catch (PDOException $e) {
            $error = "Errore: " . $e->getMessage();
        }
    }
}

// Recupera i prodotti dal database
try {
    $db = new PDO('mysql:host=localhost;dbname=Elettronica', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
    $sql = $db->query("SELECT codice, descrizione, quantità, costo, data_di_produzione FROM prodotti ORDER BY descrizione ASC");
    $prodotti = $sql->fetchAll();
} catch (PDOException $e) {
    echo "<div class='error'>Errore: " . $e->getMessage() . "</div>";
    exit;
}

?>

<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestione Prodotti</title>
    <link rel="stylesheet" href="visualizza.css">
</head>
<body>

<?php if (isset($successMessage)): ?>
    <div class="alert alert-success"><?= $successMessage ?></div>
<?php elseif (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Codice Prodotto</th>
        <th>Nome Prodotto</th>
        <th>Quantità</th>
        <th>Costo Prodotto</th>
        <th>Data di produzione</th>
        <?php if ($isAdmin): ?>
            <th>Azioni</th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($prodotti as $prodotto): ?>
        <tr>
            <td><?= htmlspecialchars($prodotto->codice) ?></td>
            <td><?= htmlspecialchars($prodotto->descrizione) ?></td>
            <td><?= htmlspecialchars($prodotto->quantità) ?></td>
            <td>
                <?php if ($isAdmin): ?>
                    <!-- Form per la modifica del prezzo direttamente nella tabella -->
                    <form action="home2.php" method="POST" style="display:flex; align-items:center;">
                        <input type="hidden" name="codice" value="<?= htmlspecialchars($prodotto->codice) ?>">
                        <input type="text" name="new_price" value="<?= number_format($prodotto->costo, 2, ',', '') ?>" class="form-control" style="width: 80px; margin-right: 5px;">
                        <button type="submit" name="update_price" class="btn btn-sm btn-primary">✓</button>
                    </form>
                <?php else: ?>
                    €<?= number_format($prodotto->costo, 2, ',', '.') ?>
                <?php endif; ?>
            </td>
            <td><?= date('d-m-Y', strtotime($prodotto->data_di_produzione)) ?></td>
            <?php if ($isAdmin): ?>
                <td>
                    <!-- Bottone per rimuovere il prodotto -->
                    <form action="home2.php" method="POST" style="display:inline;">
                        <input type="hidden" name="codice" value="<?= htmlspecialchars($prodotto->codice) ?>">
                        <button type="submit" name="delete_product" class="btn btn-danger">Rimuovi</button>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
