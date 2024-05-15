<?php
require_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO cliente (nome, cognome, telefono, email, password) VALUES ('$nome', '$cognome', '$telefono', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Reindirizza l'utente alla pagina del menu
        header("Location: menu.php");
        exit(); // Assicura che lo script termini dopo il reindirizzamento
    } else {
        echo "Errore durante la registrazione: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Errore: metodo di richiesta non valido.";
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Altri metatag e intestazioni -->
    <style>
        .content {
            padding: 20px;
            flex-grow: 1;
        }
        .register-content {
            background-image: url("immaginiPizzeria/interno-pizzeria-con-travi-a-vista.jpg");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <!-- Form di registrazione -->
        </div>
        <div class="content register-content">
            <!-- Contenuto della pagina -->
        </div>
    </div>
</body>
</html>