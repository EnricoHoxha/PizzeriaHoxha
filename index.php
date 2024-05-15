<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Registrazione</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Registrati</h2>
            <form action="register.php" method="POST">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
                <label for="surname">Cognome:</label>
                <input type="text" id="surname" name="surname" required>
                <label for="phone">Telefono:</label>
                <input type="tel" id="phone" name="phone" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Registrati</button>
            </form>
            <p>Hai già un account? <a href="login.php">Accedi qui</a>.</p>
        </div>
    </div>
</body>
</html>