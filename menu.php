<!DOCTYPE html>
<html lang="it">
<head>
<?php include ('header.php'); ?>
    <!-- Altri metatag e intestazioni -->
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .sidebar {
            background-color: #f5f5f5;
            padding: 20px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            margin-bottom: 10px;
            font-size: 1.2rem;
            color: #333;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #666;
            font-size: 1rem;
        }

        .sidebar ul li a:hover {
            color: #333;
        }

        .content {
            margin-left:20px;
            flex-grow: 1;
            padding: 20px;
            background: none;
            display: flex;
            flex-wrap: wrap;
        }

        .piatto-box {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: calc(25% - 20px); /* Calcolo della larghezza per 4 elementi per riga */
            box-sizing: border-box; /* Conta il bordo e il padding nel calcolo della larghezza */
            text-align: center; /* Centra il contenuto all'interno del box */
        }

        .piatto-box h3 {
            color: #333;
            margin-top: 0;
        }

        .piatto-box p {
            color: #666;
            margin-bottom: 5px;
        }

        .piatto-box img {
            max-width: 50%;
            border-radius: 5px;
        }
        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            z-index: 1000;
            text-align: center;
        }

        .modal h2 {
            color: #333;
            margin-top: 0;
        }

        .modal p {
            color: #666;
            margin-bottom: 5px;
        }

        .modal ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }

        .modal ul li {
            margin-bottom: 5px;
        }

        .modal input[type="checkbox"] {
            margin-right: 5px;
        }

        .modal button {
            background-color: #ef931a;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div style="display:flex;flex-direction:column;">
        <div class="sidebar">
            <h3>Filtra per categoria</h3>
            <ul>
                <li><a href="menu.php?categoria=tutto">Tutto</a></li>
                <li><a href="menu.php?categoria=bevande">Bevande</a></li>
                <li><a href="menu.php?categoria=pizze">Pizze</a></li>
                <li><a href="menu.php?categoria=dolci">Dolci</a></li>
            </ul>
        </div>
        <div class="sidebar">
            <h3>Prenota un tavolo</h3>
            <button onclick="showBookingModal()">Prenota ora</button>
        </div>
        </div>
        <div class="content">
        <div id="bookingModal" style="display:none" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeBookingModal()">&times;</span>
            <h2>Prenota un tavolo</h2>
            <form action="menu.php" method="POST">
                <label for="date">Data:</label>
                <input type="date" id="date" name="date" required>
                <label for="time">Ora:</label>
                <input type="time" id="time" name="time" required>
                <label for="people">Numero di persone:</label>
                <input type="number" id="people" name="people" min="1" required>
                <button type="submit">Prenota</button>
            </form>
        </div>
    </div>
    <script>
        // Funzione per mostrare la finestra modale di prenotazione
        function showBookingModal() {
            var modal = document.getElementById('bookingModal');
            modal.style.display = 'block';
        }

        // Funzione per chiudere la finestra modale di prenotazione
        function closeBookingModal() {
            var modal = document.getElementById('bookingModal');
            modal.style.display = 'none';
        }
    </script>
    <script>
function showModal(nome, ingredienti, prezzo) {
    // Costruisci il contenuto della finestra modale
    var modalContent = `
        <h2>${nome}</h2>
        <p>Ingredienti:</p>
        <ul>
            ${ingredienti.split(',').map(ingrediente => `<li><input type="checkbox" name="ingredienti[]" value="${ingrediente.trim()}">${ingrediente.trim()}</li>`).join('')}
        </ul>
        <p>Prezzo: ${prezzo} €</p>
        <button id="ordina">Ordina</button>
        <button id="chiudi">Chiudi</button>
    `;

    // Crea la finestra modale
    var modal = document.createElement('div');
    modal.classList.add('modal');
    modal.innerHTML = modalContent;

    // Aggiungi la finestra modale al corpo del documento
    document.body.appendChild(modal);

    // Gestisci il clic sul pulsante "Chiudi"
    var chiudiBtn = modal.querySelector('#chiudi');
    chiudiBtn.addEventListener('click', function () {
        modal.remove(); // Rimuove la finestra modale quando viene chiusa
    });

    // Gestisci il clic sul pulsante "Ordina"
    var ordinaBtn = modal.querySelector('#ordina');
    ordinaBtn.addEventListener('click', function () {
        // Recupera gli ingredienti selezionati
        var ingredientiSelezionati = Array.from(document.querySelectorAll('input[name="ingredienti[]"]:checked')).map(checkbox => checkbox.value);

        // Invia una richiesta AJAX per effettuare l'ordine
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Messaggio di conferma o gestione degli errori
                console.log(xhr.responseText);
            }
        };
        xhr.send('nome=' + encodeURIComponent(nome) + '&prezzo=' + encodeURIComponent(prezzo) + '&ingredienti=' + encodeURIComponent(ingredientiSelezionati.join(',')));

        modal.remove(); // Rimuove la finestra modale dopo aver ordinato
    });
}
    </script>
            <?php
            // Connessione al database
            require_once('database.php');

            // Costruisci la query SQL in base alla categoria selezionata
            $categoria = $_GET['categoria'] ?? 'tutto';
            switch ($categoria) {
                case 'bevande':
                    $sql = "SELECT * FROM piatto WHERE piatto_ID BETWEEN 1 AND 10";
                    break;
                case 'pizze':
                    $sql = "SELECT * FROM piatto WHERE piatto_ID BETWEEN 11 AND 20";
                    break;
                case 'dolci':
                    $sql = "SELECT * FROM piatto WHERE piatto_ID BETWEEN 21 AND 30";
                    break;
                default:
                    $sql = "SELECT * FROM piatto";
                    break;
            }

            // Esegui la query
            $result = $conn->query($sql);

            // Verifica se ci sono risultati dalla query
            if ($result->num_rows > 0) {
                // Loop attraverso ogni riga di risultati
                while ($row = $result->fetch_assoc()) {
                    // Stampare il contenuto del riquadro per ogni elemento del menu
                    echo '<div class="piatto-box" onclick="showModal(\'' . $row['nome'] . '\', \'' . $row['ingredienti'] . '\', \'' . $row['prezzo'] . '\')">';
                    echo '<h3>' . $row['nome'] . '</h3>';
                    echo '<img src="immaginiPizzeria/' . $row['nome_immagine'] . '" alt="' . $row['nome'] . '">';
                    echo '<p>' . $row['ingredienti'] . '</p>';
                    echo '<p>Prezzo: ' . $row['prezzo'] . ' €</p>';
                    echo '</div>';
                }
            } else {
                // Se non ci sono elementi nel menu
                echo 'Nessun elemento trovato nel menu.';
            }

            // Chiudi la connessione al database
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>