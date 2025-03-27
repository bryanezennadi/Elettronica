<?php
// Connessione al database
$host = 'localhost';  // Inserisci il tuo host (di solito è localhost)
$dbname = 'Elettronica';  // Il nome del tuo database
$username = 'root';  // Inserisci il tuo nome utente per il database
$password = '';  // Inserisci la tua password (se presente)

try {
    // Connessione PDO al database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Gestione degli errori
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal form
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $hash= password_hash($password, PASSWORD_DEFAULT);

    // Controlla se i dati sono stati inviati
    if (empty($email) || empty($password)) {
        echo "Email o password non forniti!";
        exit();
    }

    // Verifica se l'utente esiste nel database
    $sql = "SELECT * FROM login WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    // Associa i parametri al query
    $stmt->bindParam(':email', $email);

    // Esegui la query
    $stmt->execute();

    // Controlla se c'è una riga corrispondente (utente trovato)
    if ($stmt->rowCount() > 0) {
        // Recupera i dati dell'utente
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se la password fornita corrisponde all'hash nel database
        if (password_verify($password, $hash)) {
            // La password è corretta
            header('Location: home2.php');
            exit();
        } else {
            echo '
        <div style="background-color: red; color: white; text-align: center; padding: 20px; font-size: 24px;">
            Password errata!
        </div>
    ';
        }
    } else {
        // Utente non trovato, mostra il messaggio di errore
        echo '
            <div style="background-color: red; color: white; text-align: center; padding: 20px; font-size: 24px;">
                Devi prima registrarti!
            </div>
        ';
    }
} else {
    // Se non è stato inviato il form, mostra un messaggio
    echo "Richiesta non valida!";
}
echo "Password nel database: " . $user['password'] . "<br>";
echo "Password fornita: " . $password . "<br>";
?>
