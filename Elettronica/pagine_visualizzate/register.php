<?php
// Se si vuole visualizzare errori di PHP, abilitarli:
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

// Variabili per errori di registrazione
$emailErr = $passwordErr = $confirmPasswordErr = '';
$email = $password = $confirmPassword = '';

// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal form
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Controlla se i campi sono stati riempiti
    if (empty($email)) {
        $emailErr = "Email è richiesta.";
    }

    if (empty($password)) {
        $passwordErr = "Password è richiesta.";
    }

    if ($password !== $confirmPassword) {
        $confirmPasswordErr = "Le password non corrispondono.";
    }

    // Se non ci sono errori, registrare l'utente
    if (empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        // Verifica se l'email è già registrata
        $sql = "SELECT * FROM login WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $emailErr = "Questa email è già registrata.";
        } else {
            // Hash della password prima di salvarla
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Salva l'utente nel database
            $sql = "INSERT INTO login (email, password) VALUES (:email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                // Registrazione avvenuta con successo
                echo "<div class='alert alert-success' role='alert'>Registrazione avvenuta con successo! Puoi <a href='login.php'>accedere</a> ora.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Si è verificato un errore durante la registrazione.</div>";
            }
        }
    }
}
?>

<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrazione</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styleRegister.css"> <!-- CSS personalizzato -->
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-4">
        <div class="card p-4 shadow-sm">
            <h2 class="text-center mb-4">Registrati</h2>
            <form action="register.php" method="POST">

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                    <div class="text-danger"><?php echo $emailErr; ?></div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="text-danger"><?php echo $passwordErr; ?></div>
                </div>

                <!-- Conferma Password -->
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Conferma Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    <div class="text-danger"><?php echo $confirmPasswordErr; ?></div>
                </div>

                <!-- Submit -->
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary w-100">Registrati</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <p>Hai già un account? <a href="login.php">Accedi</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
