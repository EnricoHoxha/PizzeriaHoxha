<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Accedi</h2>
            <form action="menu.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Accedi</button>
            </form>
            <p>Non hai un account? <a href="index.php">Registrati qui</a>.</p>
        </div>
    </div>
</body>
</html>