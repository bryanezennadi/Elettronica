<?php
// Connessione al database
$host = 'localhost';
$dbname = 'Elettronica';
$username = 'root';
$password = '';

try {
    // Connessione PDO al database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal form
    $email = trim($_POST['email']);
    $password_inserita = trim($_POST['password']);

    // Controlla se i dati sono stati inviati
    if (empty($email) || empty($password_inserita)) {
        echo "Email o password non forniti!";
        exit();
    }

    // Verifica se l'utente esiste nel database
    $sql = "SELECT * FROM login WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Controlla se c'è una riga corrispondente (utente trovato)
    if ($stmt->rowCount() > 0) {
        // Recupera i dati dell'utente
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se la password fornita corrisponde all'hash nel database
        if (password_verify($password_inserita, $user['password'])) {
            // Password corretta
            echo "La password è corretta!";

            // Avvia la sessione e salva i dati dell'utente
            session_start();

            // Assegna il livello di accesso in base al ruolo dell'utente
            if ($user['ruolo'] == 'Admin') {
                $_SESSION['level'] = 2;  // Livello 2 per Admin
            } else {
                $_SESSION['level'] = 1;  // Livello 1 per altri utenti
            }

            // Salva altre informazioni dell'utente nella sessione
            $_SESSION['user_email'] = $user['email'];

            // Redirigi l'utente alla pagina home2.php
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
        // Utente non trovato
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
?>